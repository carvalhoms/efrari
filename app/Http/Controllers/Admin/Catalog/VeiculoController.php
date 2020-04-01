<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Model\Montadora;
use App\Model\Veiculo;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos = Veiculo::all();
        $montadoras = Montadora::all();

        return view('admin.catalog.veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $montadoras = Montadora::all(['id', 'name']);

        return view('admin.catalog.veiculos.create', compact('montadoras'));
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
                'required',
                'unique:veiculos,name',
            ],
            'montadora' => 'required'
        ]);

        $data = $request->all();

        $montadora = Montadora::find($data['montadora']);
        $montadora->veiculos()->create($data);

        return redirect()->route('veiculos.index');
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
        $veiculo = Veiculo::find($id);
        $montadoras = Montadora::all();
        
        return view('admin.catalog.veiculos.edit', compact('montadoras', 'veiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $veiculo)
    {

        //Validando Campos
        $request->validate([
            'name' => [
                'required',
                Rule::unique('veiculos')->ignore($veiculo),
                'max:25'
            ],
            'montadora' => 'required'
        ]);

        $montadora = Montadora::find($request->montadora);
        $veiculo = Veiculo::find($veiculo);

        $veiculo->update($request->all());

        $veiculo->montadora()->associate($montadora);
        $veiculo->save();

        return redirect()->route('veiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Veiculo::find($id)->delete();

        return redirect()->route('veiculos.index');
    }
}
