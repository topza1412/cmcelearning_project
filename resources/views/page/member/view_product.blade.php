@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('product')}}">Our Products</a> >
      <a href="{{url('product/detail/'.$data['detail']['main']->product_id.'/'.$data['detail']['main']->product_name)}}" class="text text-primary">{{$data['detail']['main']->product_name}}</a>
      <br>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              @if(file_exists(public_path().'/upload/member/product/images/'.$data['detail']['main']->product_image) && $data['detail']['main']->product_image != null)
              <?Php $img = asset('upload/member/product/images/'.$data['detail']['main']->product_image);?>
              @else
              <?Php $img = asset('assets/member/images/no-image.png');?>
              @endif

              <div class="col-md-12">
              <br>
              <img src="{{$img}}" class="img-responsive">
              <span class="news_title">{{$data['detail']['main']->product_name}}</span>
              </div>

              <br>
              
              <div class="col-md-3">
              <blockquote style="padding: 0px 12px;">
              <h5 style="color:#949494;">DATE</h5>
              <h6><b>{{date("d",strtotime($data['detail']['main']->created_at))}} {{date("M",strtotime($data['detail']['main']->created_at))}} {{date("Y",strtotime($data['detail']['main']->created_at))}}</b></h6>
              </blockquote>
              </div>

              <div class="col-md-3">
              <blockquote style="padding: 0px 12px;">
              <h5 style="color:#949494;">VIEW</h5>
              <h6><b>{{$data['detail']['main']->product_view}}</b></h6>
              </blockquote>
              </div>

              <div class="col-md-3">
              <blockquote style="padding: 0px 12px;">
              <h5 style="color:#949494;">SHARE</h5>
              <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_14 a2a_default_style">
                <a class="a2a_button_facebook" title="Shared to facebook"></a>
                <a class="a2a_button_twitter" title="Shared to twitter"></a>
                <a class="a2a_button_line" title="Shared to line"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
              
              </blockquote>
              </div>

              <div class="clearfix"></div>

              <br>

            <div class="col-md-9 alert">
            <br>
            {!! $data['detail']['main']->product_detail !!}
            </div>

            <div class="col-md-3">

            
            <h4 class="text-info"><b style="color:#0072bc;">LATEST</b></h4>
            

            @if(count($data['detail']['last'])>0)

            @foreach($data['detail']['last'] as $value)

            @if(file_exists(public_path().'/upload/member/product/images/'.$value->product_image) && $value->product_image != null)
            <?Php $img = asset('upload/member/product/images/'.$value->product_image);?>
            @else
            <?Php $img = asset('assets/member/images/no-image.png');?>
            @endif

                      <div class="media">
                        <div class="media-left">
                          <a href="{{url('product/detail/'.$value->product_id.'/'.$value->product_name)}}">
                            <img class="media-object" src="{{$img}}" alt="img" width="75px">
                          </a>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><a href="{{url('product/detail/'.$value->product_id.'/'.$value->product_name)}}"><b>{{iconv_substr($value->product_name,0,30,'UTF-8')}}</b></a></h6>                      
                          <p class="small"><i class="fa fa-clock-o"></i> {{date("d",strtotime($value->created_at))}} {{date("M",strtotime($value->created_at))}} {{date("Y",strtotime($value->created_at))}}</p>
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
       </div>
     </div>
   </div>
 <br>
 </section>
    
@stop

