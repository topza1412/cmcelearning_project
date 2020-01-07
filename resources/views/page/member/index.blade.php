@extends('layouts.member.template')

@section('detail') 

@include('layouts.member.slide')

<!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->

            <div class="mu-service-single">
<!--               <span class="fa fa-book"></span> -->
<br>
              <h3><b>News!</b>
              <br>
              Course
              </h3>
              <br>
              <br>
            </div>

            @if(isset($data['course']['course_new']))
            @foreach($data['course']['course_new'] as $value)
            <div class="mu-service-single">
              <h5 class="text-left" style="padding-left: 15px;"><b>{{iconv_substr($value->course_name,0,20,'UTF-8')}}</b></h5>
              <div class="col-lg-3">
              <h4 class="text-primary">
              <b>
              {{date("d",strtotime($value->date_create))}}
              <br>
              {{date("M",strtotime($value->date_create))}}
            </b>
            </h4>
              </div>
              <div class="col-lg-9 small text-left">
              <p>
              {{iconv_substr($value->course_short_description,0,20,'UTF-8')}}
            </p>
            </div>
            <div class="col-lg-12" align="center"><hr><b><a href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}" class="text-primary">Buy Now!</a></b></div>
            </div>
            @endforeach
            @else
            @include('page.member.data_not_found');
            @endif

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->



  <!-- Start poppular course -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">

              <div class="mu-title">
              <br>
              <h2><b><span class="text-primary">POPULAR</span> COURSE</b></h2>
            </div>

               <ul class="nav nav-tabs">
               @if(isset($data['category']))
               @foreach($data['category'] as $key => $value)
              <li class="@if($key==0){{'active'}}@endif"><a data-toggle="tab" href="#{{$value->category_id}}"><b>{{$value->category_name}}</b></a></li>
              @endforeach
              @endif
            </ul>

            <br>

            <div class="tab-content">

            @if(isset($data['category']))
            @foreach($data['category'] as $key => $value)

              <div id="{{$value->category_id}}" class="tab-pane fade @if($key==0){{'in active'}}@endif">
              
              <!-- Start latest course content -->
            <div  class="mu-latest-courses-content">

            @if(count($data['course']['course_poppular'])>0)

            @foreach($data['course']['course_poppular'] as $value2)

            @if($value2->course_cat_id==$value->category_id)

            @if(file_exists(public_path().'/upload/member/course/images/'.$value2->course_image) && $value2->course_image != null)
            <?Php $img = asset('upload/member/course/images/'.$value2->course_image);?>
            @else
            <?Php $img = asset('assets/member/images/no-image.png');?>
            @endif

              <div class="col-lg-3 col-md-3 col-xs-12 alert">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="{{url('course/detail/'.$value2->course_id.'/'.$value2->course_name)}}"><img src="{{$img}}" alt="img" height="190"></a>
<!--                     <figcaption class="mu-latest-course-imgcaption">
                      <i class="fa fa-clock-o"></i> {{date("d",strtotime($value2->date_create))}} {{date("M",strtotime($value2->date_create))}} {{date("Y",strtotime($value2->date_create))}}
                    </figcaption> -->
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <small style="color:#949494; font-size: 12px;">{{$value2->first_name.' '.$value2->last_name}}</small>
                    <h4><a href="{{url('course/detail/'.$value2->course_id.'/'.$value2->course_name)}}"><b>{{iconv_substr($value2->course_name,0,15,'utf-8')}}</b></a></h4>
                    <div class="mu-latest-course-single-contbottom">
                      <p> View {{$value2->course_view}}
                      <span class="mu-course-price text-primary" href="#"><b>{{number_format($value2->course_price,0)}} THB</b></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              
              @endif
              @endforeach
              <div class="col-lg-12" align="center">
              <br><a href="{{url('course')}}" class="btn btn-default">View All Course</a>
              </div>
              @else
              @include('page.member.data_not_found');
              @endif


          </div>
            <!-- End latest course content -->

              </div>

              @endforeach
              @endif

            </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End course -->



  <!-- Start news -->
  <section id="mu-course-content">
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-course-content-area">         
            <div class="row">

              <div class="col-lg-3">
              <div class="mu-title">
              <h3 class="text-left"><b><span class="text-primary">NEWS</span> <br> & EVENT</b></h3>
              <div class="text-left" style="color:#949494;">Lorem ipsum dolor sit amet</div>
              <div align="left"><br><a href="{{url('news')}}" class="btn btn-default">View All</a></div>
              </div>
              </div>


              <!-- Start latest course content -->
            <div class="col-lg-9">
            <div class="mu-course-container">


            @if(count($data['news'])>0)

            @foreach($data['news'] as $value)

            @if(file_exists(public_path().'/upload/member/news/images/'.$value->news_image) && $value->news_image != null)
            <?Php $img = asset('upload/member/news/images/'.$value->news_image);?>
            @else
            <?Php $img = asset('assets/member/images/no-image.png');?>
            @endif

              <div class="col-lg-4 col-md-4 col-xs-12 alert">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}"><img src="{{$img}}" alt="img"  height="190"></a>
                    <figcaption class="mu-latest-course-imgcaption" style="color: #0072bc; font-size: 12px;">
                      {{date("d",strtotime($value->created_at))}} {{date("M",strtotime($value->created_at))}} {{date("Y",strtotime($value->created_at))}}
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <h4><a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}"><b>{{iconv_substr($value->news_title,0,15,'utf-8')}}</b></a></h4>
                    <small style="color:#949494;">{{iconv_substr($value->news_short_content,0,30,'utf-8')}}</small>
                    <div class="mu-latest-course-single-contbottom">
                      <p class="small">
                      <i class="fa fa-clock-o"></i> {{date("d",strtotime($value->created_at))}} {{date("M",strtotime($value->created_at))}} {{date("Y",strtotime($value->created_at))}}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @else
              @include('page.member.data_not_found');
              @endif


            </div>
            </div>
            <!-- End latest course content -->


            </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End news -->

  

  <!-- Start latest course section -->
  <section id="mu-latest-courses">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2 style="color: #1d262d;">WHAT PEOPLE <span>SAY</span></h2>
              <p style="color: #949494;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">


              <div class="col-lg-4 col-md-4 col-xs-12">

                <a href="">

                <div class="mu-latest-course-single hover_slide">

                  <div class="col-lg-3 alert">
                  <img src="{{asset('assets/member/images/testimonial-3.png')}}" width="110px" alt="img" style="border-radius: 50%;">
                  </div>

                  <div class="col-lg-9" style="padding-left: 25px;">
                  <div class="mu-latest-course-single-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore.</p>
                    <div class="mu-latest-course-single-contbottom small">
                      User review
                    </div>
                  </div>
                </div>

                </div>

              </a>

              </div>


               <div class="col-lg-4 col-md-4 col-xs-12">

                <a href="">

                <div class="mu-latest-course-single hover_slide">

                  <div class="col-lg-3 alert">
                  <img src="{{asset('assets/member/images/testimonial-3.png')}}" width="110px" alt="img" style="border-radius: 50%;">
                  </div>

                  <div class="col-lg-9" style="padding-left: 25px;">
                  <div class="mu-latest-course-single-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore.</p>
                    <div class="mu-latest-course-single-contbottom small">
                      User review
                    </div>
                  </div>
                </div>

                </div>

              </a>

              </div>


               <div class="col-lg-4 col-md-4 col-xs-12">

                <a href="">

                <div class="mu-latest-course-single hover_slide">

                  <div class="col-lg-3 alert">
                  <img src="{{asset('assets/member/images/testimonial-3.png')}}" width="110px" alt="img" style="border-radius: 50%;">
                  </div>

                  <div class="col-lg-9" style="padding-left: 25px;">
                  <div class="mu-latest-course-single-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore.</p>
                    <div class="mu-latest-course-single-contbottom small">
                      User review
                    </div>
                  </div>
                </div>

                </div>

              </a>

              </div>


              <div class="col-lg-4 col-md-4 col-xs-12">

                <a href="">

                <div class="mu-latest-course-single hover_slide">

                  <div class="col-lg-3 alert">
                  <img src="{{asset('assets/member/images/testimonial-3.png')}}" width="110px" alt="img" style="border-radius: 50%;">
                  </div>

                  <div class="col-lg-9" style="padding-left: 25px;">
                  <div class="mu-latest-course-single-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore.</p>
                    <div class="mu-latest-course-single-contbottom small">
                      User review
                    </div>
                  </div>
                </div>

                </div>

              </a>

              </div>

              

            </div>
            <!-- End latest course content -->
          </div>
        </div>
      </div>
  </section>
  <!-- End latest course section -->


    
@stop

