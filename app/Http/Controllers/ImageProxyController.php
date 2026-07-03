<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageProxyController extends Controller
{
    public function show(Request $request)
    {
        $url = $request->get('url');

        if (!$url) {
            abort(404);
        }

        $response = Http::timeout(20)->get($url);

        if (!$response->successful()) {
            abort(404);
        }

        return response(
            $response->body(),
            200,
            [
                'Content-Type' => $response->header('Content-Type'),
                'Cache-Control' => 'public, max-age=86400'
            ]
        );
    }
}
