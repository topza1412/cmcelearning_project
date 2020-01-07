@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('news')}}" class="text text-primary">News & Event</a>
      <br>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-12">
              <br>
              <img src="{{asset('assets/member/images/bg_testimonial.jpg')}}" class="img-responsive">
              </div>

              <?php 
              $showing = (count($data['detail'])>0) ? '1-16' : '0';
              ?>
              
              <div class="col-md-12">
              <br>
              <div class="col-md-6">
              <small><span style="color:#aaaaaa;">Showing {{$showing}} of</span> <span class="text-info">{{count($data['detail'])}} results</span></small>
              </div>
              <div class="col-md-6" align="right">
              <select name="" onchange="window.location='{{url('news?search=')}}'+this.value" style="width: 170px;padding: 6px;font-size: 13px;color:#aaa;">
              <option value="">Newly Published</option>
              <option value="1" @if(isset($_GET['search']) && $_GET['search']==1){{'selected'}}@endif>Date</option>
              <option value="2" @if(isset($_GET['search']) && $_GET['search']==2){{'selected'}}@endif>Title</option>
              </select>
              </div>
              <br>

            @if(count($data['detail'])>0)

            @foreach($data['detail'] as $value)

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
                    <h4><a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}"><b>{{iconv_substr($value->news_title,0,20,'utf-8')}}</b></a></h4>
                    <small style="color:#949494;">{{iconv_substr($value->news_short_content,0,30,'utf-8')}}</small>
                    <div class="mu-latest-course-single-contbottom">
                      <p class="small">
                      <i class="fa fa-clock-o"></i> {{date("d",strtotime($value->created_at))}} {{date("M",strtotime($value->created_at))}} {{date("Y",strtotime($value->created_at))}}
                      </p>
                      <p>> <a href="{{url('news/detail/'.$value->news_id.'/'.$value->news_title)}}">Readmore</a></p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @else
              @include('page.member.data_not_found');
              @endif

              <div class="col-md-12" align="right">
              <br>
              {{$data['detail']->links()}}
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

