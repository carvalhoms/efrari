<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Produto;
use App\Model\Linha;
use App\Model\Descricao;
use App\Model\Montadora;
use App\Model\Veiculo;
use App\Http\Resources\ProdutoResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CatalogoController extends Controller
{
    public function index()
    {
        $descricoes = Descricao::orderby('name', 'asc')->get();
        $linhas = Linha::orderby('name', 'asc')->get();

        return view('catalog.index', compact('descricoes', 'linhas'));
    }

    public function getMontadoras(Montadora $montadora, $linha) {
        $montadoras = $montadora->where('linha_id', $linha)->orderBy('name', 'asc')->get();
        return $montadoras;
    }

    public function getVeiculos(Veiculo $veiculo, $mont)
    {
        $veiculos = $veiculo->where('montadora_id', $mont)->orderBy('name', 'asc')->get();
        return $veiculos;
    }

    public function getProductCode(Request $request)
    {
        $resultados = [];
        $codigo = Produto::where('codigo', $request->code)->get();

        $referencia = Produto::whereHas('referencias', function($query) use($request) {
            $query->where('ref', $request->code);
        })->get();

        $resultados = $codigo->merge($referencia);

        return ProdutoResource::collection($resultados);
    }

    public function getProductAplic(Request $request)
    {
        $produtos = Produto::whereHas('descricao', function(Builder $query) use($request) {
            $query->where('id', $request->desc);
        })->whereHas('aplicacoes', function(Builder $query) use($request) {
            if($request->veic) {
                $query->where('montadora_id', $request->mont);
                $query->where('aplic', 'LIKE', "%{$request->veic}%");
            } else {
                $query->where('montadora_id', $request->mont);
            }
        })->get();

        return ProdutoResource::collection($produtos);
    }
}