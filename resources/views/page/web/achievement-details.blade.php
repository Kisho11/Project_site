<?php
$title = 'Achievement Details';
?>
@extends('layouts.web.app')

@section('content')
<!-- Debug: Check if layout is loaded -->
<!-- <p>Layout Loaded: {{ __FILE__ }}</p> -->

<!-- Inner Content Start -->
<div id="content">
  <div class="innerContent-wrap" style="margin-top: 40px; background-color: #ffffff;">
    <div class="container">
      <!-- Achievement Details Start -->
      <div class="blog-wrap flight-wrap" style="margin-top: 20px; padding: 10px 0; background-color: #ffffff;">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="blog_box">
                <div class="path_box" style="padding: 10px; text-align: left;">
                  <h1 style="margin: 0; line-height: 1.3; color: #333; font-weight: bold; margin-bottom: 5px;">
                    {{ $achievement->title }}
                  </h1>
                  <div style="color: #500d0a; font-size: 14px; margin-bottom: 5px; font-weight: 400;">
                    {{ $achievement->date->format('Y-m-d') }}
                  </div>
                  <div class="blogImg">
                    <img src="{{ asset('storage/achievements/' . $achievement->image) }}" alt="{{ $achievement->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                  </div>
                  <p style="margin: 10px 0; font-size: 16px; line-height: 1.6; color: #666;">
                    {{ $achievement->description }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Achievement Details End -->
    </div>
  </div>
</div>
<!-- Inner Content End -->
@endsection
