<?php
  $title = "Home";
?>
@extends('layouts.web.app')

@section('content')

<style>


  .cours-title
  {
    min-height: 180px;
  }

  .event-img
  {
    width: 370px !important;
    height:250px !important;
  }

  .short-des
  {
    color: #ffffff !important;
    font-weight: 400 !important;
    font-size: 30px !important;
    text-align: center;
    padding: 40px !important;
    line-height: normal;
  }
  
  .class-wrap .title:after 
  {
      background:#500d0a;
  }
  
  .categories-course p {
    font-size: 16px;
}

  @media screen and (max-width:1024px) 
  {
    .tp-banner-container
    {
      margin-top:150px !important;
    }
  }

  @media screen and (max-width:425px) 
  {
    .short-des
    {
      font-size: 12px !important;
    }
  }

  @media screen and (max-width:768px) 
  {
    .short-des
    {
      font-size: 16px !important;
    }

    .vision-div
    {
      margin-top:0px !important;
  
    }
  }

  @media screen and (max-width:1024px) 
  {
    .short-des
    {
      font-size: 16px !important;
    }
  }
  
</style>

<!-- Revolution slider start 
 
    text-shadow: 2px 2px 2px #500d0a !important;
-->

<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on"> 
        <img alt="" src="web/assets/images/main/slider-1.png" data-lazyload="web/assets/images/main/slider-1.png">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600">
         <span style="text-shadow: 0 0 8px #500d0a;">Empowering Students with Excellence</span>
        </div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"
         style="text-wrap: wrap;font-size:28px !important;color: #fff6af;text-shadow: 0 0 8px #500d0a;"> 
          Established in 1927, our school has a proud tradition of fostering leadership and excellence, shaping the pillars of our community.
        </div>
      </li>
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on"> 
        <img alt="" src="web/assets/images/main/slider-2.png" data-lazyload="web/assets/images/main/slider-2.png">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600">
         <span style="text-shadow: 0 0 8px #500d0a;">Empowering Students with Excellence</span>
        </div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"
         style="text-wrap: wrap;font-size:28px !important;color: #fff6af;text-shadow: 0 0 8px #500d0a;"> 
          Established in 1927, our school has a proud tradition of fostering leadership and excellence, shaping the pillars of our community.
        </div>
      </li>
      
      <!--
      <li data-slotamount="7" data-transition="slotzoom-horizontal" data-masterspeed="1000" data-saveperformance="on"> 
        <img alt="" src="web/assets/images/dummy.png" data-lazyload="web/assets/images/main/slider-2.png">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600">
          <span> International School </span>
        </div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"> 
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur, 
          <br/>
          pulvinar rhoncus risus. Fusce vel rutrum mi. Suspendisse pretium tellus eu ipsum.
        </div>
      </li>
      <li data-slotamount="7" data-transition="slotzoom-horizontal" data-masterspeed="1000" data-saveperformance="on"> 
        <img alt="" src="web/assets/images/dummy.png" data-lazyload="web/assets/images/main/slider-3.png">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600">
          <span> International School </span>
        </div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"> 
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur, 
          <br/>
          pulvinar rhoncus risus. Fusce vel rutrum mi. Suspendisse pretium tellus eu ipsum.
        </div>
      </li>-->
    </ul>
  </div>
</div>
<!-- Revolution slider end --> 

<!-- School Vision,Mission & Moto Start -->
<div class="vision-div" style="">
  <div class="container">
    <div class="categories_wrap">
      <ul class="row unorderList">
        <li class="col-lg-4 col-md-12"> 
          <!-- single-course-categories -->
          <div class="categories-course" style="background:#500d0a !important;">
            <div class="item-inner">
              
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="web/assets/images/main/vision.png" alt=""> </span> </div>
              
              <div class="cours-title">
                <h4>Our Vision</h4>
                <p>
                 We will create students glowing with intelligence righteousness, wisdom and creativity 
                 for the new world.
                </p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>
        <li class="col-lg-4 col-md-12"> 
          <!-- single-course-categories -->
          <div class="categories-course" style="background:#500d0a !important;">
            <div class="item-inner">
              
              <div class="cours-icon"> <span class="coure-icon-inner"> <img style="width: 80px;height: 80px;" src="web/assets/images/main/mission.png" alt=""> </span> </div>
              
              <div class="cours-title">
                <h4>Our Mission</h4>
                <p>
                We will combine student, teacher resources with social resources present highly 
                effective services for knowledge daily and part taken the welfare of the world.
                </p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>
        <li class="col-lg-4 col-md-12"> 
          <!-- single-course-categories -->
          <div class="categories-course" style="background:#500d0a !important;" >
            <div class="item-inner">
              
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="web/assets/images/main/moto.png" alt=""> </span> </div>
              
              <div class="cours-title">
                <h4>Our Moto</h4>
                <p>
                  “Katka Kasadara" -<i> learn properly and thoroughly</i>
                </p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>
        
      </ul>
    </div>
  </div>
</div>
<!-- School Vision,Mission & Moto End --> 

<!-- School Description Start -->
<div class="choice-wrap " style="margin-top:40px;">
  <div class="container">
    <!--<div class="title">
      <h1>We Are The Best <span>Choice For Your Child</span></h1>
    </div> -->
    <p class="short-des">
      Established in 1927, our school has a storied tradition of cultivating leaders and visionaries who
      make significant contributions to our district and beyond. As a 1AB grade institution, we offer a
      comprehensive educational journey from Grade 1 to Grade 13, accommodating a diverse array of
      student interests and aspirations. At the GCE Advanced Level, we provide specialized streams in
      Biology, Mathematics, Arts, and Commerce, equipping students with the knowledge and skills to
      excel in their chosen fields.
    </p>
    <div class="readmore"><a href="{{ route('overview') }}">Read More</a></div>
  </div>
</div>
<!-- School Description End -->

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



@endsection