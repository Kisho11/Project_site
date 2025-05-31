<?php
  $title = "Admin Dashboard";
?>
@extends('layouts.web.app')

@section('content')

<style>
.address-item .address-icon {
  background: #500d0a !important;
}
.innerContent                         -wrap {
  margin-top: 80px;
}
.dashboard-card {
  background: #c5b0ae !important;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.dashboard-title {
  font-size: 24px;
  font-weight: bold;
  color: #500d0a;
  text-align: center;
  margin-bottom: 20px;
}
.btn-danger {
  background: #500d0a;
  border: none;
  border-radius: 5px;
}
</style>

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="dashboard-card">
          <div class="dashboard-title">Admin Dashboard</div>
          <p class="text-center">Welcome, {{ Auth::user()->name }}!</p>
          <div class="text-center">
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
