@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('login')}}" class="text text-primary">Login</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-5">
                <!-- start login -->
                    <div id="logreg-forms">
                    
          <form class="form-signin" method="post" action="{{url('login/auth')}}">
          @csrf

          @include('layouts.member.flash-message')

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

            <div align="center">
            <h2 class="text text-primary"><b><i class="fa fa-lock"></i> Signin</b></h2>
          </div>
            <hr>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button" onclick="window.location='{{url('social/login/facebook')}}'"><span><i class="fa fa-facebook-square"></i> <b>Login with facebook</b></span> </button>
                <button class="btn google-btn social-btn" type="button" onclick="window.location='{{url('social/login/google')}}'"><span><i class="fa fa-google-plus"></i> <b>Login with google+</b></span> </button>
            </div>
            <div class="form-group">
            <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email" value="@if(isset($_COOKIE['remember_email_user'])){{$_COOKIE['remember_email_user']}}@endif" required autocomplete="off">
            </div>
            <div class="form-group">
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" value="@if(isset($_COOKIE['remember_password_user'])){{$_COOKIE['remember_password_user']}}@endif" required autocomplete="off">
            </div>
            
            <button class="btn btn-primary btn-block" type="submit">Login</button>

            <button class="btn btn-danger btn-block" type="button" onclick="window.location='{{url('forgotpassword')}}'">Forgot Password?</button>
           <div class="clearfix"></div>
            <div align="left" style="padding: 10px 0px 0px 0px;">
            <input type="checkbox" name="remember_login_user" @if(isset($_COOKIE['remember_login_user'])){{'checked'}}@endif> Remember me
            </div>
            
            </form>
            
    </div>

                <!-- end login -->
             </div>

              <div class="col-md-7">

                <div class="jumbotron">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
              </div>

              </div>

              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 <br>
 </section>

@stop

