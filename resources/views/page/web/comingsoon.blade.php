<?php
  $title = "Coming Soon";
?>
@extends('layouts.web.app')

@section('content')



<!-- Inner Content Start -->
<div class="innerContent-wrap"  style="margin-top: 180px;">
  <div class="container">

    <!-- 404 Start -->
    <div class="404-wrap">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="four-zero-page">
            <h2 style="color: #481210;font-size: 80px;">COMING SOON</h2>
            <h3 style="color: #481210;">We are still in development mode</h3>
            <div class="readmore"> <a href="{{ route('index') }}">Go To Home Page</a> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 404 End -->

  </div>
</div>
<!-- Inner Content Start -->

@endsection
