@extends('layouts.member.template')

@section('detail') 

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">

            <br><br>

            <div style="border-radius: 5px;border: 1px solid #bbb;">

              <div class="row">

                <div class="col-md-12">

                <div class="col-md-4" align="left">
                <h4 class="text-success"><b>#{{$data['detail']['order']->order_number}}</b></h4>
                </div>

                <div class="col-md-4" align="center">
                <h4 class="text-primary"><b>{{$data['detail']['order']->first_name.' '.$data['detail']['order']->last_name}}</b></h4></div>

                <div class="col-md-4" align="right">
                <h4><b>{{date("d-m-Y",strtotime($data['detail']['order']->order_date))}}</b></h4>
                </div>

                <div class="clearfix"></div>

                <hr>

                <div class="col-md-12"><h4><b>Order detail:</b></h4></div>

                @if(count($data['detail']['course'])>0)
                  <?php $i = 1;?>
                  @foreach($data['detail']['course'] as $value)

                  @if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
                  <?Php $img = asset('upload/member/course/images/'.$value->course_image);?>
                  @else
                  <?Php $img = asset('assets/member/images/no-image.png');?>
                  @endif

                  @foreach($data['teacher'] as $value2)
                  @if($value->course_teacher_id == $value2->user_id)
                  <?php $teacher = $value2->first_name.' '.$value2->last_name;?>
                  @else
                  <?php $teacher = '-';?>
                  @endif
                  @endforeach

                  <div class="col-lg-12 alert">


                  <div class="col-lg-2" align="right">
                  <img class="media-object" src="{{$img}}" alt="img" width="130" height="120">     
                  </div>

                  <div class="col-lg-10">
                  <h4><b><a target="_blank" href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}">{{$value->course_name}}</a></b></h4>
                  <small>{{$value->course_short_description}}</small>
                  <br><br>
                  <b style="color:#0072bc;">{{$value->course_price}} THB</b>       
                  </div>

                </div>

                  @endforeach
                  @else
                  @include('page.member.data_not_found')
                  @endif

              </div>

              </div>

            </div>

            <br>
            
          </div>
        </div>
      </div>
    </div>
  </section>
    
@stop

