
<div class="row wrapper">

                <form action="{{url('admin/orders/Status/action')}}" method="post" enctype="multipart/form-data">
                    @csrf

                  <input type="hidden" name="id" value="{{$data['detail']['order']->order_id}}">

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

                  <div class="col-sm-1 text-left">
                    <div class="col-sm-12">
                    <button href="#" class="btn btn-sm btn-warning pull-right" onClick="window.print();"><i class="fa fa-print"></i> Print</button>
                    </div>
                    </div>           

                  <div class="col-sm-8">
                  </div>

                  <div class="col-sm-3 text-right">
                    <select name="status" class="input-sm form-control input-s-sm inline v-middle">
                    <option value="">===Status===</option>
                      <option value="1" @if($data['detail']['order']->order_status==1){{'selected'}}@endif>Payment</option>
                      <option value="2" @if($data['detail']['order']->order_status==2){{'selected'}}@endif>Wait</option>
                      <option value="3" @if($data['detail']['order']->order_status==3){{'selected'}}@endif>Success</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-info">Save</button>
                  </div>

              </form>

                </div>

          <div class="bg-white alert">

              <div class="row">
                <div class="col-xs-6">
                  <h4>{{$data['detail']['order']->first_name.' '.$data['detail']['order']->last_name}}</h4>
                  <p>{{$data['detail']['order']->address}}</p>
                  <p>
                    Telephone:  {{$data['detail']['order']->phone_number}}
                  </p>
                  <h5>Order status:
                  @if($data['detail']['order']->order_status==1)
                  <b class="text-danger">{{'Payment'}}</b>
                  @elseif($data['detail']['order']->order_status==2)
                  <b class="text-warning">{{'Wait'}}</b>
                  @else
                  <b class="text-info">{{'Success'}}</b>
                  @endif
                  </h5>           
                </div>
                <div class="col-xs-6 text-right">
                  <p class="h4">#{{$data['detail']['order']->order_number}}</p>
                  <h5>{{date("d-M-Y",strtotime($data['detail']['order']->order_date))}}</h5>
                </div>
              </div>          
              <div class="line"></div>
              <table class="table">
                <thead>
                  <tr>
                    <th width="60">QTY</th>
                    <th>DESCRIPTION</th>
                    <th width="140">UNIT PRICE</th>
                    <th width="90">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($data['detail']['order_detail'])>0)
                  <?php 
                  $total_price = 0;
                  $i = 1;?>
                  @foreach($data['detail']['order_detail'] as $value)
                  <?php
                  $total_price += $value->course_price; 
                  ?>
                  <tr>
                    <td>{{$i++}}</td>
                    <td><b>{{$value->course_name}}</b><p>{{$value->course_short_description}}</p></td>
                    <td>{{number_format($value->course_price,0)}} ฿</td>
                    <td>{{number_format($value->course_price,0)}} ฿</td>
                  </tr>
                  @endforeach
                  @else
                  <tr><td colspan="4"></td></tr>
                  @endif
                 
                  <tr>
                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                    <td><b class="text-info">{{number_format($total_price,0)}} ฿</b></td>
                  </tr>
                </tbody>
              </table>              

          </div>
       

