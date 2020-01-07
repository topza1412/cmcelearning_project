@extends('layouts.admin.template')

@section('detail') 

<section id="content">
          <section class="vbox">          
            <section class="scrollable padder">

            @if($data['type']!='show')

              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Orders</a></li>
                <li class="active"><a href="{{url('admin/orders/'.strtolower($data['page']))}}">{{$data['page']}}</a></li>
              </ul>
              @if($data['page']=='Main')<?php $title = 'Orders';?>@else<?php $title = $data['page'];?>@endif
              <div class="m-b-md">
                <h3 class="m-b-none">{{$title}}</h3>
                <small>Manage data {{$title}}</small>
              </div>
              
              
              <div class="row">
 
            <div class="col-lg-12">
              <section class="panel panel-default">
                <header class="panel-heading">
                  Data view
                  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                </header>

                <section class="panel panel-default">

                <div class="row wrapper">

                <form action="{{url('admin/orders/'.$data['page']).'/search'}}" method="post" enctype="multipart/form-data">
                    @csrf

                  <div class="col-sm-5 m-b-xs">
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="text" name="date_start" class="input-sm form-control datepicker-input" placeholder="Start Date">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="text" name="date_end" id="date_end" class="input-sm form-control datepicker-input" placeholder="End Date">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>             
                  </div>

                  <div class="col-sm-5 m-b-xs">
                  <div class="col-sm-4">
                  <select name="status" class="input-sm form-control">
                    <option value="0">===Status===</option>
                      <option value="1">Payment</option>
                      <option value="2">Wait</option>
                      <option value="3">Success</option>
                    </select>
                    </div>
                    <div class="col-sm-8">
                    <div class="input-group">
                      <input name="txt_search" type="text" class="input-sm form-control" placeholder="Search">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Search</button>
                      </span>
                    </div>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset Filter</button>
                  </div>

              </form>

                </div>

                @endif

                <div class="table-responsive">
                  @if($data['type']=='view')
                  @include('page.admin.include.orders.view')
                  @elseif($data['type']=='form')
                  @include('page.admin.include.orders.form')
                  @else
                  @include('page.admin.include.orders.show')
                  @endif
                </div>
              </section>
                </div>
                
              </div>
              
      </section>
    </section>
  </section>

@stop

