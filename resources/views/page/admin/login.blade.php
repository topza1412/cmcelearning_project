<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

  <title>{{SettingWeb::SettingWeb()->title_web}}</title>

  <link rel="icon" href="{{asset('upload/admin/shortcut_icon/icon.ico')}}" type="image/x-icon" />

<!-- css style sheet ทั้งหมด -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/app.css')}}">

</head>

<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="#">{{SettingWeb::SettingWeb()->title_web}}</a>
      <p align="center">System management {{SettingWeb::SettingWeb()->title_web}}</p>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Login System</strong>
        </header>

        <br>

        <div class="col-lg-12">

         @include('layouts.admin.flash-message')

          @if(count($errors))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div style="padding: 10px;">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                  </ul>
                </div>
              </div>
         @endif

       </div>

        <form action="{{url('admin/login/auth')}}" method="post">
        @csrf

          <div class="form-group col-lg-12">
            <label class="control-label">Email</label>
            <input name="email" type="email" id="email" placeholder="Email" class="form-control input-lg" value="@if(isset($_COOKIE['remember_email'])){{$_COOKIE['remember_email']}}@endif" required>
          </div>
          <div class="form-group col-lg-12">
            <label class="control-label">Password</label>
            <input name="password" type="password" id="password" placeholder="Password" class="form-control input-lg" value="@if(isset($_COOKIE['remember_password'])){{$_COOKIE['remember_password']}}@endif" required>
          </div>

          <div class="form-group col-lg-12">
          <div class="checkbox">
            <label>
              <input name="remember_login" type="checkbox" @if(isset($_COOKIE['remember_login'])){{'checked'}}@endif> Remember Me
            </label>
          </div>

        </div>

        <div class="alert">
          <a href="{{url('admin/forgotpassword')}}" class="pull-right">Forgot password?</a>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>

        </form>

      </section>
    </div>
  </section>

<!-- js -->
<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>
<script src="{{asset('assets/admin/js/app.plugin.js')}}"></script>
<script src="{{asset('assets/admin/js/slimscroll/jquery.slimscroll.min.js')}}"></script>

</body>
</html>
