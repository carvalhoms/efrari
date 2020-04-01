<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Model\Descricao;
use Illuminate\Validation\Rule;
use App\Model\Linha;
use App\Model\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('admin.catalog.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $descricoes = Descricao::all(['id', 'name']);
        $linhas = Linha::all(['id', 'name']);

        return view('admin.catalog.produtos.create', compact('descricoes', 'linhas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validando Campos
        $request->validate([
            'codigo' => [
                'required',
                'unique:produtos,codigo',
            ],
            'descricao' => 'required',
            'linha' => 'required'
        ]);

        $descricao = $request->descricao;
        $linha = $request->linha;
        $produto = Produto::create($request->all());

        $produto->descricao()->associate($descricao);
        $produto->linha()->associate($linha);
        
        $produto->save();

        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $descricoes = Descricao::all();
        $linhas = Linha::all();

        return view('admin.catalog.produtos.edit', compact('produto', 'descricoes', 'linhas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produto)
    {
        //Validando Campos
        $request->validate([
            'codigo' => [
                'required',
                Rule::unique('produtos')->ignore($produto),
                'max:25'
            ],
            'descricao' => 'required',
            'linha' => 'required'
        ]);


        $produto = Produto::find($produto);
        $descricao = Descricao::find($request->descricao);
        $linha = Linha::find($request->linha);

        $produto->update($request->all());

        $produto->descricao()->associate($descricao);
        $produto->linha()->associate($linha);
        $produto->save();

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produto::find($id)->delete();

        return redirect()->route('produtos.index');
    }
}
