<?php

namespace App\Http\Controllers;

use App\Mail\Contactanos;
use App\Models\About;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Favorite;
use App\Models\Link;
use App\Models\Page;
use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $business = Company::find(1);
        $links = Link::all();
        return view('inicio', compact('business', 'links'));
    }

    public function home()
    {
        $business = Company::find(1);
        $banners = Banner::all();
        $favoritos = Favorite::first();
        $products_destacados = Product::where('destacado', 1)->take(8)->get();
        return view('home', compact('business', 'banners', 'products_destacados', 'favoritos'));
    }

    public function tienda(Request $request)
    {
         $business = Company::find(1);
        $query = Product::with('brand', 'taxonomy');

        if ($request->search) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('codigo_producto', 'like', '%' . $search . '%');

            });

        }

        if ($request->category) {
            $query->where('taxonomy_id', $request->category);
        }

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = Taxonomy::all();
        
        return view('tienda', compact('business', 'categories', 'products'));
    }

    public function show($id)
    {
        return Product::with('brand')->findOrFail($id);
    }

    public function about()
    {
        $business = Company::find(1);
        // $nosotros = Page::where('slug', 'nosotros')->first();
        $nosotros = About::first();
        return view('about', compact('business', 'nosotros'));
    }

    public function contactanos()
    {
        $business = Company::find(1);
        return view('contact', compact('business'));
    }
    
    public function apiBrand()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://devpedido.vesercloud.com/api/Grupo/Listagruposxcodigo_web";
            $token = "10778176381.6f1f3ad904add12c219720fe07e50c201c7f54bd4db1bf271d2eaad610583e3e9596086c1b22f8571b01439f1ad00f3af96cf2dcf5b6217e306c25ae4e338e84";

            $response = Http::withToken($token)->post($ruta, [
                "ruc_empresa" => $business->ruc,
                "codigo_grupo" => 0
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoGrupo as $key => $item) {
                    Brand::create([
                        'name' => $item->descripcion,
                        'id_sistema' => $item->codigo
                    ]);
                }
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Marcas con éxito']); 
            }
            else{
                return response()->json(['status' => true, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function apiCategory()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://devpedido.vesercloud.com/api/Linea/Listalineasxcodigo_web";
            $token = "10778176381.6f1f3ad904add12c219720fe07e50c201c7f54bd4db1bf271d2eaad610583e3e9596086c1b22f8571b01439f1ad00f3af96cf2dcf5b6217e306c25ae4e338e84";

            $response = Http::withToken($token)->post($ruta, [
                "ruc_empresa" => $business->ruc,
                "codigo_liena" => 0
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoLinea as $key => $item) {
                    Taxonomy::create([
                        'name' => $item->descripcion,
                        'id_sistema' => $item->codigo
                    ]);
                }
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Categorías con éxito']); 
            }
            else{
                return response()->json(['status' => true, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    // public function apiProduct()
    // {
    //     try {
    //         $business = Company::find(1);
    //         $ruta = "https://devpedido.vesercloud.com/api/Inventario/ProductosWeb";
    //         $token = "10778176381.6f1f3ad904add12c219720fe07e50c201c7f54bd4db1bf271d2eaad610583e3e9596086c1b22f8571b01439f1ad00f3af96cf2dcf5b6217e306c25ae4e338e84";

    //         $response = Http::withToken($token)->post($ruta, [
    //             "ruc_empresa" => $business->ruc,
    //             "idlinea" => 0,
    //             'idgrupo' => 0,
    //             'idalmacen' => 0,
    //             'descripcion' => '',
    //             'cantidad_producto' => 1000,
    //             'paginas' => 1,
    //             'estado' => 'P',
    //             'fechainicial' => '2025-04-25T14:54:34.307Z',
    //             'fechafinal' => '2025-04-25T14:54:34.307Z'
    //         ]);

    //         if ($response->successful() == true) {
    //             $body = json_decode($response->body());
    //             foreach ($body->listadoCatalogoWeb as $key => $item) {
    //                 $marca = Brand::where('id_sistema',$item->grupo)->get();
    //                 $categoria = Taxonomy::where('id_sistema',$item->linea)->get();
    //                 if ($marca) {
    //                     if ($categoria) {
                            
    //                         Product::create([
    //                             'name' => $item->descripcion,
    //                             'slug' => Str::slug($item->descripcion),
    //                             'price' => $item->precio_venta,
    //                             'taxonomy_id' => $categoria[0]->id,
    //                             'brand_id' => $marca[0]->id,
    //                             'id_sistema' => $item->codigo,
    //                             'unidad_medida' => $item->presentacion,
    //                             'stock' =>$item->stock,
    //                             'images' => $item->imagen_web
    //                         ]);
    //                     }
    //                 }             
    //             } 
    //             return response()->json(['status' => true, 'msg' => 'Registro masivo de Productos con éxito']);                
    //         }
    //         else{
    //             return response()->json(['status' => false, 'msg' => 'Algo aslio mal']); 
    //         }

            
    //     } catch (\Throwable $th) {
    //         return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
    //     }
    // }

    public function apiProduct()
    {
        try {

            $business = Company::find(1);

            $ruta = "https://devpedido.vesercloud.com/api/Inventario/ProductosWeb";

            $token = "10778176381.6f1f3ad904add12c219720fe07e50c201c7f54bd4db1bf271d2eaad610583e3e9596086c1b22f8571b01439f1ad00f3af96cf2dcf5b6217e306c25ae4e338e84";

            $response = Http::withToken($token)->post($ruta, [
                "ruc_empresa" => $business->ruc,
                "idlinea" => 0,
                'idgrupo' => 0,
                'idalmacen' => 0,
                'descripcion' => '',
                'cantidad_producto' => 1000,
                'paginas' => 1,
                'estado' => 'P',
                'fechainicial' => '2025-04-25T14:54:34.307Z',
                'fechafinal' => '2025-04-25T14:54:34.307Z'
            ]);

            if ($response->successful() == true) {

                $body = json_decode($response->body());

                foreach ($body->listadoCatalogoWeb as $item) {

                    $marca = Brand::where('id_sistema', $item->grupo)->first();

                    $categoria = Taxonomy::where('id_sistema', $item->linea)->first();

                    // si no existe marca o categoria, continuar
                    if (!$marca || !$categoria) {
                        continue;
                    }

                    Product::updateOrCreate(

                        // condición para buscar
                        [
                            'id_sistema' => $item->codigo
                        ],

                        // datos a actualizar o crear
                        [
                            'name' => $item->descripcion,
                            'codigo_producto' => $item->codigo_producto,
                            'slug' => Str::slug($item->descripcion),
                            'price_mayorista' => $item->precio_mayorista,
                            'price_cliente' => $item->precio_cliente,
                            'price' => $item->precio_final,
                            'taxonomy_id' => $categoria->id,
                            'brand_id' => $marca->id,
                            'unidad_medida' => $item->presentacion,
                            'stock' => $item->stock,
                            'images' => $item->imagen_web,
                            'description' => $item->detalle_tecnico,
                            'destacado' => $item->destacado
                        ]
                    );
                }

                return response()->json([
                    'status' => true,
                    'msg' => 'Productos sincronizados correctamente'
                ]);

            } else {

                return response()->json([
                    'status' => false,
                    'msg' => 'Algo salió mal' . $response->body()
                ]);
            }

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'msg' => 'Error: ' . $th->getMessage()
            ]);
        }
    }

    public function correoContact(Request $request)
    {
        $correo = new Contactanos($request);
        try {
            Mail::to('informes@mayanstore.pe')->send($correo);
            return response()->json(['status' => true, 'msg' => "El correo fue enviado satisfactoriamente"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Hubo un error al enviar, inténtalo de nuevo más tarde." . $e->getMessage()]);
        }
    }
}
