<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Payment;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_user');
    }

    public function index () {

        //seo
        $seo = $this->Seo('แจ้งชำระเงิน',
            'แจ้งชำระเงิน',
            'แจ้งชำระเงิน',
            'แจ้งชำระเงิน');

        $bank_payment = DB::table('bank_payment')->get();

        $data = ['bank_payment' => $bank_payment,'seo' => $seo];

        return view('page.member.payment',['data' => $data]);
    }


    public function create(Request $request){

        if($request->post()){

        $this->validate(request(), [
            'slip' => 'required|mimes:jpeg,jpg,png|size:2000',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|min:10|numeric',
            'price' => 'required|digits:10|numeric',
        ]);

          $file_upload = ['filename' => $_FILES['slip']['name'],'tmp_name' => $_FILES['slip']['tmp_name'],'folder' => 'upload/member/payment','width' => 0,'height' => 0];
          $slip = $this->Upload_File($file_upload);


          $result = new Payment;
          $result->Use_ID = session('session_id');
          $result->Ban_ID = $request->bank;
          $result->Pay_Name = $request->fullname;
          $result->Pay_Email = $request->email;
          $result->Pay_Tel = $request->phone;
          $result->Pay_Slip = $slip;
          $result->Pay_Price = $request->price;
          $result->Pay_Detail = $request->detail;
          $result->Pay_Date = $request->date;
          $result->Pay_Time = $request->time;
          $result->Pay_Type = 1;
          $result->Pay_Status = 0;
          $result->created_at = now();
          $result->updated_at = now();
          $result->save();

        if($result){

          $bank = DB::table('bank_payment')->where('Ban_ID',$request->bank)->first();

          $data = array(
            'email_from' => $this->SettingWeb()->Set_EmailAdmin,
            'subject' => 'New Payment Member - แจ้งชำระเงินค่าสมาชิก'.' ('.$this->SettingWeb()->Set_Title.')',
            'page' => 'page.member.mail.payment',
            'bank' => $bank->Ban_Name,
            'input' =>  $request->all(),
          );

        Mail::to($request->email)->send(new SendMail($data));

        $data = array(
            'email_from' => $request->email,
            'subject' => 'New Payment Member - แจ้งชำระเงินค่าสมาชิก'.' ('.$this->SettingWeb()->Set_Title.')',
            'page' => 'page.member.mail.payment',
            'input' =>  $request->all(),
          );

        Mail::to($this->SettingWeb()->Set_EmailAdmin)->send(new SendMail($data));

        return back()->with('success',trans('payment.payment_success')); 
        }
        else{
        return back()->with('error',trans('payment.payment_failed'));   
        }


        }


    }


}
