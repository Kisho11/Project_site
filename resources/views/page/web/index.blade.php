<?php
$title = "Home";
?>
@extends('layouts.web.app')

@section('content')

<style>
  .cours-title { min-height: 180px; }
  .event-img { width: 370px !important; height: 250px !important; }
  .short-des { color: #ffffff !important; font-weight: 400 !important; font-size: 30px !important; text-align: center; padding: 40px !important; line-height: normal; }
  .class-wrap .title:after { background: #500d0a; }
  .categories-course p { font-size: 16px; }

  @media screen and (max-width: 1024px) { .tp-banner-container { margin-top: 150px !important; } }
  @media screen and (max-width: 425px) { .short-des { font-size: 12px !important; } }
  @media screen and (max-width: 768px) { .short-des { font-size: 16px !important; } .vision-div { margin-top: 0px !important; } }
  @media screen and (max-width: 1024px) { .short-des { font-size: 16px !important; } }
</style>

<!-- Revolution slider start -->
<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on">
        <img alt="" src="web/assets/images/main/slider-1.png" data-lazyload="web/assets/images/main/slider-1.png">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600">
          <span style="text-shadow: 0 0 8px #500d0a;">Empowering Students with Excellence</span>
        </div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"
          style="text-wrap: wrap; font-size: 28px !important; color: #fff6af; text-shadow: 0 0 8px #500d0a;">
          Established in 1927, our school has a proud tradition of fostering leadership and excellence, shaping the pillars of our community.
        </div>
      </li>
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on">
        <img alt="" src="web/assets/images/main/slider-2.png" data-lazyload="web/assets/images/main/slider-2.png">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600">
          <span style="text-shadow: 0 0 8px #500d0a;">Empowering Students with Excellence</span>
        </div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"
          style="text-wrap: wrap; font-size: 28px !important; color: #fff6af; text-shadow: 0 0 8px #500d0a;">
          Established in 1927, our school has a proud tradition of fostering leadership and excellence, shaping the pillars of our community.
        </div>
      </li>
    </ul>
  </div>
</div>
<!-- Revolution slider end -->

<!-- School Vision, Mission & Moto Start -->
<div class="vision-div" style="">
  <div class="container">
    <div class="categories_wrap">
      <ul class="row unorderList">
        <li class="col-lg-4 col-md-12">
          <div class="categories-course" style="background: #500d0a !important;">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="web/assets/images/main/vision.png" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Our Vision</h4>
                <p>We will create students glowing with intelligence, righteousness, wisdom, and creativity for the new world.</p>
              </div>
            </div>
          </div>
        </li>
        <li class="col-lg-4 col-md-12">
          <div class="categories-course" style="background: #500d0a !important;">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img style="width: 80px; height: 80px;" src="web/assets/images/main/mission.png" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Our Mission</h4>
                <p>We will combine student, teacher resources with social resources to present highly effective services for knowledge daily and partake in the welfare of the world.</p>
              </div>
            </div>
          </div>
        </li>
        <li class="col-lg-4 col-md-12">
          <div class="categories-course" style="background: #500d0a !important;">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="web/assets/images/main/moto.png" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Our Moto</h4>
                <p>“Katka Kasadara” - <i>learn properly and thoroughly</i></p>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- School Vision, Mission & Moto End -->

<!-- School Description Start -->
<div class="choice-wrap" style="margin-top: 40px;">
  <div class="container">
    <p class="short-des">
      Established in 1927, our school has a storied tradition of cultivating leaders and visionaries who make significant contributions to our district and beyond. As a 1AB grade institution, we offer a comprehensive educational journey from Grade 1 to Grade 13, accommodating a diverse array of student interests and aspirations. At the GCE Advanced Level, we provide specialized streams in Biology, Mathematics, Arts, and Commerce, equipping students with the knowledge and skills to excel in their chosen fields.
    </p>
    <div class="readmore"><a href="{{ route('overview') }}">Read More</a></div>
  </div>
</div>
<!-- School Description End -->

<!-- Achievements Start -->
<div class="blog-wrap flight-wrap" style="margin-top: 40px; padding: 20px 0; background-color: #ffffff;">
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

<!-- News & Events Start -->
<div class="class-wrap" style="background: #ffffff; margin-top: 40px; padding: 20px 0;">
  <div class="container">
    <div class="title">
      <h1 style="color: #500d0a;">News & Events</h1>
    </div>
    <ul class="owl-carousel">
      @forelse ($newsEvents as $newsEvent)
        <li class="item" style="margin-bottom: 20px;">
          <div class="class_box">
            <div class="class_Img">
              <img class="event-img" src="{{ asset('storage/news_events/' . $newsEvent->image) }}" alt="{{ $newsEvent->title }}" style="width: 100%; height: 250px; object-fit: cover;">
              <div class="time_box" style="color: #500d0a; font-size: 14px; margin-bottom: 5px;">
                <span>{{ $newsEvent->date->format('Y-m-d') }}</span>
              </div>
            </div>
            <div class="path_box" style="padding: 15px; text-align: left;">
              <h3 style="margin: 0; font-size: 18px; line-height: 1.2; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; max-height: 4.4em;">
                <a href="{{ route('news-events.show', $newsEvent->id) }}" style="color: #333; text-decoration: none;">{{ $newsEvent->title }}</a>
              </h3>
              <p style="margin: 10px 0; font-size: 14px; line-height: 1.4; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; max-height: 4.4em;">
                {{ Str::limit($newsEvent->description, 150, '…') }}
              </p>
            </div>
          </div>
        </li>
      @empty
        <li class="item">No news events available.</li>
      @endforelse
    </ul>
  </div>
</div>
<!-- News & Events End -->

<!-- Gallery Start -->
<div class="blog-wrap flight-wrap" style="margin-top: 40px; padding: 20px 0;">
  <div class="container">
    <div class="title">
      <h1>Gallery</h1>
    </div>
    <ul class="row unorderList">
      @forelse ($galleries as $gallery)
        <li class="col-lg-4">
          <div class="blog_box">
            <div class="blogImg"><img src="{{ asset('storage/gallery/' . $gallery->image) }}" alt="Gallery Image"></div>
          </div>
        </li>
      @empty
        <li class="col-12">No gallery images available.</li>
      @endforelse
    </ul>
  </div>
</div>
<!-- Gallery End -->

@endsection
