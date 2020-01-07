@extends('layouts.member.template')

@section('detail') 

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 text-left">
            <a href="{{url('/')}}">Home</a> > <a href="{{url('mycourse')}}" class="text-primary">My Course</a>
            </div>
             @include('layouts.member.menu_dashboard')

            <br><br>

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

            <figcaption>
              <div class="row">

                <div class="col-md-12">

                <form action="{{url('mycourse/search')}}" method="post" enctype="multipart/form-data">
                    @csrf

                  <div class="col-sm-4 m-b-xs">
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="date" name="date_start" class="input-sm form-control datepicker-input" placeholder="Start Date">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="date" name="date_end" id="date_end" class="input-sm form-control datepicker-input" placeholder="End Date">
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
                      <option value="0">Wait</option>
                      <option value="1">Fail</option>
                      <option value="2">Pass</option>
                    </select>
                    </div>
                  <div class="col-sm-4">
                  <select name="teacher" class="input-sm form-control">
                    <option value="0">Teacher Name</option>
                    @if(count($data['teacher'])>0)
                    @foreach($data['teacher'] as $value)
                      <option value="{{$value->user_id}}">{{$value->first_name.' '.$value->last_name}}</option>
                    @endforeach
                    @endif
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <div class="input-group">
                      <input name="txt_search" type="text" class="input-sm form-control" placeholder="Course Name">
                    </div>
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset Filter</button>
                  </div>

              </form>

              <br><br>

              <div class="col-md-12">

              <table class="table table-striped b-t b-light"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Status</th>
                            <th>Course View</th>
                            <th>Date Create</th>
                            <th>Finish Date</th>
                            <th>Teacher Name</th>
                            <th>Testing</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($data['detail'])>0)
                    <?php $i = 1;?>
                    @foreach($data['detail'] as $key => $value)

                    @if(count($data['preposttest_result'])>0)
                    @if($data['preposttest_result'][$key]->course_id == $value->course_id)
                    <?php $status = $data['preposttest_result'][$key]->pretest_status;?>
                    @else
                    <?php $status = 0;?>
                    @endif
                    @else
                    <?php $status = 0;?>
                    @endif

                    @foreach($data['teacher'] as $value3)
                    @if($value->course_teacher_id == $value3->user_id)
                    <?php $teacher = $value3->first_name.' '.$value3->last_name;?>
                    @else
                    <?php $teacher = '-';?>
                    @endif
                    @endforeach
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->course_name}}</a></td>
                        <td align="center">
                        @if($status==0)
                        <span class="label label-warning">Wait</span>
                        @elseif($status==1)
                        <span class="label label-danger">Fail</span>
                        @elseif($status==2)
                        <span class="label label-success">Pass</span>
                        @endif
                        </td>
                        <td align="center">{{$value->course_view}}</td>
                        <td>@if($data['preposttest_result'][$key]->pretest_score!=null){{date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_create))}}@else{{'-'}}@endif</td>
                        <td>@if($data['preposttest_result'][$key]->posttest_score!=null){{date("d-m-Y",strtotime($data['preposttest_result'][$key]->date_end))}}@else{{'-'}}@endif</td>
                        <td>{{$teacher}}</td>                                    
                        <td>
                        <a href="{{url('mycourse/testing/'.$value->course_id.'/'.$value->course_name.'/1')}}" class="btn btn-success" title="View"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                    <td colspan="9"><div align="center">@include('page.member.data_not_found')</div></td>    
                    </tr>
                    @endif
                </tbody>
                </table>

            <footer class="panel-footer">
              <div class="row">
                <div class="col-sm-2 text-left">
                  <small class="text-muted inline m-t-sm m-b-sm">@if(count($data['detail'])>10){{'Showing 1-10 of'.count($data['detail']).'items'}}@else{{'Showing '.count($data['detail']).' items'}}@endif</small>
                </div>
                <div class="col-sm-8">
                </div>
                <div class="col-sm-3 text-right">                
                  {{$data['detail']->links()}}
                </div>
              </div>
            </footer>

             </div>
  
              </div>

              </div>
            </figcaption>
            
          </div>
        </div>
      </div>
    </div>
  </section>
    
@stop

