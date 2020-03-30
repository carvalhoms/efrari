<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Model\Descricao;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DescricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descricoes = Descricao::all();
        return view('admin.catalog.descricao.index')->with(compact('descricoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.descricao.create');
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
            'name' => [
                'required', //Campo requerido
                'unique:descricoes,name',
                'max:25' //Maximo de caracteres
            ],
        ]);

        Descricao::create($request->all());

        return redirect()->route('descricao.index');
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
    public function edit(Descricao $descricao)
    {
        return view('admin.catalog.descricao.edit', compact('descricao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descricao $descricao)
    {
        //Validando Campos
        $request->validate([
            'name' => [
                'required', //Campo requerido
                Rule::unique('descricoes')->ignore($descricao), //Usando Classe Rule para campo unico mas permitindo Update
                'max:25' //Maximo de caracteres
            ],
        ]);

        $descricao->update($request->all());

        return redirect()->route('descricao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($descricao)
    {
        Descricao::find($descricao)->delete();

        return redirect()->route('descricao.index');
    }
}
