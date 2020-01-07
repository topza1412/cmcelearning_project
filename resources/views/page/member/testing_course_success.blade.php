@extends('layouts.member.template')

@section('detail') 

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 text-left">
            <a href="{{url('/')}}">Home</a> > <a href="{{url('mycourse')}}">My Courses</a> > <a href="#">Testing Course</a> > <a href="#" class="text-primary">{{$data['title']}}</a>
            </div>
             @include('layouts.member.menu_dashboard')

            <br><br><br>

            <figcaption>
              <div class="row">

                <div class="col-md-12">

      <div class="container">
        <div align="center">
        <h3><b>Testing Course Score</b></h3>
        <p class="text-primary">{{$data['title']}}</p>
      </div>
        <hr>


        <div class="col-md-6" align="center">
        <h4><b>Pre test Score</b></h4>
        <h2><b class="text-primary">{{$data['score_pretest']}}</b>/<b class="text-success">{{$data['question_amount']}}</b></h2>
        </div>

        <div class="col-md-6" align="center">
        <h4><b>Post test Score</b></h4>
        <h2><b class="text-primary">{{$data['score_posttest']}}</b>/<b class="text-success">{{$data['question_amount']}}</b></h2>
        </div>

        <div class="col-md-12" align="center">
        <hr>
        @if($data['status']==1)
        <h1 class="alert alert-danger"><b class="text-danger">FAIL</b></h1>
        @else
        <h1 class="alert alert-success"><b class="text-success">PASS</b></h1>
        @endif
        </div>


      </div>
  
              </div>

              </div>
            </figcaption>
            
          </div>
        </div>
      </div>
    </div>
  </section>
    
@stop


