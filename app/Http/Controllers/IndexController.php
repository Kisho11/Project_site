<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use App\Models\Achievement;
use App\Models\Gallery;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $newsEvents = NewsEvent::orderBy('date', 'desc')->take(3)->get(['id', 'title', 'description', 'image', 'date']);
        $achievements = Achievement::orderBy('date', 'desc')->take(3)->get(['id', 'title', 'description', 'image', 'date']);
        $galleries = Gallery::orderBy('created_at', 'desc')->take(6)->get(['id', 'image']);

        return view('page.web.index', compact('newsEvents', 'achievements', 'galleries'));
    }
}
