<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Controllers\Controller;
use App\Model\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Newsletter::all();
        return view('admin.site.newsletter.index')->with(compact('emails'));
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
            'email' => [
                'required', //Campo requerido
                'unique:newsletters,email',
                'max:60' //Maximo de caracteres
            ],
        ]);

        Newsletter::create($request->all());

        return redirect()->route('site');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($newsletter)
    {
        Newsletter::find($newsletter)->delete();

        return redirect()->route('newsletter.index');
    }
}
