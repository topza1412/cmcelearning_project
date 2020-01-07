@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('register')}}" class="text text-primary">Register</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-5">
                <!-- start register -->
                    <div id="logreg-forms">
                    
          <form class="form-signin" method="post" action="{{url('register/create')}}">
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
            <h2 class="text text-primary"><b><i class="fa fa-user"></i> Register</b></h2>
          </div>
            <hr>
            <div class="form-group">
            <input name="first_name" type="text" class="form-control" placeholder="First Name" required="" autofocus="" autocomplete="off">
            </div>
            <div class="form-group">
            <input name="last_name" type="text" class="form-control" placeholder="Last Name" required="" autofocus="" autocomplete="off">
            </div>
            <div class="form-group">
            <input name="email" type="email" class="form-control" placeholder="Email Address" required="" autofocus="" autocomplete="off">
            </div>
            <div class="form-group">
            <input name="password" type="password" class="form-control" maxlength="8" placeholder="Password 8 digit" required="" autofocus="" autocomplete="off">
            </div>
            <div class="form-group">
            <input name="password_confirmation" type="password" class="form-control" maxlength="8" placeholder="Confirm password" required="" autofocus="" autocomplete="off">
            </div>
            
            <button class="btn btn-primary btn-block" type="submit">Register</button>

           <div class="clearfix"></div>
            
            </form>
            
    </div>

                <!-- end register -->
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
   </div>
 <br>
 </section>

@stop

