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

         @if($data['step']=='step1')

        <header class="panel-heading text-center">
          <strong>Forgot Password</strong>
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

        <form action="{{url('admin/forgotpassword/sendmail')}}" method="post">
        @csrf

          <div class="form-group col-lg-12">
            <label class="control-label">Email</label>
            <input name="email" type="email" id="email" placeholder="Email" class="form-control input-lg" required>
          </div>

        <div class="alert">
          <button type="submit" class="btn btn-primary">Confirm</button>
          <br><br>
          <div align="center"><a href="{{url('admin/login')}}"><< Back to login</a></div>
        </div>

        </form>

        @else


        <header class="panel-heading text-center">
          <strong>New Password</strong>
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

        <form action="{{url('admin/forgotpassword/verify')}}" method="post">
        @csrf

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

         <br>

          <div class="form-group col-lg-12">
            <label class="control-label">New Password</label>
            <input name="password" type="password" id="password" placeholder="New Password" class="form-control input-lg" required>
          </div>

          <div class="form-group col-lg-12">
            <label class="control-label">Confirm New Password</label>
            <input name="password_confirmation" type="password" id="password" placeholder="New Password" class="form-control input-lg" required>
          </div>

        <div class="alert">
          <button type="submit" class="btn btn-primary">Confirm</button>
          <br><br>
          <div align="center"><a href="{{url('admin/login')}}"><< Back to login</a></div>
        </div>

        </form>

        @endif

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
