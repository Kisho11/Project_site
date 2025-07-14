<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use Illuminate\Http\Request;

class NewsAndEventsController extends Controller
{
    public function index(Request $request)
    {
        $newsEvents = NewsEvent::orderBy('date', 'desc')->get(['id', 'title', 'description', 'image', 'date']);
        return view('page.web.news-events', compact('newsEvents'));
    }
}
