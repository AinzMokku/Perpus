@extends('layouts.app')
<style>
  body{
    background-image:url('img/bg-login.jpg');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    animation-delay: -1s;
    
  }
  .login-box{
    color: white;
    animation: fadeIn;
    animation-duration: 8s;
  }

</style>
@include('sc_head')
@section('content')
<body class="hold-transition">
<div class="login-box">
  <div class="login-logo">
    <a style="color: black;" href="{{ url('/dashboard') }}"><b>Perpus</b>WEC</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <!-- Pesan Error -->
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>Email Salah</strong>
        </span>
    @endif

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>Password Salah</strong>
        </span>
    @endif  
     <!-- End Pesan Error -->  
    <form action="{{ route('login') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#">I forgot my password</a><br>
    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
@include('sc_foot')
@endsection

