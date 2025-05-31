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
<!-- Achievements Start -->
<div class="blog-wrap flight-wrap" style="margin-top:40px;padding:20px 0;">
    <div class="container">
      <div class="title">
        <h1> Achievements </h1>
      </div>
      <ul class="row unorderList">
        <li class="col-lg-4">
          <div class="blog_box">
            <div class="blogImg"><img src="web/assets/images/achievements/a1.jpeg" alt="">

            </div>
            <div class="path_box">
              <h3><a href="#">SLBO 2023</a></h3>
              <p>Master Sritharan Kaajanan won the bronze medal in SLBO 2023, organized by the Institute of Biology, Sri Lanka.</p>
            </div>
          </div>
        </li>
        <li class="col-lg-4">
          <div class="blog_box">
            <div class="blogImg"><img src="web/assets/images/achievements/a2.jpg" alt="">

            </div>
            <div class="path_box">
              <h3><a href="#">Battle of Vanni - 2024</a></h3>
              <p>The 13th Battle of Vanni Cricket Match Cup has been won.</p>
            </div>
          </div>
        </li>
        <li class="col-lg-4">
          <div class="blog_box">
            <div class="blogImg"><img src="web/assets/images/achievements/a3.jpg" alt="">

            </div>
            <div class="path_box">
            <h3><a href="#">Chess Competition</a></h3>
              <p>The 11-year-old boys' team, 13-year-old girls' team, and 15-year-old boys' team have achieved third place...</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- Achievements End -->
  </div>
</div>
<!-- Inner Content Start -->

@endsection
