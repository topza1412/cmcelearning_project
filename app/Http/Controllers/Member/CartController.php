<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cart;
use App\SendMail;
use App\Course;
use App\User;
use App\Orders;
use App\OrderDetail;
use App\PrePostTest;
use App\PrePostTestSave;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_user');
    }

    public function index() {

      $this->middleware('session_login_user');

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'Cart',
            'Cart',
            'Cart',
            'Cart',
            url('cart'));

      $data = array('seo' => $seo);

      return view('page.member.cart',['data' => $data]);
    }


    public function addtocart(Request $request,$id)
    {   
        $course = Course::find($id);

        $data = [
        'id' => $course->course_id,
        'name' => $course->course_name,
        'quantity' => 1,
        'price' => $course->course_price
        ];

        $addcart = Cart::add($data);

        if(count($addcart)>0)
        {
        return back()->with('success', 'Course added to cart successfully.');
        }
        else{
        return back()->with('error', 'Course added to cart no successfully!');  
        }
    }


    public function updatecart(Request $request)
    {   

        foreach (Cart::getContent() as $key => $value) {

        $data = ['quantity' => array(
        'relative' => false,
        'value' => $request->qty[$key]
        )];

        Cart::update($value->id,$data);

        }

        return back()->with('success', 'Update cart successfully.');

    }


    public function removecart($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('cart');
        }
        return redirect()->back()->with('success', 'Course removed from cart successfully.');
    }


    public function clearcart()
    {
        Cart::clear();

        return redirect('cart');
    }


    public function checkout() {

      $detail = User::find(session('session_id'));

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'Checkout',
            'Checkout',
            'Checkout',
            'Checkout',
            url('checkout'));

      $data = array('detail' => $detail,'seo' => $seo);

      return view('page.member.checkout',['data' => $data]);
    }



    public function transfer_payment(Request $request) {
      

      if($request->ajax()){

      $file_type = strrchr($_FILES['slip_file']['name'], ".");

      if($file_type!='.jpg' and $file_type!='.jpeg' and $file_type!='.png'){
      $result = ['result' => false,'message' => 'Please upload files type only jpg,jpeg,png!'];
      return response()->json($result);
      exit;
      }

      if($_FILES['slip_file']['size']>1048576){
      $result = ['result' => false,'message' => 'Please upload files only size 1 mb!'];
      return response()->json($result);
      exit;
      }

      $order_number = date('dmYHis');//create order

      if($request->slip_file==null){
      $slip_file = null;
      }
      else{
      $file_upload = ['filename' => $_FILES['slip_file']['name'],'tmp_name' => $_FILES['slip_file']['tmp_name'],'folder' => 'upload/member/payment/images','width' => 0,'height' => 0];
      $slip_file = $this->Upload_File($file_upload);
      }

      $result = new Orders;
      $result->order_number = $order_number;
      $result->user_id = $request->user_id;
      $result->order_date = now();
      $result->order_status = 2;
      $result->order_payment_type = 2;
      $result->order_payment_date = $request->payment_date;
      $result->order_payment_time = $request->payment_time;
      $result->order_bank_transfer = $request->bank_transfer;
      $result->order_slip_file = $slip_file;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      if($result){

      foreach (json_decode($request->cart_data) as $value) {

      $result = new OrderDetail;
      $result->order_id = Orders::max('order_id');
      $result->course_id = $value->id;
      $result->qty = $value->quantity;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      $prestest_posttest = PrePostTest::select('test_id')->where('course_id',$value->id)->first();

      if($prestest_posttest!=null){
      $test_id = $prestest_posttest->test_id;
      }
      else{
      $test_id = null;
      }

      $result = new PrePostTestSave;
      $result->test_id = $test_id;
      $result->user_id = $request->user_id;
      $result->course_id = $value->id;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      }

      if($result){

      $result = ['result' => true,'message' => 'Transfer payment success'];

      }

      else{

      $result = ['result' => false,'message' => 'Transfer payment no success!'];

      }


      }

      else{

      $result = ['result' => false,'message' => 'Checkout error!'];

      }

      return response()->json($result);
      exit;

      }

      else{

      $result = ['result' => false,'message' => 'Access denied save data!'];

      return response()->json($result);
      exit;

      }

    }


    public function credit_card(Request $request) {
      

      if($request->ajax()){

      $order_number = date('dmYHis');//create order

      if($request->slip_file==null){
      $slip_file = null;
      }
      else{
      $file_upload = ['filename' => $_FILES['slip_file']['name'],'tmp_name' => $_FILES['slip_file']['tmp_name'],'folder' => 'upload/member/payment/images','width' => 0,'height' => 0];
      $slip_file = $this->Upload_File($file_upload);
      }

      $result = new Orders;
      $result->order_number = $order_number;
      $result->user_id = session('session_id');
      $result->order_date = now();
      $result->order_payment_type = $request->payment_type;
      $result->order_payment_date = $request->payment_date;
      $result->order_slip_file = $slip_file;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      if($result){

      foreach (Cart::getContent() as $value) {

      $result = new OrderDetail;
      $result->order_id = Orders::max('order_id');
      $result->course_id = $value->id;
      $result->qty = $value->quantity;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      }

      if($result){
        
      Cart::clear();

      $result = ['result' => true,'message' => 'Transfer payment success'];

      }

      else{

      $result = ['result' => false,'message' => 'Transfer payment no success!'];

      }


      }

      else{

      $result = ['result' => false,'message' => 'Checkout error!'];

      }

      return response()->json($result);
      exit;

      }

      else{

      $result = ['result' => false,'message' => 'Access denied save data!'];

      return response()->json($result);
      exit;

      }

    }


    public function send_mail(Request $request){

       $data = array(
            'email_from' => $request->email,
            'subject' => 'New Order - ข้อมูลการสั่งซื้อคอร์ส'.' ('.$this->SettingWeb()->title_web.')',
            'page' => 'page.member.mail.contact',
            'input'      =>  $request->all(),
        );

        Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));

       if (Mail::failures()) {
           return back()->with('error','ไม่สามารถส่งข้อมูลการติดต่อได้!');
         }else{
           return back()->with('success','ส่งข้อมูลการติดต่อเรียบร้อย!');
         }


    }
}
