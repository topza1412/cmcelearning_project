@extends('layouts.member.template')

@section('detail') 

<img src="{{asset('assets/member/images/banner_product.png')}}" class="img-responsive">
<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
        <br>
      <a href="{{url('/')}}">Home</a> > <a href="{{url('product')}}" class="text text-primary">Our Products</a>
      <br><hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              @if(count($data['detail'])>0)
              @foreach($data['detail'] as $key => $value)

              <div class="col-md-12 alert" align="center">
              
              <div class="col-md-6" align="center">
              <img src="{{asset('upload/member/product/images/'.$value->product_image)}}" class="img-responsive">
              </div>

              <div class="col-md-6" align="left" style="padding-left: 50px;">
              <h3 class="text-primary">
              <b>{{$value->product_name}}</b>
              </h3>
              <br>
              <a href="{{url('product/detail/'.$value->product_id.'/'.$value->product_name)}}" class="btn btn-danger btn-lg" style="padding:5px 10px; background-color:#FF0000; width: 210px;"><small>Find out more</small></a>
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
 <br>
 </section>
    
@stop

