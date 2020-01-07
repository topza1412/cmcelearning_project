@extends('layouts.member.template')

@section('detail') 

<div class="loader"></div>

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6 text-left">
            <a href="{{url('/')}}">Home</a> > <a href="{{url('myorder')}}" class="text-primary">My Orders</a>
            </div>
             @include('layouts.member.menu_dashboard')

            <br><br>

            <figcaption>
              <div class="row">

                <div class="col-md-12">

                <form action="{{url('myorder/search')}}" method="post" enctype="multipart/form-data">
                    @csrf

                  <div class="col-sm-5 m-b-xs">
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

                  <div class="col-sm-4 m-b-xs">
                  <div class="col-sm-5">
                  <select name="status" class="input-sm form-control">
                    <option value="0">===Status===</option>
                      <option value="1">Payment</option>
                      <option value="2">Wait</option>
                      <option value="3">Success</option>
                    </select>
                    </div>
                    <div class="col-sm-7">
                    <div class="input-group">
                      <input name="txt_search" type="text" class="input-sm form-control" placeholder="Order Number">
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
                            <th>Order number</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($data['detail'])>0)
                    <?php $i = 1;?>
                    @foreach($data['detail'] as $key => $value)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->order_number}}</a></td>
                        <td>{{$value->first_name.' '.$value->last_name}}</td>
                        <td>
                        @if($value->order_status==1)
                        <span class="label label-info">Payment</span>
                        @elseif($value->order_status==2)
                        <span class="label label-warning">Wait</span>
                        @else
                        <span class="label label-success">Success</span>
                        @endif
                        </td>
                        <td>@if($value->order_date!=null){{$value->order_date}}@else {{'-'}}@endif</td>
                        <td>{{number_format($data['total_price_order'][$key],0)}}</td>                                    
                        <td>
                        <a target="_blank" href="{{url('myorder/detail/'.$value->order_id)}}" class="btn btn-success" title="View"><i class="fa fa-eye"></i></a>
                        @if($value->order_status==1)
                        <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('orders/delete/')}}','{{$value->order_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                        @endif
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

