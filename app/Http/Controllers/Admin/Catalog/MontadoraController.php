<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use App\Model\Montadora;

class MontadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $montadoras = Montadora::all();
        return view('admin.catalog.montadoras.index')->with(compact('montadoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.montadoras.create');
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
                'unique:montadoras,name',
                'max:25' //Maximo de caracteres
            ],
        ]);

        Montadora::create($request->all());

        return redirect()->route('montadoras.index');
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
    public function edit(Montadora $montadora)
    {
        return view('admin.catalog.montadoras.edit', compact('montadora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Montadora $montadora)
    {
        //Validando Campos
        $request->validate([
            'name' => [
                'required', //Campo requerido
                Rule::unique('montadoras')->ignore($montadora), //Usando Classe Rule para campo unico mas permitindo Update
                'max:25' //Maximo de caracteres
            ],
        ]);

        $montadora->update($request->all());

        return redirect()->route('montadoras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $montadora
     * @return \Illuminate\Http\Response
     */
    public function destroy($montadora)
    {
        Montadora::find($montadora)->delete();

        return redirect()->route('montadoras.index');
    }
}
