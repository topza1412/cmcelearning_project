<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Cart;
use App\SendMail;
use App\Course;
use App\User;
use App\Orders;
use App\OrderDetail;

class OrdersController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('session_login_user');
    }

    public function index() {

      Cart::clear();

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'My Order',
            'My Order',
            'My Order',
            'My Order',
            url('myorder'));

      $detail = Orders::join('user', 'user.user_id', '=', 'orders.user_id')
      ->where('orders.user_id',session('session_id'))
      ->orderby('orders.order_id','desc')
      ->paginate(10);

      $total_price_order = [];

      foreach ($detail as $value) {

      $order_detail = OrderDetail::join('course', 'course.course_id', '=', 'order_detail.course_id')
      ->where('order_detail.order_id',$value->order_id)
      ->get();

      foreach ($order_detail as $value2) {

      $course_price = $value2->course_price * $value2->qty;

      $total_price_order[] += $course_price;

      }

      }

      $teacher = User::where('user_type',3)->get();

      $data = array('seo' => $seo,'detail' => $detail,'total_price_order' => $total_price_order,'teacher' => $teacher);

      return view('page.member.myorder',['data' => $data]);
    }


    public function detail($id) {

      $detail['order'] = Orders::join('user', 'user.user_id', '=', 'orders.user_id')
      ->where('orders.order_id',$id)
      ->first();

      $teacher = User::where('user_type',3)->get();

      $detail['course'] = OrderDetail::join('orders', 'orders.order_id', '=', 'order_detail.order_id')
      ->join('course', 'course.course_id', '=', 'order_detail.course_id')
      ->where('order_detail.order_id',$id)
      ->get();

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'My Order - '.$detail['order']->order_number,
            'My Order - '.$detail['order']->order_number,
            'My Order - '.$detail['order']->order_number,
            'My Order - '.$detail['order']->order_number,
            url('order/detail/'.$id));

      $data = array('seo' => $seo,'detail' => $detail,'teacher' => $teacher);

      return view('page.member.order_detail',['data' => $data]);
    }


    public function search(Request $request){

      if($request->post()){

      $query = Orders::query();

      if($request->date_start!=null){
      $date_start = date("Y-m-d",strtotime($request->date_start));
      $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), ">=", $date_start);
      }

      if($request->date_end!=null){
      $date_end = date("Y-m-d",strtotime($request->date_end));
      $detail = $query->where(DB::raw("(DATE_FORMAT(orders.created_at,'%Y-%m-%d'))"), "<=", $date_end);
      }

      if($request->status!=null){
      $detail = $query->where('orders.order_status',$request->status);
      }

      if($request->txt_search!=null){
      $detail = $query->where('orders.order_number', 'like', '%' .$request->txt_search. '%');
      $detail = $query->orWhere('user.first_name', 'like', '%' .$request->txt_search. '%');
      $detail = $query->orWhere('user.last_name', 'like', '%' .$request->txt_search. '%');
      }

      $detail = $query->join('user', 'user.user_id', '=', 'orders.user_id')
      ->where('orders.user_id',session('session_id'))
      ->orderby('orders.order_id','desc')
      ->paginate(10);

      $teacher = User::where('user_type',3)->get();

      //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'My Order',
            'My Order',
            'My Order',
            'My Order',
            url('myorder'));

      $data = ['detail' => $detail,'teacher' => $teacher,'seo' => $seo];

      return view('page.member.myorder',['data' => $data]);

      }

    }


    public function delete ($id) {
      
      $result = Orders::where('order_id',$id)->delete();

      if(isset($result)){
      return back()->with('success',trans('other.delete_success'));
      }
      else{
      return back()->with('error',trans('other.delete_not_success'));
      }

    }
}
