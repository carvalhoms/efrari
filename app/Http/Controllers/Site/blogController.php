<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\blog;

class BlogController extends Controller
{
    public function index() {
        $posts = Blog::orderby('id', 'desc')->get();

        return view('site.blog', compact('posts'));
    }
}
