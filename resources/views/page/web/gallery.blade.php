<?php
  $title = "Gallery";
  ?>
  @extends('layouts.web.app')

  @section('content')
  <!-- Inner Content Start -->
  <div class="innerContent-wrap" style="margin-top: 80px;">
    <div class="container">
      <div class="blog-wrap flight-wrap" style="margin-top: 20px; padding: 10px 0;">
        <div class="container">
          <div class="title">
            <h1 style="color: #500d0a;">Gallery</h1>
          </div>
          <ul class="row unorderList">
            @foreach ($galleries as $gallery)
              <li class="col-lg-4">
                <div class="blog_box">
                  <div class="blogImg"><img src="{{ asset('storage/gallery/' . $gallery->image) }}" alt="Gallery Image"></div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Inner Content End -->
  @endsection
