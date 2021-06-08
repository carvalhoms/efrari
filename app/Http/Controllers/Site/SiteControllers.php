<?php

namespace App\Http\Controllers\Site;

use App\Model\Blog;
use App\Model\Repre;
use App\Http\Controllers\Controller;

class Sitecontroller extends Controller
{
    public function index()
    {
        $posts = Blog::orderby('id', 'desc')->take(3)->get();

        return view('site.index', compact('posts'));
    }

    public function getRepre(Repre $repre, $uf)
    {
        $repres = $repre->where('uf', $uf)->get();
        return $repres;
    }
}
