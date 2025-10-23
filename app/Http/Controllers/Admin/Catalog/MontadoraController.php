<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\Montadora;
use App\Model\Linha;

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
        $linhas = Linha::all(['id', 'name']);

        return view('admin.catalog.montadoras.create', compact('linhas'));
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
                'max:64' //Maximo de caracteres
            ],
            'linha' => [
                'required', //Campo requerido
            ]
        ]);

        $data = $request->all();

        $linha = Linha::find($data['linha']);
        $linha->montadoras()->create($data);

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
    public function edit($id)
    {
        $montadora = Montadora::find($id);
        $linhas = Linha::all();
        
        return view('admin.catalog.montadoras.edit', compact('linhas', 'montadora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $montadora)
    {
        //Validando Campos
        $request->validate([
            'name' => [
                'required', //Campo requerido
                'max:64' //Maximo de caracteres
            ],
        ]);

        $linha = Linha::find($request->linha);
        $montadora = Montadora::find($montadora);

        $montadora->update($request->all());

        $montadora->linha()->associate($linha);
        $montadora->save();

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
