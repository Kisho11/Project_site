<?php
$title = 'Achievements';
?>
@extends('layouts.web.app')

@section('content')
<!-- Inner Content Start -->
<div id="content">
  <div class="innerContent-wrap" style="margin-top: 40px; background-color: #ffffff;">
    <div class="container">
      <!-- Achievements Start -->
      <div class="blog-wrap flight-wrap" style="margin-top: 20px; padding: 10px 0; background-color: #ffffff;">
        <div class="container">
          <div class="title">
            <h1 style="color: #500d0a;">Achievements</h1>
          </div>
          <ul class="row unorderList">
            @forelse ($achievements as $achievement)
              <li class="col-lg-4" style="margin-bottom: 20px;">
                <div class="blog_box">
                  <div class="blogImg">
                    <img src="{{ asset('storage/achievements/' . $achievement->image) }}" alt="{{ $achievement->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                  </div>
                  <div class="path_box" style="padding: 15px; text-align: left;">
                    <div style="color: #500d0a; font-size: 14px; margin-bottom: 5px;">
                      {{ $achievement->date instanceof \DateTime ? $achievement->date->format('Y-m-d') : \Carbon\Carbon::parse($achievement->date)->format('Y-m-d') }}
                    </div>
                    <h3 style="margin: 0; font-size: 18px; line-height: 1.2; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; max-height: 4.4em;">
                      <a href="{{ route('achievements.show', $achievement->id) }}" style="color: #333; text-decoration: none;">{{ $achievement->title }}</a>
                    </h3>
                    <p style="margin: 10px 0; font-size: 14px; line-height: 1.4; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-height: 4.4em;">
                      {{ Str::limit($achievement->description, 150, '…') }}
                    </p>
                  </div>
                </div>
              </li>
            @empty
              <li class="col-12">No achievements available.</li>
            @endforelse
          </ul>
        </div>
      </div>
      <!-- Achievements End -->
    </div>
  </div>
</div>
<!-- Inner Content End -->
@endsection
