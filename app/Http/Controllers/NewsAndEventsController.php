<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsAndEventsController extends Controller
{
    public function index(Request $request)
    {
        return view('page.web.news-events');
    }
}
