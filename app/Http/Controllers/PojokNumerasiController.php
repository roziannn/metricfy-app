<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PojokNumerasiController extends Controller
{
    public function infografisNumerasi()
    {
        return view('user.pojok-numerasi.numerasi-infografis');
    }

    public function about()
    {
        return view('user.pojok-numerasi.aboutUs');
    }
}
