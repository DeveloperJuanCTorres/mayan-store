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

    // public function add(Request $request)
    // {
    //     $product = Product::findOrFail($request->product_id);

    //     // validar stock
    //     if ($request->quantity > $product->stock) {
    //         return response()->json([
    //             'error' => 'Stock insuficiente'
    //         ], 400);
    //     }

      
    //     $existing = Cart::content()->first(function ($item) use ($product) {
    //         return $item->id == $product->id;
    //     });

    //     $totalQty = $existing 
    //         ? $existing->qty  + $request->quantity 
    //         : $request->quantity;

    //     if ($totalQty > $product->stock) {
    //         return response()->json([
    //             'error' => 'Stock insuficiente'
    //         ], 400);
    //     }

        
    //     Cart::add([
    //         'id' => $product->id,
    //         'name' => $product->name,
    //         'qty' => $request->quantity,
    //         'price' => $product->price,
    //         'options' => [
    //             'image' => $product->images,
    //             'price_mayorista' => $product->price_mayorista
    //         ]
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'count' => Cart::count()
    //     ]);
    // }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $qtyToAdd = (int) $request->quantity;

        // buscar producto existente
        $existing = Cart::content()->first(function ($item) use ($product) {
            return $item->id == $product->id;
        });

        // cantidad total
        $totalQty = $existing
            ? $existing->qty + $qtyToAdd
            : $qtyToAdd;

        // validar stock
        if ($totalQty > $product->stock) {

            return response()->json([
                'error' => 'Stock insuficiente'
            ], 400);

        }

        // 🔥 validar precio
        $finalPrice = $totalQty >= 3
            ? $product->price_mayorista
            : $product->price;

        // si ya existe → eliminar
        if ($existing) {

            Cart::remove($existing->rowId);

        }

        // volver a agregar actualizado
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $totalQty,
            'price' => $finalPrice,
            'options' => [
                'image' => $product->images,
                'price_mayorista' => $product->price_mayorista
            ]
        ]);

        return response()->json([
            'success' => true,
            'count' => Cart::count()
        ]);
    }

    // public function content()
    // {
    //     $items = Cart::content()->map(function ($item) {
    //         return [
    //             'rowId' => $item->rowId,
    //             'name' => $item->name,
    //             'qty' => $item->qty,
    //             'price' => $item->price,
    //             'subtotal' => $item->price * $item->qty,
    //             'image' => $item->options->image ?? null,
    //             'price_mayorista' => $item->options->price_mayorista
    //         ];
    //     });

    //     $total = $items->sum('subtotal');

    //     return response()->json([
    //         'items' => $items,
    //         'total' => number_format($total, 2, '.', '')
    //     ]);
    // }

    public function content()
    {
        $items = Cart::content()->map(function ($item) {

            // precio normal
            $price = (float) $item->price;

            // precio mayorista
            $priceMayorista = isset($item->options->price_mayorista)
                ? (float) $item->options->price_mayorista
                : 0;

            // validar precio final
            $finalPrice = (
                $item->qty >= 3 &&
                $priceMayorista > 0
            )
                ? $priceMayorista
                : $price;

            // subtotal correcto
            $subtotal = $finalPrice * $item->qty;

            return [
                'rowId' => $item->rowId,
                'name' => $item->name,
                'qty' => $item->qty,

                // precios
                'price' => $price,
                'price_mayorista' => $priceMayorista,
                'price_final' => $finalPrice,

                // subtotal calculado
                'subtotal' => $subtotal,

                'image' => $item->options->image ?? null
            ];
        });

        // total general
        $total = $items->sum(function ($item) {
            return $item['subtotal'];
        });

        return response()->json([
            'items' => $items->values(),
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

    // public function update(Request $request)
    // {
    //     Cart::update($request->rowId, $request->qty);

    //     return back();
    // }

    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $qty = (int) $request->qty;

        // obtener item actual
        $item = Cart::get($rowId);

        // obtener producto real
        $product = Product::find($item->id);

        if (!$product) {
            return back()->with('error', 'Producto no encontrado');
        }

        // validar stock
        if ($qty > $product->stock) {
            return back()->with('error', 'Stock insuficiente');
        }

        // validar precio
        $finalPrice = $qty >= 3
            ? $product->price_mayorista
            : $product->price;

        // eliminar item actual
        Cart::remove($rowId);

        // volver a agregar con precio actualizado
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $finalPrice,
            'options' => [
                'image' => $product->images,
                'price_mayorista' => $product->price_mayorista
            ]
        ]);

        return back();
    }
    
}
