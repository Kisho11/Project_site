<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\NewsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::where('created_by', Auth::id())->with('user')->get();
        $galleries = Gallery::where('created_by', Auth::id())->with('user')->get();
        $newsEvents = NewsEvent::where('created_by', Auth::id())->with('user')->get();
        $newsEventsCount = NewsEvent::where('created_by', Auth::id())->count();
        $achievementsCount = Achievement::where('created_by', Auth::id())->count();
        $galleriesCount = Gallery::where('created_by', Auth::id())->count();
        $activeTab = session('activeTab', 'achievements');
        return view('layouts.admin.dashboard', compact('achievements', 'galleries', 'newsEvents', 'newsEventsCount', 'achievementsCount', 'galleriesCount', 'activeTab'));
    }

    public function create()
    {
        return response()->json([]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'title_ta' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_ta' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'date' => 'required|date', // Ensure date validation
        ]);

        if ($request->hasFile('image')) {
            $date = date('Ymd');
            $serial = Achievement::where('image', 'like', $date . '%')->count() + 1;
            $filename = $date . sprintf('%03d', $serial) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('achievements', $filename, 'public');

            Achievement::create([
                'created_by' => Auth::id(),
                'title' => $request->title,
                'title_ta' => $request->title_ta,
                'description' => $request->description,
                'description_ta' => $request->description_ta,
                'image' => $filename,
                'date' => $request->date, // This should be a valid date string
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Session::flash('success', 'Achievement added successfully!');
        } else {
            Session::flash('error', 'Image upload failed.');
        }

        return redirect()->route('admin.dashboard')->with('activeTab', 'achievements');
    }

    public function show($id)
    {
        $achievement = Achievement::with('user')->findOrFail($id);
        return response()->json([
            'id' => $achievement->id,
            'title' => $achievement->title,
            'title_ta' => $achievement->title_ta,
            'description' => $achievement->description,
            'description_ta' => $achievement->description_ta,
            'image' => $achievement->image,
            'date' => $achievement->date,
            'user' => $achievement->user ? $achievement->user->name : 'Unknown', // Handle null user
            'created_at' => $achievement->created_at ? $achievement->created_at->format('Y-m-d H:i:s') : 'N/A',
        ]);
    }

    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        return response()->json([
            'id' => $achievement->id,
            'title' => $achievement->title,
            'title_ta' => $achievement->title_ta,
            'description' => $achievement->description,
            'description_ta' => $achievement->description_ta,
            'image' => $achievement->image,
            'date' => $achievement->date,
        ]);
    }

    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'title_ta' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_ta' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'date' => 'required|date',
        ], [
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image must not exceed 2MB.',
            'date.required' => 'Please select a date.',
            'date.date' => 'The date must be a valid date.',
        ]);

        // Custom validation for title or title_ta
        if (empty($request->title) && empty($request->title_ta)) {
            return redirect()->back()->withInput()->withErrors(['title' => 'Either Title or Title (Tamil) is required.']);
        }

        // Custom validation for description or description_ta
        if (empty($request->description) && empty($request->description_ta)) {
            return redirect()->back()->withInput()->withErrors(['description' => 'Either Description or Description (Tamil) is required.']);
        }

        if ($request->hasFile('image')) {
            if ($achievement->image && Storage::disk('public')->exists('achievements/' . $achievement->image)) {
                Storage::disk('public')->delete('achievements/' . $achievement->image);
            }

            $date = date('Ymd');
            $serial = Achievement::where('image', 'like', $date . '%')->count() + 1;
            $filename = $date . sprintf('%03d', $serial) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('achievements', $filename, 'public');
            $achievement->image = $filename;
        }

        $achievement->title = $request->title;
        $achievement->title_ta = $request->title_ta;
        $achievement->description = $request->description;
        $achievement->description_ta = $request->description_ta;
        $achievement->date = $request->date;
        $achievement->updated_at = now();
        $achievement->save();

        Session::flash('success', 'Achievement updated successfully!');
        return redirect()->route('admin.dashboard')->with('activeTab', 'achievements');
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);

        if ($achievement->image && Storage::disk('public')->exists('achievements/' . $achievement->image)) {
            Storage::disk('public')->delete('achievements/' . $achievement->image);
        }

        $achievement->delete();

        Session::flash('success', 'Achievement deleted successfully!');
        return redirect()->route('admin.dashboard')->with('activeTab', 'achievements');
    }
}
