<?php
  $title = "Coming Soon";
?>
@extends('layouts.web.app')

@section('content')



<!-- Inner Content Start -->
<div class="innerContent-wrap"  style="margin-top: 180px;">
  <div class="container">

    <!-- 404 Start -->
    {{-- <div class="404-wrap">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="four-zero-page">
            <h2 style="color: #481210;font-size: 80px;">COMING SOON</h2>
            <h3 style="color: #481210;">We are still in development mode</h3>
            <div class="readmore"> <a href="{{ route('index') }}">Go To Home Page</a> </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- 404 End -->
<!-- New & Events Start -->
<div class="class-wrap" style="background:#fff6af;margin-top:40px;">
    <div class="container">
      <div class="title">
        <h1 style="color:#500d0a;"> News & Events</h1>
      </div>
      <ul class="owl-carousel  ">
        <li class="item">
          <div class="class_box">
            <div class="class_Img"><img class="event-img" src="web/assets/images/main/news-thumb-1.jpg" alt="">
              <div class="time_box"><span>2024-04-01</span></div>
            </div>
            <div class="path_box">
              <h3><a href="#">Colours Night 2023.</a></h3>
              <p>Outstanding Athletic Achievements awarded at the 2023 Colours Night.</p>

            </div>
          </div>
        </li>
        <li class="item">
          <div class="class_box">
            <div class="class_Img"><img class="event-img" src="web/assets/images/main/news-thumb-3.jpg" alt="">
              <div class="time_box"><span>2024-04-01</span></div>
            </div>
            <div class="path_box">
              <h3><a href="#">U-17 Cricket Tournament Cup.</a></h3>
              <p>Kilinochchi Maha Vidyalayam's U-17 Cricket Team Wins Tournament Cup.</p>

            </div>
          </div>
        </li>
        <li class="item">
          <div class="class_box">
            <div class="class_Img"><img class="event-img" src="web/assets/images/main/news-thumb-2.jpg" alt="">
              <div class="time_box"><span>2024-04-01</span></div>
            </div>
            <div class="path_box">
              <h3><a href="#">Prize Day Ceremony 2023</a></h3>
              <p>Dazzling Achievements Unveiled at 2023 Prize Day Ceremony.</p>

            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- New & Events End --> 
<!-- Inner Content Start -->

@endsection
