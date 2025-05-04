<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalsController extends Controller
{

    public function index(Request $request)
    {
        return view('page.web.principals');
    }

}