
@extends('layouts.member.template')


@section('detail') 

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 text-left">
            <a href="{{url('/')}}">Home</a> > <a href="{{url('mywishlist')}}" class="text-primary">My Wishlist</a>
            </div>
             @include('layouts.member.menu_dashboard')

            <br><br>

            <figcaption>
              <div class="row">

                <div class="col-md-12">

                <form action="{{url('mywishlist/search')}}" method="post" enctype="multipart/form-data">
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
                  <div class="col-sm-6">
                  <select name="teacher" class="input-sm form-control">
                    <option value="0">===Teacher Name===</option>
                    @if(count($data['teacher'])>0)
                    @foreach($data['teacher'] as $value)
                      <option value="{{$value->user_id}}">{{$value->first_name.' '.$value->last_name}}</option>
                    @endforeach
                    @endif
                    </select>
                    </div>
                    <div class="col-sm-6">
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
                            <th>View</th>
                            <th>Date</th>
                            <th>Teacher Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($data['detail'])>0)
                    <?php $i = 1;?>
                    @foreach($data['detail'] as $value)
                    @foreach($data['teacher'] as $value2)
                    @if($value->course_teacher_id == $value2->user_id)
                    <?php $teacher = $value2->first_name.' '.$value2->last_name;?>
                    @else
                    <?php $teacher = '-';?>
                    @endif
                    @endforeach
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->course_name}}</a></td>
                        <td>{{$value->course_view}}</td>
                        <td>{{date("d-m-Y",strtotime($value->date_create))}}</td>
                        <td>{{$teacher}}</td>
                        <td>
                        <a target="_blank" href="{{url('course/detail/'.$value->course_id)}}" class="btn btn-success" title="View"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('wishlist/delete/')}}','{{$value->wishlist_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                    <td colspan="9" class="text-danger"><div align="center">{{trans('other.data_not_found')}}</div></td>    
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

