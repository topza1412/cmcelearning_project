<!-- นำ template มาใช้ -->
@extends('layouts.admin.template')

<!-- ส่วนของการแสดงข้อมูล -->
@section('detail') 

<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Setting <a href="#" onclick="location.reload();"><i class="fa fa-refresh"></i></a></h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                        <li class="breadcrumb-item active"><a href="{{url('admin/setting/'.strtolower($data['page']))}}">{{$data['page']}}</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                    <h3 class="text-info"><b><i class="fa fa-edit f-s-30 "></i> ตั้งค่า: {{$data['page']}}</b></h3>

                                    @if($data['type']=='view')
                                    @include('page.admin.include.setting.view')
                                    @else
                                    @include('page.admin.include.setting.form')
                                    @endif

                            </div>
                        </div>
                    </div>
                    <!-- column -->

                </div>

@stop

