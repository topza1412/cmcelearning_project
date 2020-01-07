@extends('layouts.member.template')


@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
<a href="{{url('/')}}">Home</a> > <a href="{{url('course')}}">Course</a> > <a href="{{url('course/detail/'.$data['detail']->course_id.'/'.$data['detail']->course_name)}}" class="text-primary">{{$data['detail']->course_name}}</a>
<hr>
</div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-9">
                
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">

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

                      <div class="mu-latest-course-single">
                        <h2><b>{{$data['detail']->course_name}}</b></h2>

                        <br>

                        <div class="col-md-3">
                        <div class="row">
                        <div class="col-md-4" align="left">
                        <img src="{{asset('assets/member/images/happydoctor.jpg')}}" width="60" height="60">
                        </div>
                        <div class="col-md-8" align="left">
                        <h5 style="color:#949494;">TEACHER</h5>
                        <h6><b>{{$data['detail']->first_name.' '.$data['detail']->last_name}}</b></h6>
                        </div>
                        </div>
                        </div>

                        <div class="col-md-3" style="width: 25%;">
                        <blockquote style="padding: 0px 12px; border-left: 4px solid #949494;">
                        <h5 style="color:gray">CATEGORY</h5>
                        <h6><b>{{$data['detail']->category_name}}</b></h6>
                        </blockquote>
                        </div>

                        <div class="col-md-3" style="width: 19%;">
                        <blockquote style="padding: 0px 12px; border-left: 4px solid #949494;">
                        <h5 style="color:gray">VIEW</h5>
                        <h6><b>{{$data['detail']->course_view}}</b></h6>
                        </blockquote>
                        </div>

                        <div class="col-md-3">
                        <blockquote style="padding: 4px 12px; border-left: 4px solid #949494;">
                        <div class="row">
                        <div class="col-md-6">
                        <button type="button" class="btn btn-default">FREE</button>
                        </div>
                        <div class="col-md-6">
                        <button type="button" class="btn btn-danger" onclick="window.location='{{url('addtocart/'.$data['detail']->course_id)}}';" style="background-color: #FF0000;">ADD TO CART</button>
                        </div>
                      </div>
                        </blockquote>
                        </div>
                        
                          <hr>

                          <div class="col-md-12">
                          <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="{{$data['detail']->course_vdo_url}}"></iframe>
                          </div>
                          </div>

                        <br>

                        <div class="col-md-12">

                          <hr>
   
                        <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#menu">OVERVIEW</a></li>
                        <li><a data-toggle="tab" href="#menu1">CURRICULUM</a></li>
                        <li><a data-toggle="tab" href="#menu2">INSTRUCTOR</a></li>
                        <li><a data-toggle="tab" href="#menu3">REVIEWS</a></li>
                      </ul>

                    </div>

                      <div class="tab-content">

                        <div id="menu" class="tab-pane fade in active">
                        <br>
                        <div class="col-md-12 alert">

                      @if(file_exists(public_path().'/upload/member/course/images/'.$data['detail']->course_image) && $data['detail']->course_image != null)
                      <?php $image = asset('upload/member/course/images/'.$data['detail']->course_image);?>
                      @else
                      <?php $image = asset('assets/member/images/no-image.png');?>
                      @endif

                          <div align="center"><img src="{{$image}}" width="500" height="300"></div>
                          <br>
                          {!! $data['detail']->course_full_description !!}
                        </div>
                        </div>

                        <div id="menu1" class="tab-pane fade">
                          <h3>Menu 1</h3>
                          <p>Some content in menu 1.</p>
                        </div>

                        <div id="menu2" class="tab-pane fade">
                          <h3>Menu 2</h3>
                          <p>Some content in menu 2.</p>
                        </div>

                        <div id="menu3" class="tab-pane fade">
                          <h3>Menu 2</h3>
                          <p>Some content in menu 2.</p>
                        </div>

                      </div>

                      </div> 
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->

                <!-- start related course item -->
                <div class="row">
                  <div class="col-md-12">
                    <hr>
                    <div class="mu-related-item">
                  <blockquote><h3><b>Related Courses</b></h3></blockquote>
                  <div class="mu-related-item-area">
                    <div id="mu-course-container">

                      @if(count($data['course']['reccommend'])>0)
                      @foreach($data['course']['reccommend'] as $value)

                      @if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
                      <?Php $img = asset('upload/member/course/images/'.$value->course_image);?>
                      @else
                      <?Php $img = asset('assets/member/images/no-image.png');?>
                      @endif

                      <div class="col-lg-4 col-md-4 col-xs-12 alert">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}"><img src="{{$img}}" alt="img" height="170"></a>
                          <!-- <figcaption class="mu-latest-course-imgcaption">
                            <i class="fa fa-clock-o"></i> {{date("d",strtotime($value->date_create))}} {{date("M",strtotime($value->date_create))}} {{date("Y",strtotime($value->date_create))}}
                          </figcaption> -->
                        </figure>
                        <div class="mu-latest-course-single-content">
                      <small><b style="color:#949494;">{{$value->first_name.' '.$value->last_name}}</b></small>
                      <h4><a href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}"><b>{{iconv_substr($value->course_name,0,20,'utf-8')}}</b></a></h4>
                      <div class="mu-latest-course-single-contbottom">
                        <p> View {{$value->course_view}}
                        <span class="mu-course-price text-primary" href="#"><b>{{number_format($value->course_price,0)}} THB</b></span>
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
                </div>
                  </div>
                </div>
                <!-- end start related course item -->

                <br>

              </div>

              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">

                  <form name="form_search" id="form_search" method="post" action="{{url('course/search')}}">
                  @csrf
                  <input type="text" name="txt_search" class="form-control" placeholder="Search our course" required>
                  </form>
     
                 <br>

                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h4><b>Course Categories</b></h4>
                    <ul class="mu-sidebar-catg">
                      @if(isset($data['category']))
                      @foreach ($data['category'] as $value)
                      <li><a href="{{url('course/category/'.$value->category_id.'/'.$value->category_name)}}">{{$value->category_name}}</a></li>
                      @endforeach
                      @endif
                    </ul>

                  </div>
                  <!-- end single sidebar -->

                  
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h4><b>Latest Course</b></h4>
                    <div class="mu-sidebar-popular-courses">

                      @if(count($data['course']['last'])>0)
                      @foreach($data['course']['last'] as $value)

                      @if(file_exists(public_path().'/upload/member/course/images/'.$value->course_image) && $value->course_image != null)
                      <?Php $img = asset('upload/member/course/images/'.$value->course_image);?>
                      @else
                      <?Php $img = asset('assets/member/images/no-image.png');?>
                      @endif

                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object" src="{{$img}}" alt="img">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}"><b>{{iconv_substr($value->course_name,0,15,'UTF-8')}}</b></a></h4>                      
                          <span class="popular-course-price text-primary">{{number_format($value->course_price,0)}} THB</span>
                          <p class="small"><i class="fa fa-clock-o"></i> {{date("d",strtotime($value->created_at))}} {{date("M",strtotime($value->created_at))}} {{date("Y",strtotime($value->created_at))}}</p>
                        </div>
                      </div>

                      @endforeach
                      @else
                      @include('page.member.data_not_found')
                      @endif

                    </div>
                  </div>
                  <!-- end single sidebar -->

                  <!-- start ads1 -->
                  <div class="mu-single-sidebar">
                   <img src="{{asset('assets/member/images/no-image.png')}}" class="img-responsive">
                  </div>
                  <!-- end ads1 -->

                  <!-- start ads2 -->
                  <div class="mu-single-sidebar">
                   <img src="{{asset('assets/member/images/no-image.png')}}" class="img-responsive">
                  </div>
                  <!-- end ads2 -->


                </aside>
                <!-- / end sidebar -->
             </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

@stop

