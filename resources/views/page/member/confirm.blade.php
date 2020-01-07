@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('cart')}}">Cart</a> > <a href="{{url('checkout')}}" class="text text-primary">Checkout</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <!-- start  -->
              <div class="col-md-9">
                
                <h2><b>Checkout</b></h2>

                <br>

                Returning customer? <a href="{{url('login')}}">Login</a> here for faster checkout

                <br>

                <div class="col-md-12">

                <form class="form-horizontal" id="check_coupon" name="check_coupon" method="get">

                <div class="input-group col-md-6">
                <label>*First name</label>
                <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                </div>

                <div class="input-group col-md-6">
                <label>*Last name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                </div>

                </form>

                </div>
                
              </div>
              <!-- end  -->

              <div class="col-md-3">
                
                <div style="background-color: #ebebeb; border-radius: 6px; padding:10px; height: 280px;">

                <h4 style="padding-left: 12px;"><b>Order Summary</b></h4>
                <br>
                <div class="col-md-6" align="left">
                <p>Subtotal:</p>
                </div>
                <div class="col-md-6" align="right">
                <p>฿ 5,900</p>
                </div>
                <div class="col-md-6" align="left">
                <p>Shipping:</p>
                </div>
                <div class="col-md-6" align="right">
                <p>Free</p>
                </div>
                <div class="col-md-12" align="right">
                <p class="small text-primary">Calculate Shipping</p>
                </div>
                <div class="col-md-6" align="left">
                <p><h4><b>Total:</b></h4></p>
                </div>
                <div class="col-md-6" align="right">
                <p><h4><b>฿ 5,900</b></h4></p>
                </div>
                <div class="col-md-12 alert" align="center">
                <a href="{{url('checkout')}}" class="btn btn-danger btn-lg" style="padding:5px 10px; background-color:#FF0000;">CHECKOUT</a>
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

