@extends('layouts.member.template')

@section('detail') 

<?php 
Use App\Course;
?>

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('cart')}}" class="text text-primary">Cart</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <!-- start  -->
              <div class="col-md-9">

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

              <form action="{{url('cart/update')}}" method="post">

                @csrf
                
                <h2><b>Cart</b></h2>

                <br>

                <table class="table">

                <thead>
                <tr class="bg-success" style="background-color: #ebebeb; border-radius: 5px;">
                <td width="1%"></td>
                <td width="50%">PRODUCT</td>
                <td align="center">PRICE</td>
                <td align="center">QUANTITY</td>
                <td align="center">TOTAL</td>
                </tr>  
                </thead>

                <tbody>
                @if(!Cart::isEmpty())

                <?php $i = 1;?>

                @foreach(Cart::getContent() as $item)

                <?php $detail = Course::find($item->id);?>

                @if(file_exists(public_path().'/upload/member/course/images/'.$detail->course_image) && $detail->course_image != null)
                <?Php $img = asset('upload/member/course/images/'.$detail->course_image);?>
                @else
                <?Php $img = asset('assets/member/images/no-image.png');?>
                @endif

                <input type="hidden" name="course_id[<?php echo $item->id;?>]" value="{{$item->id}}">

                <tr>
                <td align="center"><br><a href="{{url('cart/delete/'.$item->id)}}" class="text-danger"><i class="fa fa-close"></i></a></td>
                <td align="left">
                <div class="col-md-3">
                <img src="{{$img}}" class="img-responsive">
                </div>
                <div class="col-md-9">
                <p><b>{{Str::words($item->name,20)}}</b>
                <br>
                <small style="color:#aaaaaa;">{{$detail->course_short_description}}</small>
                </p>
                </div>
                </td>
                <td align="center" style="color:#aaaaaa;">฿ {{number_format($item->price,0)}}</td>
                <td class="text-info" align="center"><input type="text" autocomplete="off" minlength="1" readonly name="qty[<?php echo $item->id;?>]" value="{{$item->quantity}}" style="width: 30px; padding-left: 10px;"></td>
                <td class="text-info" align="center">฿ {{number_format($item->price*$item->quantity,0)}}</td>
                </tr> 
                <?php $i++;?>
                @endforeach
                @else
                <tr>
                <td colspan="5">
                @include('page.member.data_not_found')
                </td>
                </tr>
                @endif
                </tbody>

                </table>

                <hr>

                <div class="col-md-7">
                <div class="input-group">
                <input type="text" name="coupon" class="form-control" placeholder="Coupon Code">
                <span class="input-group-addon btn btn-info" style="background-color: #5bc0de; color:#fff;">APPLY COUPON</span>
                </div>
                </div>

                <div class="col-md-5" align="right">
<!--                 <button type="submit" id="btn_check_coupon" class="btn btn-success" style="background-color: #BBBBBB; border-color: #BBBBBB;"><i class="fa fa-refresh"></i> UPDATE CART</button> -->
                <a href="{{url('cart/clear')}}" class="btn btn-warning" style="background-color: #BBBBBB; border-color: #BBBBBB;"><i class="fa fa-trash"></i> CLEAR CART</a>
                </div>

              </form>
                
              </div>
              <!-- end  -->

              <div class="col-md-3">

                <br><br><br>
                
                <div style="background-color: #ebebeb; border-radius: 6px; padding:10px; height: 280px;">

                <h4 style="padding-left: 12px;"><b>Order Summary</b></h4>
                <br>
                <div class="col-md-6" align="left">
                <p>Subtotal:</p>
                </div>
                <div class="col-md-6" align="right">
                <p>฿ {{number_format(\Cart::getSubTotal(),0)}}</p>
                </div>
                <div class="col-md-6" align="left">
                <p><h4><b>Total:</b></h4></p>
                </div>
                <div class="col-md-6" align="right">
                <p><h4><b>฿ {{number_format(\Cart::getSubTotal(),0)}}</b></h4></p>
                </div>
                <div class="col-md-12 alert" align="left">
                <a href="{{url('checkout')}}" class="btn btn-danger btn-lg" style="padding:5px 10px; background-color:#FF0000; width: 210px;"><small>CHECKOUT</small></a>
                </div>

               </div>

                </div>

              </div>

              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 <br>
 </section>

@stop

