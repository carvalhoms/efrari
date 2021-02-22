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

class CatalogoController extends Controller
{
    public function index()
    {
        $linhas = Linha::orderby('name', 'asc')->get();
        $descricoes = Descricao::orderby('name', 'asc')->get();
        $montadoras = Montadora::orderby('name', 'asc')->get();

        return view('catalog.index', compact('linhas', 'descricoes', 'montadoras'));
    }

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

    public function getMont() {
        
    }

    public function getVeiculos(Veiculo $veiculo, $mont)
    {
        $veiculos = $veiculo->where('montadora_id', $mont)->orderBy('name', 'asc')->get();

        return $veiculos;
    }

    public function getAplic(Request $request)
    {
        if($request->desc) {
            $produtos = Produto::whereHas('descricao', function($query) use($request){
                $query->where('id', $request->desc);
            })->whereHas('aplicacoes', function($query) use($request) {
                $query->where('montadora_id', $request->mont);
                $query->where('aplic', 'LIKE', "%{$request->aplic}%");
            })->get();
        } else {
            $produtos = Produto::whereHas('descricao', function($query) use($request){
                $query->where('id', $request->desc);
            })->whereHas('aplicacoes', function($query) use ($request) {
                $query->where('montadora_id', $request->mont);
            })->get();
        }

        return ProdutoResource::collection($produtos);
    }
}
