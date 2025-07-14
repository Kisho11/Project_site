<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function index(Request $request)
    {
        $achievements = Achievement::orderBy('date', 'desc')->get(['id', 'title', 'description', 'image', 'date']);
        return view('page.web.achievements', compact('achievements'));
    }
}
