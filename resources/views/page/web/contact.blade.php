<?php
  $title = "Contact Us";
?>
@extends('layouts.web.app')

@section('content')

<style>
.address-item .address-icon
{
  background: #500d0a !important;
}

.newsletter-wrap
{
  background: #c5b0ae !important;
}

.address-text
{
  height: 105px !important;
}
</style>

<!-- Inner Heading Start
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Contact Us</h1>
  </div>
</div>
 Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap" style="margin-top: 80px;">
  <div class="container">
    <div class="cont_info ">
      <div class="row">
        <div class="col-lg-3 col-md-6 md-mb-30">
          <div class="address-item style">
            <div class="address-icon"> <i class="fas fa-phone-alt"></i> </div>
            <div class="address-text">
              <h3 class="contact-title">Call Us</h3>
              <ul class="unorderList">
                <li><a href="tel:94212285414">+94 21 2285 414</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 md-mb-30">
          <div class="address-item style">
            <div class="address-icon"> <i class="far fa-envelope"></i> </div>
            <div class="address-text">
              <h3 class="contact-title">Mail Us</h3>
              <ul class="unorderList">
                <li><a href="#">info@kmv.lk</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 sm-mb-30">
          <div class="address-item">
            <div class="address-icon"> <i class="far fa-clock"></i> </div>
            <div class="address-text">
              <h3 class="contact-title">Opening Hours</h3>
              <ul class="unorderList">
                <li>Mon - Fri : 7am to 2pm</li>
                <li>Sat - Sun : Closed</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="address-item">
            <div class="address-icon"> <i class="fas fa-map-marker-alt"></i> </div>
            <div class="address-text">
              <h3 class="contact-title">Address</h3>
              <p> Wilson Road, Kilinochchi, Sri Lanka.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3936.3050683618308!2d80.40741807375686!3d9.394601283161565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afe94df82166be9%3A0x673aff3645e56acd!2z4K6V4K6_4K6z4K6_4K6o4K-K4K6a4K-N4K6a4K6_IOCuruCuleCuviDgrrXgrr_grqTgr43grqTgrr_grq_grr7grrLgrq_grq7gr40gfCBLaWxpbm9jaGNoaSBNYWhhIFZpZHlhbGF5YW0!5e0!3m2!1sen!2slk!4v1712258233962!5m2!1sen!2slk" width="100%" height="511" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Newsletter Start
<div class="newsletter-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="title">
          <h1>Newsletter</h1>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
      </div>
      <div class="col-lg-6">
        <div class="news-info">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Email Address">
              <div class="form_icon"><i class="fas fa-envelope"></i></div>
            </div>
            <button class="sigup">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
Newsletter End-->
<!-- Inner Content Start -->

@endsection
