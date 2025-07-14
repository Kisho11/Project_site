<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Achievement;
use App\Models\NewsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('created_by', Auth::id())->with('user')->get();
        $achievements = Achievement::where('created_by', Auth::id())->with('user')->get();
        $newsEvents = NewsEvent::where('created_by', Auth::id())->with('user')->get();
        $newsEventsCount = NewsEvent::where('created_by', Auth::id())->count();
        $achievementsCount = Achievement::where('created_by', Auth::id())->count();
        $galleriesCount = Gallery::where('created_by', Auth::id())->count();
        $activeTab = session('activeTab', 'gallery');
        return view('layouts.admin.dashboard', compact('galleries', 'achievements', 'newsEvents', 'newsEventsCount', 'achievementsCount', 'galleriesCount', 'activeTab'));
    }

    public function create()
    {
        return response()->json([]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|max:2048',
        ], [
            'images.required' => 'Please upload at least one image.',
            'images.min' => 'Please upload at least one image.',
            'images.*.required' => 'Please upload valid images.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.max' => 'Each image must not exceed 2MB.',
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $uploadCount = count($images);

            if ($uploadCount > 20) {
                Session::flash('error', 'You can upload a maximum of 20 images at a time.');
                return redirect()->back()->withInput();
            }

            $date = date('Ymd');
            $serial = Gallery::where('image', 'like', $date . '%')->count() + 1;

            foreach ($images as $image) {
                $filename = $date . sprintf('%03d', $serial++) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('gallery', $filename, 'public');

                Gallery::create([
                    'created_by' => Auth::id(),
                    'image' => $filename,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Session::flash('success', 'Images uploaded successfully!');
        } else {
            Session::flash('error', 'No images were uploaded.');
        }

        return redirect()->route('admin.dashboard')->with('activeTab', 'gallery');
    }

    public function show($id)
    {
        $gallery = Gallery::with('user')->findOrFail($id);
        return response()->json([
            'id' => $gallery->id,
            'image' => $gallery->image,
            'user' => $gallery->user ? $gallery->user->name : 'Unknown',
            'created_at' => $gallery->created_at ? $gallery->created_at->format('Y-m-d H:i:s') : 'N/A',
        ]);
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json([
            'id' => $gallery->id,
            'image' => $gallery->image,
        ]);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|max:2048',
        ], [
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image must not exceed 2MB.',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists('gallery/' . $gallery->image)) {
                Storage::disk('public')->delete('gallery/' . $gallery->image);
            }

            $date = date('Ymd');
            $serial = Gallery::where('image', 'like', $date . '%')->count() + 1;
            $filename = $date . sprintf('%03d', $serial) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('gallery', $filename, 'public');
            $gallery->image = $filename;
        }

        $gallery->updated_at = now();
        $gallery->save();

        Session::flash('success', 'Image updated successfully!');
        return redirect()->route('admin.dashboard')->with('activeTab', 'gallery');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image && Storage::disk('public')->exists('gallery/' . $gallery->image)) {
            Storage::disk('public')->delete('gallery/' . $gallery->image);
        }

        $gallery->delete();

        Session::flash('success', 'Image deleted successfully!');
        return redirect()->route('admin.dashboard')->with('activeTab', 'gallery');
    }
}
