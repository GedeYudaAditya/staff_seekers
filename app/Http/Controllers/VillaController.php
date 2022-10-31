<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillaController extends Controller
{
    //
    public function index()
    {
        return view('villa.pages.index', [
            'title' => 'Villa',
            'active' => 'villa'
        ]);
    }
}
