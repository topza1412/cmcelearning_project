<!-- นำ template มาใช้ -->
@extends('layouts.admin.template')

<!-- ส่วนของการแสดงข้อมูล -->
@section('detail') 

<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">

              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Content</a></li>
                <li class="active"><a href="{{url('admin/content/'.strtolower($data['page']))}}">{{$data['page']}}</a></li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">{{$data['page']}}</h3>
                <small>Manage data {{$data['page']}}</small>
              </div>

              
              <div class="row">
                
            <div class="col-lg-12">
              <section class="panel panel-default">
                <div class="table-responsive">
                  @include('page.admin.include.content.form')
                </div>
                </div>
                
              </div>
              
      </section>
    </section>
  </section>

@stop

