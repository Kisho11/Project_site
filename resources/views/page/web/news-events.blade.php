<?php
  $title = 'News & Events';
  ?>
  @extends('layouts.web.app')

  @section('content')
  <!-- Inner Content Start -->
  <div class="innerContent-wrap" style="margin-top: 80px;">
    <div class="container">
      <!-- News & Events Start -->
      <div class="blog-wrap flight-wrap" style="margin-top: 20px; padding: 10px 0;">
        <div class="container">
          <div class="title">
            <h1 style="color: #500d0a;">News & Events</h1>
          </div>
          <ul class="row unorderList">
            @foreach ($newsEvents as $newsEvent)
              <li class="col-lg-4">
                <div class="blog_box">
                  <div class="blogImg">
                    <img src="{{ asset('storage/news_events/' . $newsEvent->image) }}" alt="{{ $newsEvent->title }}">
                    <div style="position: absolute; top: 10px; right: 10px; background: #500d0a; color: white; padding: 4px 8px; border-radius: 4px;">
                      {{ $newsEvent->date->format('Y-m-d') }}
                    </div>
                  </div>
                  <div class="path_box">
                    <h3><a href="#">{{ $newsEvent->title }}</a></h3>
                    <p>{{ $newsEvent->description }}</p>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <!-- News & Events End -->
    </div>
  </div>
  <!-- Inner Content End -->
  @endsection
