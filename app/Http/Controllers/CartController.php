<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $business = Company::find(1);
        $items = Cart::content();

        $total = $items->sum(function ($item) {
            return $item->price * $item->qty;
        });

        return view('cart', compact(
            'business',
            'items',
            'total'
        ));
    }   

    public function checkout()
    {
        $business = Company::find(1);
        $items = Cart::content();

        $total = $items->sum(function ($item) {
            return $item->price * $item->qty;
        });

        return view('checkout', compact(
            'business',
            'items',
            'total'
        ));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // validar stock
        if ($request->quantity > $product->stock) {
            return response()->json([
                'error' => 'Stock insuficiente'
            ], 400);
        }

        // validar si ya existe en carrito
        $existing = Cart::content()->first(function ($item) use ($product) {
            return $item->id == $product->id;
        });

        $totalQty = $existing 
            ? $existing->qty  + $request->quantity 
            : $request->quantity;

        if ($totalQty > $product->stock) {
            return response()->json([
                'error' => 'Stock insuficiente'
            ], 400);
        }

        // agregar al carrito
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->price,
            'options' => [
                'image' => $product->image
            ]
        ]);

        return response()->json([
            'success' => true,
            'count' => Cart::count()
        ]);
    }

    public function content()
    {
        $items = Cart::content()->map(function ($item) {
            return [
                'rowId' => $item->rowId,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'subtotal' => $item->price * $item->qty,
                'image' => $item->options->image ?? null
            ];
        });

        $total = $items->sum('subtotal');

        return response()->json([
            'items' => $items,
            'total' => number_format($total, 2, '.', '')
        ]);
    }

    public function remove(Request $request)
    {
        Cart::remove($request->rowId);

        return response()->json([
            'success' => true,
            'count' => Cart::count()
        ]);
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

        return back();
    }
}
