                        <div class="row">

                            <div class="col-lg-12">
            
                        @include('layouts.admin.flash-message')

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

                        </div>
            
                            <div class="col-lg-12">  
                            <table class="table table-striped b-t b-light"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order number</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
<!--                                         <th>Course name</th>
                                        <th>Teacher name</th> -->
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['detail'])>0)
                                <?php 
                                $total_price_order = 0;
                                $i = 1;
                                ?>
                                @foreach($data['detail'] as  $key => $value)
                                @foreach($data['total_price_order'][$key] as $price)
                                <?php $total_price_order += $price->course_price;?>
                                @endforeach
                                @foreach($data['teacher'] as $value2)
                                @if($value->course_teacher_id == $value2->user_id)
                                <?php $teacher = $value2->first_name.' '.$value2->last_name;?>
                                @else
                                <?php $teacher = '-';?>
                                @endif
                                @endforeach
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
                                    <td>@if($value->order_payment_date!=null){{$value->order_payment_date}}@else {{'-'}}@endif</td>
                                    <!-- <td><a href="{{url('course/detail/'.$value->course_id.'/'.$value->course_name)}}" class="text-primary">{{$value->course_name}}</a></td>
                                    <td>{{$teacher}}</td> -->
                                    <td class="text-info"><b>{{number_format($total_price_order,0)}}</b></td>                                    
                                    <td>
                                    <a target="_blank" href="{{url('admin/orders/view/'.$value->order_id)}}" class="btn btn-success" title="View"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/orders/delete/')}}','{{$value->order_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
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
