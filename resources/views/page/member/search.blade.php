@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="#">Search</a> > <a href="#" class="text text-primary">{{$data['keyword']}}</a>
      <br><br>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

            <div class="col-md-12">

            @if(count($data['detail'])>0)
            @foreach ($data['detail'] as $value)

            <?php 

            $id = $value->course_id;

            $teacher_name = $value->first_name.' '.$value->last_name;

            $course_name = iconv_substr($value->course_name,0,20,'UTF-8');

            $short_description = iconv_substr($value->course_short_description,0,20,'UTF-8');

            $price = number_format($value->course_price,0);

            $view = $value->course_view;

            $date = date("d",strtotime($value->created_at)).' '.date("M",strtotime($value->created_at)).' '.date("Y",strtotime($value->created_at));

            if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
            {
            $image = asset('upload/member/course/images/'.$value->course_image);
            }
            else{
            $image = asset('assets/member/images/no-image.png');
            }

            $url = url('course/detail/'.$id.'/'.$course_name);

            ?>
                  
            <div class="col-md-4 col-sm-4">
            <div class="mu-latest-course-single">

            <figure class="mu-latest-course-img">

            <a href="{{$url}}"><img src="{{$image}}" height="190" alt="img"></a>

            </figure>

            <div class="mu-latest-course-single-content">

            <small><b style="color:#949494;">{{$teacher_name}}</b></small>

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
            <div class="col-lg-12" align="right">{{$data['detail']->links()}}<div>
            @else
            @include('page.member.data_not_found')
            @endif

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

