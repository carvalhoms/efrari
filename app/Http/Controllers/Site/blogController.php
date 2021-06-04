<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\blog;

class blogController extends Controller
{
    public function index() {
        $posts = Blog::orderby('id', 'desc')->get();

        return view('site.blog', compact('posts'));
    }
}
