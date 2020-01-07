<style type="text/css">
.text_color{
color:#bbbbbb;
}
</style>

<div class="col-md-6 text-right">
<a href="{{url('dashboard')}}" class="@if(Request::segment('1')=='dashboard') text-info @else text_color @endif"><b>Dashboard</b></a>
&nbsp;
<a href="{{url('mywishlist')}}" class="@if(Request::segment('1')=='mywishlist') text-info @else text_color @endif"><b>My Wishlist</b></a>
&nbsp;
<a href="{{url('mycourse')}}" class="@if(Request::segment('1')=='mycourse') text-info @else text_color @endif"><b>My Course</b></a>
&nbsp;
<a href="{{url('coursebyme')}}" class="@if(Request::segment('1')=='coursebyme') text-info @else text_color @endif"><b>Course by me</b></a>
&nbsp;
<a href="{{url('myorder')}}" class="@if(Request::segment('1')=='myorder') text-info @else text_color @endif"><b>My Order</b></a>
</div>