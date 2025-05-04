<?php
  $title = "404";
?>
@extends('layouts.web.app')

@section('content')

<!-- Inner Heading Start 
<div class="innerHeading-wrap">
  <div class="container">
    <h1>404 Page</h1>
  </div>
</div>
 Inner Heading End --> 

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container"> 
    
    <!-- 404 Start -->
    <div class="404-wrap">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="four-zero-page">
            <h2 style="color: #481210;">404</h2>
            <h3 style="color: #481210;">Sorry Page Was Not Found</h3>
            <p>The page you are looking is not available or has been removed.
              Try going to Home Page by using the button below.</p>
            <div class="readmore"> <a href="{{ route('index') }}">Go To Homepage</a> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 404 End --> 
    
  </div>
</div>
<!-- Inner Content Start --> 

@endsection