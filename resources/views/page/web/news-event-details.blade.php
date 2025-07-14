<?php
$title = 'News & Event Details';
?>
@extends('layouts.web.app')

@section('content')
<!-- Debug: Check if layout is loaded -->
<!-- <p>Layout Loaded: {{ __FILE__ }}</p> -->

<!-- Inner Content Start -->
<div id="content">
  <div class="innerContent-wrap" style="margin-top: 40px; background-color: #ffffff;">
    <div class="container">
      <!-- News Event Details Start -->
      <div class="blog-wrap flight-wrap" style="margin-top: 20px; padding: 10px 0; background-color: #ffffff;">
        <div class="container">
          {{-- <div class="title">
            <h1 style="color: #500d0a;">News & Event Details</h1>
          </div> --}}
          <div class="row">
            <div class="col-lg-12">
              <div class="blog_box">
                <div class="path_box" style="padding: 10px; text-align: left;">
                  <h1 style="margin: 0; line-height: 1.3;  color: #333; font-weight: bold; margin-bottom: 5px;">
                    {{ $newsEvent->title }}
                  </h1>
                  <div style="color: #500d0a; font-size: 14px; margin-bottom: 5px; font-weight: 400;">
                    {{ $newsEvent->date->format('Y-m-d') }}
                  </div>
                  <div class="blogImg">
                  <img src="{{ asset('storage/news_events/' . $newsEvent->image) }}" alt="{{ $newsEvent->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                  <p style="margin: 10px 0; font-size: 16px; line-height: 1.6; color: #666;">
                    {{ $newsEvent->description }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- News Event Details End -->
    </div>
  </div>
</div>
<!-- Inner Content End -->
@endsection
