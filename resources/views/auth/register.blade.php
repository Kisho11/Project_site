<?php
  $title = "Admin Register";
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
.toggle-password {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #500d0a;
}
</style>

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="login-card">
          <div class="login-title">Admin Register</div>
          @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
          @endif
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="input-group mb-3 position-relative">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              <span class="toggle-password" onclick="togglePassword('password')"><i class="fas fa-eye"></i></span>
            </div>
            <div class="input-group mb-3 position-relative">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
              <span class="toggle-password" onclick="togglePassword('password_confirmation')"><i class="fas fa-eye"></i></span>
            </div>
            <button type="submit" class="btn btn-signin w-100 text-white">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function togglePassword(fieldId) {
  var passwordField = document.getElementById(fieldId);
  var toggleIcon = passwordField.nextElementSibling.querySelector('i');
  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleIcon.className = "fas fa-eye-slash";
  } else {
    passwordField.type = "password";
    toggleIcon.className = "fas fa-eye";
  }
}
</script>
@endsection
