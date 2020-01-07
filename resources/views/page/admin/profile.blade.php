@extends('layouts.admin.template')

@section('detail') 

<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">

              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">News</a></li>
                <li class="active"><a href="{{url('admin/profile/'.strtolower($data['page']))}}">{{$data['page']}}</a></li>
              </ul>
              @if($data['page']=='Main')<?php $title = 'Profile';?>@else<?php $title = $data['page'];?>@endif
              <div class="m-b-md">
                <h3 class="m-b-none">{{$title}}</h3>
                <small>Manage data {{$title}}</small>
              </div>
              
              <div class="row">
                
            <div class="col-lg-12">

                <section class="panel panel-default">

                <div class="table-responsive">
                  @include('page.admin.include.profile.form')
                </div>
              </section>
                </div>
                
              </div>

    </section>
  </section>

@stop

