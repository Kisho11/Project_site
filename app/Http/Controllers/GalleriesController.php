<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    public function index(Request $request)
    {
            // Public view with all gallery data
            $galleries = Gallery::orderBy('created_at', 'desc')->get(['id', 'image']);
            return view('page.web.gallery', compact('galleries'));
    }
}
