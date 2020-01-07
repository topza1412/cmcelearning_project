<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Orders;
use App\OrderDetail;
use App\User;

class OrdersController extends Controller
{ 

  public function __construct()
    {
        $this->middleware('session_login_admin');
    }

    public function page($page){

      $detail = Orders::join('user', 'user.user_id', '=', 'orders.user_id')->orderby('orders.order_id','desc')->paginate(10);


      if(count($detail)>0){
      $total_price_order = [];
      foreach ($detail as $value) {
      $result = OrderDetail::select('order_detail.order_id','course.course_price')
      ->join('course', 'course.course_id', '=', 'order_detail.course_id')
      ->where('order_detail.order_id',$value->order_id)
      ->orderby('order_detail.order_detail_id','asc')->get();
      $total_price_order[] = $result;
      }
      }

      $teacher = User::where('user_type',3)->get();

      $data = ['page' => 'Main','detail' => $detail,'total_price_order' => $total_price_order,'teacher' => $teacher,'type' => 'view'];
      return view('page.admin.orders',['data' => $data]);

    }


    public function search($page,Request $request){

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

      $detail = $query->join('user', 'user.user_id', '=', 'orders.user_id')->orderby('orders.order_id','desc')->paginate(10);

      $teacher = User::where('user_type',3)->get();

      $data = ['page' => 'Main','detail' => $detail,'teacher' => $teacher,'type' => 'view'];

      return view('page.admin.orders',['data' => $data]);

      }

    }


    public function view_data ($id) {

      $detail['order'] = Orders::join('user', 'user.user_id', '=', 'orders.user_id')
      ->where('orders.order_id',$id)
      ->first();

      $detail['order_detail'] =OrderDetail::select('order_detail.order_id','course.course_name','course.course_short_description','course.course_price')
      ->join('course', 'course.course_id', '=', 'order_detail.course_id')
      ->where('order_detail.order_id',$id)
      ->orderby('order_detail.order_detail_id','asc')
      ->get();

      $data = ['page' => 'Orders','type' => 'show','detail' => $detail,'id' => $id];

      return view('page.admin.orders',['data' => $data]);

    }


    public function action ($page,Request $request) {

    if($request->post()){

    	if($page=='Status'){

      $data = [
      'order_status' => $request->status,
      'updated_at' => now(),
      ];
      $result = Orders::where('order_id',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';

    	}


    	if($result){
    	return back()->with('success',trans('other.'.$alert_success));
    	}
    	else{
    	return back()->with('error',trans('other.'.$alert_not_success));
    	}

     }


    }


    public function delete ($page,$id) {
    	
    	$result = Orders::where('order_id',$id)->delete();

    	if(isset($result)){
      return back()->with('success',trans('other.delete_success'));
      }
      else{
      return back()->with('error',trans('other.delete_not_success'));
      }

    }



}
