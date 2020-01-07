@extends('layouts.member.template')

@section('detail') 

<style type="text/css">
/* Latest compiled and minified CSS included as External Resource*/

/* Optional theme */

/*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
/*.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}*/
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 55px;
    height: 55px;
    text-align: center;
    padding: 16px 0;
    font-size: 14px;
    line-height: 1.428571429;
    border-radius: 50%;
}
</style>

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

            <br><br>

            <figcaption>
              <div class="row">

                <div class="col-md-12">

      <div class="container">
        <div align="center">
        <h3><b>Testing Course</b></h3>
        <p><a href="{{url('course/detail/'.$data['id'].'/'.$data['title'])}}" target="_blank" class="text-primary">{{$data['title']}}</a></p>
      </div>
        <hr>
    <div class="stepwizard alert">
        <div class="stepwizard-row setup-panel">
            <div class="col-xs-4"> 
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">Step 1</a>
                <p>Pre Test</p>
            </div>
            <div class="stepwizard-step col-xs-4"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">Step 2</a>
                <p>Lesson</p>
            </div>
            <div class="stepwizard-step col-xs-4"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">Step 3</a>
                <p>Post Test</p>
            </div>
<!--             <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Cargo</small></p>
            </div> -->
        </div>
    </div>
    
    <form id="testing_course_save" name="testing_course_save">

      <input type="hidden" name="course_id" value="{{$data['id']}}">
      <input type="hidden" name="title" value="{{$data['title']}}">
      <input type="hidden" name="test_id" value="{{$data['detail']['pretest_posttest_header']->test_id}}">
      <input type="hidden" name="test_save_id" value="{{$data['detail']['preposttest_save']->test_save_id}}">
      <input type="hidden" name="question_amount" value="{{count($data['detail']['question'])}}">

        <div class="panel panel-info setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title"><b>Pre Test</b></h3>
            </div>
            <div class="panel-body">
              <h4 align="center" class="text-info"><b>{{$data['detail']['pretest_posttest_header']->pretest_header}}</b></h4>
              <br>
              @if(count($data['detail']['question'])>0)
              <?php 
              $i = 1;
              $n = 0;
              ?>
              @foreach($data['detail']['question'] as $key => $value)

              <div class="form-group well well-lg"><b>{{$i++.'. '.$value->question}}</b>
              <br>
              @if(count($data['detail']['choice'][$key])>0)
              @foreach($data['detail']['choice'][$key] as $value2)
              &nbsp;&nbsp;&nbsp; <input type="radio" name="choice_pretest[{{$n}}]" value="{{$value2->choice_id}}" required> <small>{{$value2->choice}}</small> <br>
              @endforeach
              @endif
              </div>

              <?php $n++;?>

              @endforeach
              @endif
                
                <button class="btn btn-primary pull-right" type="submit">Next</button>
            </div>
        </div>
        
        <div class="panel panel-info setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title"><b>Lesson</b></h3>
            </div>
            <div class="panel-body">
              <h4 align="center" class="text-info"><b>Lessons in the course</b></h4>
              <br>

                <div class="form-group">

                <table class="table table-bordered">

                <thead class="bg-success">
                <tr>
                <td width="20%"><b>Lesson Name</b></td>
                <td width="50%"><b>Lesson Description</b></td>
                <td width="20%"><b>Lesson Document</b></td>
                <td width="10%"><b>View</b></td>
                </tr>
                </thead>

                <tbody>
                @if(count($data['detail']['lesson'])>0)
                @foreach($data['detail']['lesson'] as $key => $value)
                <tr>
                <td>{{$value->lesson_name}}</td> 
                <td>{{$value->lesson_content}}</td>
                <td>
                @if(file_exists(public_path().'/upload/lesson/file/'.$value->document_file) && $value->document_file!=null)
                <a href="{{url('upload/lesson/file/'.$value->document_file)}}">{{$value->document_file}}</a>
                @else
                {{'-'}}
                @endif
                </td> 
                <td>
                <a href="javascript:void();" class="btn btn-info" onclick="show_lesson('{{$value->lesson_name}}','{{$value->lesson_vdo_url}}','{{$value->lesson_content}}','{{$value->document_file}}');">Open</a>
                </td>
                </tr>
                @endforeach
                @else
                <tr>
                <td colspan="4">@include('page.member.data_not_found')</td>
                </tr>
                @endif
                </tbody>

                </table>

                </div>
                
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-info setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title"><b>Post Test</b></h3>
            </div>
            <div class="panel-body">
              <h4 align="center" class="text-info"><b>{{$data['detail']['pretest_posttest_header']->posttest_header}}</b></h4>
              <br>

              @if(count($data['detail']['question'])>0)
              <?php 
              $i = 1;
              $n = 0;
              ?>
              @foreach($data['detail']['question'] as $key => $value)

              <div class="form-group well well-lg"><b>{{$i++.'. '.$value->question}}</b>
              <br>
              @if(count($data['detail']['choice'][$key])>0)
              @foreach($data['detail']['choice'][$key] as $value2)
              &nbsp;&nbsp;&nbsp; <input type="radio" name="choice_posttest[{{$n}}]" value="{{$value2->choice_id}}" required> <small>{{$value2->choice}}</small> <br>
              @endforeach
              @endif
              </div>

              <?php $n++;?>

              @endforeach
              @endif
              
                <button class="btn btn-success pull-right" type="submit">Finish!</button>
            </div>
        </div>

    </form>
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


