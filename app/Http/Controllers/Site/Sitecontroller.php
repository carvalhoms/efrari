<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Repre;
use Illuminate\Http\Request;

class Sitecontroller extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function getRepre(Repre $repre, $uf)
    {
        $repres = $repre->where('uf', $uf)->get();
        return $repres;
    }
}
