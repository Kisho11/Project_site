<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use App\Models\Achievement;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class NewsEventController extends Controller
{
    public function index()
    {
        $newsEvents = NewsEvent::where('created_by', Auth::id())->with('user')->get();
        $achievements = Achievement::where('created_by', Auth::id())->with('user')->get();
        $newsEventsCount = NewsEvent::where('created_by', Auth::id())->count();
        $achievementsCount = Achievement::where('created_by', Auth::id())->count();
        $galleriesCount = Gallery::where('created_by', Auth::id())->count();
        $galleries = Gallery::where('created_by', Auth::id())->with('user')->get();
        $activeTab = session('activeTab', 'news');
        return view('layouts.admin.dashboard', compact('newsEvents', 'achievements', 'newsEventsCount', 'achievementsCount', 'galleriesCount', 'galleries', 'activeTab'));
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
            'date' => 'required|date',
        ], [
            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image must not exceed 2MB.',
            'date.required' => 'Please select a date.',
            'date.date' => 'The date must be a valid date.',
        ]);

        if (empty($request->title) && empty($request->title_ta)) {
            return redirect()->back()->withInput()->withErrors(['title' => 'Either Title or Title (Tamil) is required.']);
        }

        if (empty($request->description) && empty($request->description_ta)) {
            return redirect()->back()->withInput()->withErrors(['description' => 'Either Description or Description (Tamil) is required.']);
        }

        if ($request->hasFile('image')) {
            $date = date('Ymd');
            $serial = NewsEvent::where('image', 'like', $date . '%')->count() + 1;
            $filename = $date . sprintf('%03d', $serial) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('news_events', $filename, 'public');

            NewsEvent::create([
                'created_by' => Auth::id(),
                'title' => $request->title,
                'title_ta' => $request->title_ta,
                'description' => $request->description,
                'description_ta' => $request->description_ta,
                'image' => $filename,
                'date' => $request->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Session::flash('success', 'News/Event added successfully!');
        } else {
            Session::flash('error', 'Image upload failed.');
        }

        return redirect()->route('admin.dashboard')->with('activeTab', 'news');
    }

    public function show($id)
    {
        $newsEvent = NewsEvent::with('user')->findOrFail($id);
        return response()->json([
            'id' => $newsEvent->id,
            'title' => $newsEvent->title,
            'title_ta' => $newsEvent->title_ta,
            'description' => $newsEvent->description,
            'description_ta' => $newsEvent->description_ta,
            'image' => $newsEvent->image,
            'date' => $newsEvent->date->format('Y-m-d'),
            'user' => $newsEvent->user ? $newsEvent->user->name : 'Unknown',
            'created_at' => $newsEvent->created_at ? $newsEvent->created_at->format('Y-m-d H:i:s') : 'N/A',
        ]);
    }

    public function edit($id)
    {
        $newsEvent = NewsEvent::findOrFail($id);
        return response()->json([
            'id' => $newsEvent->id,
            'title' => $newsEvent->title,
            'title_ta' => $newsEvent->title_ta,
            'description' => $newsEvent->description,
            'description_ta' => $newsEvent->description_ta,
            'image' => $newsEvent->image,
            'date' => $newsEvent->date->format('Y-m-d'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $newsEvent = NewsEvent::findOrFail($id);

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

        if (empty($request->title) && empty($request->title_ta)) {
            return redirect()->back()->withInput()->withErrors(['title' => 'Either Title or Title (Tamil) is required.']);
        }

        if (empty($request->description) && empty($request->description_ta)) {
            return redirect()->back()->withInput()->withErrors(['description' => 'Either Description or Description (Tamil) is required.']);
        }

        if ($request->hasFile('image')) {
            if ($newsEvent->image && Storage::disk('public')->exists('news_events/' . $newsEvent->image)) {
                Storage::disk('public')->delete('news_events/' . $newsEvent->image);
            }

            $date = date('Ymd');
            $serial = NewsEvent::where('image', 'like', $date . '%')->count() + 1;
            $filename = $date . sprintf('%03d', $serial) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('news_events', $filename, 'public');
            $newsEvent->image = $filename;
        }

        $newsEvent->title = $request->title;
        $newsEvent->title_ta = $request->title_ta;
        $newsEvent->description = $request->description;
        $newsEvent->description_ta = $request->description_ta;
        $newsEvent->date = $request->date;
        $newsEvent->updated_at = now();
        $newsEvent->save();

        Session::flash('success', 'News/Event updated successfully!');
        return redirect()->route('admin.dashboard')->with('activeTab', 'news');
    }

    public function destroy($id)
    {
        $newsEvent = NewsEvent::findOrFail($id);

        if ($newsEvent->image && Storage::disk('public')->exists('news_events/' . $newsEvent->image)) {
            Storage::disk('public')->delete('news_events/' . $newsEvent->image);
        }

        $newsEvent->delete();

        Session::flash('success', 'News/Event deleted successfully!');
        return redirect()->route('admin.dashboard')->with('activeTab', 'news');
    }
}
