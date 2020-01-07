@extends('layouts.member.template')

@section('detail') 

@if($data['level']==1)
<?php 
$title = $data['title'];
$sub_category = (isset($data['data'][0]->Cat_Name)) ? $data['data'][0]->Cat_Name.' -> <a href=#>'.$data['data'][0]->Scl1_Name.'</a>' : null;
?>
@else
<?php 
$title = $data['title'];
$sub_category = (isset($data['data'][0]->Cat_Name)) ? $data['data'][0]->Cat_Name.' -> '.$data['data'][0]->Scl1_Name.' -> <a href=#>'.$data['data'][0]->Scl2_Name.'</a>' : null;
?>
@endif

<section class="content">
    <article class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <div class="headContent margin-bottom-20">
                <h2 class="font-size-28"> <b class="text-primary">หมวดหมู่:</b> <b>{{$title}}</b></h2>
                <p>{{$sub_category}}</p>
                <hr>
              </div>
            </div>
            
            @if(count($data['category'])>0)
            @foreach($data['category'] as $value)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 margin-bottom-20">
              <div class="boxContent">
                <figure>
                  <a href="{{url('course/detail/'.$value->Cou_ID.'/'.$value->Cou_Title)}}"><img src="{{asset('upload/member/course/images/cover/'.$value->Cou_Img)}}"></a>
                </figure>
                
                <figcaption>
                  <div class="row">
                    <div class="col-12 font-size-20" style="padding-left: 45px;">
                      <p class="headContent-ellipsis"><b>{{$value->Cou_Title}}</b></p>
                    </div>
                  
                    <div class="col-12 font-size-16">
                      <div class="row alignText">
                        <div class="col-md-8 col-sm-8 col-8" style="padding-left: 65px;">
                          <p>{{$value->Tea_FullName}} | {{date("d-m-Y",strtotime($value->created_at))}}</p>
                          <p><i class="fas fa-eye"></i> @if($value->Cou_View==null){{0}}@else{{$value->Cou_View}}@endif | <i class="fas fa-thumbs-up"></i> @if($value->Cou_Like==null){{0}}@else{{$value->Cou_Like}}@endif</p>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 col-4 readMore" style="padding-right: 25px;">
                          <a href="{{url('course/detail/'.$value->Cou_ID.'/'.$value->Cou_Title)}}">อ่านต่อ</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </figcaption>
              </div>
            </div>
            @endforeach
            @else
            <div align="center" class="col-md-12 text-danger">ไม่พบข้อมูล!</div>
            @endif

            <div class="col-md-12" align="center">{{$data['category']->links()}}</div>

          </div>
        </div>
      </div>
    </article>
  </section>


  
@stop

