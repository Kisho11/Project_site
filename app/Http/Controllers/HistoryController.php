<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function index(Request $request)
    {
        return view('page.web.history');
    }

}