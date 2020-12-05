<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoResource;
use App\Model\Produto;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function getCode(Request $request)
    {
        $resultados = [];

        $codigo = Produto::where('codigo', $request->code)->get();

        $referencia = Produto::whereHas('referencias', function($query) use($request) {
            $query->where('ref', $request->code);
        })->get();

        $resultados = $codigo->merge($referencia);

        return ProdutoResource::collection($resultados);
    }

    public function getAplic(Request $request)
    {
        // Pesquisa por Aplicação
    }
}
