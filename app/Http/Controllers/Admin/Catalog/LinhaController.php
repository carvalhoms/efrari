<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Model\Linha;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linhas = Linha::all();
        return view('admin.catalog.linhas.index')->with(compact('linhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.linhas.create');
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
                'unique:linhas,name',
                'max:25' //Maximo de caracteres
            ],
        ]);

        Linha::create($request->all());

        return redirect()->route('linhas.index');
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
    public function edit(Linha $linha)
    {
        return view('admin.catalog.linhas.edit', compact('linha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Linha $linha)
    {
        //Validando Campos
        $request->validate([
            'name' => [
                'required', //Campo requerido
                Rule::unique('linhas')->ignore($linha), //Usando Classe Rule para campo unico mas permitindo Update
                'max:25' //Maximo de caracteres
            ],
        ]);

        $linha->update($request->all());

        return redirect()->route('linhas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($linha)
    {
        Linha::find($linha)->delete();

        return redirect()->route('linhas.index');
    }
}
