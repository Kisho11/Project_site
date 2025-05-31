<?php
  $title = "Reset Password";
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
          <div class="login-title">Reset Password</div>
          @if ($errors->any())
            <div class="alert alert-danger text-center">
              {{ $errors->first() }}
            </div>
          @endif
          <form method="POST" action="{{ route('password.reset', ['token' => $token]) }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
              <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn btn-signin w-100">Reset Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
