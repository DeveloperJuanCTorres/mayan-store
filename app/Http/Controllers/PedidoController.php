<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Company;
use App\Models\Api;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    public function pedido(Request $request)
    {
        try {

            $request->validate([
                'nombre' => 'required',
                'telefono' => 'required',
                'email' => 'required|email',
                'direccion' => 'required',
                'departamento' => 'required',
                'distrito' => 'required',
            ]);

            $business = Company::find(1);

            $apis = Api::find(1);

            $total = Cart::content()->sum(function ($item) {
                return $item->price * $item->qty;
            });

            /*
            |--------------------------------------------------------------------------
            | REGISTRAR ORDEN
            |--------------------------------------------------------------------------
            */

            $orden = Order::create([
                'name' => $request->nombre,
                'telefono' => str_replace('+', '', $request->codigo) . $request->telefono,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'departamento' => $request->departamento,
                'distrito' => $request->distrito,
                'referencia' => $request->referencia,
                'total' => $total
            ]);

            /*
            |--------------------------------------------------------------------------
            | REGISTRAR ITEMS
            |--------------------------------------------------------------------------
            */

            foreach (Cart::content() as $item) {

                OrderItem::create([
                    'order_id' => $orden->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'subtotal' => $item->price * $item->qty,
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | PDF
            |--------------------------------------------------------------------------
            */

            $data = [
                'orden' => $orden,
                'items' => Cart::content(),
                'business' => $business,
                'total' => $total
            ];

            ini_set('memory_limit', '512M');

            $pdf = Pdf::loadView('partials.pdf', $data);

            $pdfPath = 'pedido_' . $orden->id . '.pdf';

            Storage::put(
                'public/pedidos/' . $pdfPath,
                $pdf->output()
            );

            $orden->update([
                'pdf' => 'pedidos/' . $pdfPath
            ]);

            /*
            |--------------------------------------------------------------------------
            | WHATSAPP
            |--------------------------------------------------------------------------
            */

            if ($apis) {

                Http::post($apis->ruta_whatsapp, [
                    "ruc_empresa" => $business->ruc,
                    "numero_celular" => str_replace('+', '', $request->codigo) . $request->telefono,
                    "mensaje" => 'Gracias por su pedido, adjuntamos el detalle de compra.',
                    "ruta_imagen" => config('app.url') . '/storage/pedidos/' . $pdfPath,
                    "apikey_bot" => $apis->apikey_bot_whatsapp,
                    "ruta_bot" => $apis->ruta_bot_whatsapp
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | LIMPIAR CARRITO
            |--------------------------------------------------------------------------
            */

            Cart::destroy();

            return redirect()
                ->route('home')
                ->with('success', 'Pedido enviado correctamente');

        } catch (\Throwable $th) {

            return back()->with('error', $th->getMessage());
        }
    }
}
