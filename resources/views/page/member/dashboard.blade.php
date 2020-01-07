@extends('layouts.member.template')

@section('detail') 

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 text-left">
            <a href="{{url('/')}}">Home</a> > <a href="{{url('dashboard')}}" class="text-primary">Dashboard</a>
            </div>
             @include('layouts.member.menu_dashboard')

            @if(isset($data['detail']['user']['image']))
            <?php $logo = asset('upload/member/profile/images/'.$data['detail']['user']['image']);?>
            @else
            <?php $logo = asset('assets/member/images/no-image.png');?>
            @endif

            <figcaption>
              <div class="row">

                <div class="col-md-12"><hr style="border: 1px solid red;"></div>

                <div class="col-md-2">
                 <img src="{{$logo}}" width="150" height="150">
                </div>

                <div class="col-md-6 text-left">
                <br>
                <p>
                <b>WELCOME TO DASHBOARD</b>
                </p>
                <h4 class="text-success" style="font-size: 26px;"><b>{{$data['detail']['user']['first_name'].' '.$data['detail']['user']['last_name']}}</b></h4>
                 <p>
                <span class="text-info">
                <b>
                @if($data['detail']['user']['user_type']==2)
                <span class="badge badge-primary">Student</span>
                @elseif($data['detail']['user']['user_type']==3)
                <span class="badge badge-success">Teacher</span>
                @endif
                </b>
                </span>
              </p>
                </div>

                <div class="col-md-4">
                <br>
                <div class="col-md-5 text-info" align="center">
                 <h4><b>CREDITS</b></h4>
                 <h4><b>12.95</b></h4>
                </div>
                <div class="col-md-2">
                  <h4>|</h4></div>
                <div class="col-md-5 text-success" align="center">
                 <h4><b>CHAPTERS</b></h4>
                 <h4><b>15</b></h4>
                </div>

                </div>

                <div class="col-md-12">
                <br>
                <blockquote><h4><b>MY WISHLIST</b></h4></blockquote>

                @if(count($data['detail']['wishlist'])>0)
                @foreach ($data['detail']['wishlist'] as $value)

                <?php $id = $value->course_id;

                $teacher_name = $value->first_name.' '.$value->last_name;

                $course_name = iconv_substr($value->course_name,0,20,'utf-8');

                $short_description = iconv_substr($value->course_short_description,0,100,'UTF-8').'...';

                $price = number_format($value->course_price,0);

                $view = $value->course_view;

                $date = date("d",strtotime($value->date_create)).' '.date("M",strtotime($value->date_create)).' '.date("Y",strtotime($value->date_create));

                if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
                {
                $image = asset('upload/member/course/images/'.$value->course_image);
                }
                else{
                $image = asset('assets/member/images/no-image.png');
                }

                $url = url('course/detail/'.$id.'/'.$course_name);

                ?>
                      
                <div class="col-md-3 col-sm-3">
                <div class="mu-latest-course-single">

                <figure class="mu-latest-course-img">

                <a href="{{$url}}"><img src="{{$image}}" height="190" alt="img"></a>

<!--                 <figcaption class="mu-latest-course-imgcaption">
                <i class="fa fa-clock-o"></i> {{$date}}
                </figcaption> -->

                </figure>

                <div class="mu-latest-course-single-content">

                <small style="color:#949494; font-size: 12px;">{{$teacher_name}}</small>

                <h4><a href="{{$url}}"><b>{{$course_name}}</b></a></h4>

                <p>{{$short_description}}</p>

                <div class="mu-latest-course-single-contbottom">
                <p> View {{$view}}
                <span class="mu-course-price text-primary" href="#"><b>{{$price}} THB</b></span>
                </p>
                </div>

                </div>

                </div>
                </div>

                @endforeach
                @else
                @include('page.member.data_not_found')
                @endif

                </div>

                <div class="col-md-12">

                <br>

                <div class="col-md-12">
                <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <div class="col-md-4" align="center">
                <h3 class="text-primary"><b>Your Information</b></h3> 

                <div class="col-md-10" align="left">
                <h4><b>Your Certificate</b></h4> 
                </div>
                <div class="col-md-2" align="left">
                <i class="fa fa-star text-danger"></i>
                </div>

                <div class="col-md-10" align="left">
                <h4><b>Chapter Collection</b></h4> 
                </div>
                <div class="col-md-2" align="left">
                <i class="fa fa-star text-danger"></i>
                </div>

                <div class="col-md-10" align="left">
                <h4><b>Pre & Post Test</b></h4> 
                </div>
                <div class="col-md-2" align="left">
                <i class="fa fa-star text-danger"></i>
                </div>

                </div>

                <div class="col-md-8" align="center">
                <div class="col-md-4">
                  {!! $data['chart']['course_complete']->html() !!}
                </div>
                <div class="col-md-4">
                  {!! $data['chart']['course_done']->html() !!}
                </div>
                <div class="col-md-4">
                  {!! $data['chart']['course_go']->html() !!}
                </div>
                </div>

                {!! Charts::scripts() !!}
                {!! $data['chart']['course_complete']->script() !!}
                {!! $data['chart']['course_done']->script() !!}
                {!! $data['chart']['course_go']->script() !!}

                </div>

              </div>
              </div>
            </div>

              <div class="col-md-12">
              <br>
              <blockquote><h4><b>LAST WATCH</b></h4></blockquote>

              @if(count($data['detail']['last_watch'])>0)
                @foreach ($data['detail']['last_watch'] as $value)

                <?php $id = $value->course_id;

                $teacher_name = $value->first_name.' '.$value->last_name;

                $course_name = iconv_substr($value->course_name,0,20,'utf-8');

                $short_description = iconv_substr($value->course_short_description,0,100,'UTF-8').'...';

                $price = number_format($value->course_price,0);

                $view = $value->course_view;

                $date = date("d",strtotime($value->date_create)).' '.date("M",strtotime($value->date_create)).' '.date("Y",strtotime($value->date_create));

                if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
                {
                $image = asset('upload/member/course/images/'.$value->course_image);
                }
                else{
                $image = asset('assets/member/images/no-image.png');
                }

                $url = url('course/detail/'.$id.'/'.$course_name);

                ?>
                      
                <div class="col-md-3 col-sm-3">
                <div class="mu-latest-course-single">

                <figure class="mu-latest-course-img">

                <a href="{{$url}}"><img src="{{$image}}" height="190" alt="img"></a>

<!--                 <figcaption class="mu-latest-course-imgcaption">
                <i class="fa fa-clock-o"></i> {{$date}}
                </figcaption> -->

                </figure>

                <div class="mu-latest-course-single-content">

                <small style="color:#949494; font-size: 12px;">{{$teacher_name}}</small>

                <h4><a href="{{$url}}"><b>{{$course_name}}</b></a></h4>

                <p>{{$short_description}}</p>

                <div class="mu-latest-course-single-contbottom">
                <p> View {{$view}}
                <span class="mu-course-price text-primary" href="#"><b>{{$price}} THB</b></span>
                </p>
                </div>

                </div>

                </div>
                </div>

                @endforeach
                @else
                @include('page.member.data_not_found')
                @endif

              </div>

              </div>
            </figcaption>
            
          </div>
        </div>
      </div>
    </div>
  </section>
    
@stop

