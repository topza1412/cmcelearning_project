@extends('layouts.member.template')

@section('detail') 
<section class="content">
    <article class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-6 col-12 margin-bottom-20">
              <div class="boxContent">

                  <div class="row">
                    
                    <div id="logreg-forms">
   
          <form class="form-signin" method="post" action="{{url('profile/changepassword/update')}}">
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
            <figure class="logo">
            <a href="{{url('/')}}"><img src="{{asset('upload/admin/logo_web/'.SettingWeb::SettingWeb()->Set_Logo)}}"></a>
            </figure>
            <br>
            <h2 class="mb-3 font-weight-normal"> <b class="text-danger">{{trans('login.forgotpassword_title_changepassword')}}</b></h2>
          </div>
            <hr>
            <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="{{trans('login.placeholder_newpassword')}}" required="" autofocus="">
            </div>
            <div class="form-group">
            <input name="password_confirmation" type="password" class="form-control" placeholder="{{trans('login.placeholder_confirm_newpassword')}}" required="" autofocus="">
            </div>
            <button class="btn btn-success btn-block font-size-18" type="submit"><i class="fas fa-sign-in-alt"></i> {{trans('login.btn_forgotpassword_confirm')}}</button>
            </form>


            </div>

                  </div>
              </div>
            </div>
            
            
            
          </div>
        </div>
      </div>
    </article>
  </section>
  
@stop

