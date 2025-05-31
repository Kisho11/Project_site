<?php
  $title = "Verify OTP";
?>
@extends('layouts.web.app')

@section('content')

<style>
.address-item .address-icon {
  background: #500d0a !important;
}
.innerContent-wrap {
  margin-top: 80px;
}
.login-card {
  background: #c5b0ae !important;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.login-title {
  font-size: 24px;
  font-weight: bold;
  color: #500d0a;
  text-align: center;
  margin-bottom: 20px;
}
.form-control {
  border-radius: 5px;
  border: 1px solid #500d0a;
}
.btn-signin {
  background: #500d0a;
  border: none;
  border-radius: 5px;
}
</style>

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="login-card">
          <div class="login-title">Verify OTP</div>
          @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
          @endif
          <form method="POST" action="{{ route('verify.otp') }}">
            @csrf
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
              <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required>
            </div>
            <button type="submit" class="btn btn-signin w-100">Verify</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
