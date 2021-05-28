<?php

namespace App\Http\Controllers\Admin\Site;

use App\Model\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::all();
        return view('admin.site.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site.blog.create');
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
            'title' => 'required',
            'subTitle' => 'required',
            'text' => 'required',
        ]);

        Blog::create($request->all());

        return redirect()->route('blog.index');
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
    public function edit(Blog $blog)
    {
        return view('admin.site.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog)
    {       
        $post = blog::find($blog);
        $post->update($request->all());

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog)
    {
        $post = Blog::find($blog);
        
        if ($post->img !== null) {
            Storage::delete('imagensBlog/'.$post->img);
        }

        if ($post->file !== null) {
            Storage::delete('arquivosBlog/'.$post->file);
        }

        $post->delete();

        return redirect()->route('blog.index');
    }

    public function uploadImg(Request $request) {
        $post = blog::find($request->idPost);

        if ($post->img !== null) {
            Storage::delete('imagensBlog/'.$post->img);
        }

        $image = $request->file('uploadImg');
        $fileType = $image->extension();

        if ($image->isValid()) {
            if ($fileType === 'jpeg' || $fileType ==='png') {
                $image->store('imagensBlog');

                $post->img = $image->hashName();
                $post->update();
            } else {
                dd('Imagem inválida');
            }
        } else {
            dd('Arquivo inválido');
        }

        return redirect()->back();
    }

    public function uploadFile(Request $request) {
        $post = blog::find($request->idPost);

        if ($post->file !== null) {
            Storage::delete('arquivosBlog/'.$post->file);
        }

        $file = $request->file('uploadFile');

        if ($file->isValid()) {
            $file->store('arquivosBlog');

            $post->file = $file->hashName();
            $post->update();
        } else {
            dd('Arquivo inválido');
        }

        return redirect()->back();
    }
}
