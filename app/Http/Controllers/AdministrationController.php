<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function index(Request $request)
    {
        return view('page.web.administration');
    }

}