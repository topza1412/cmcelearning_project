<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\SendMail;
use App\User;

class ForgotpasswordController extends Controller
{

    public function __construct()
    {
       
    }

    public function index()
    {   

       $data = ['step' => 'step1','token_email' => null];
       return view('page.admin.forgotpassword',['data' => $data]);  
    }


    public function changepassword($token_email)
    {   

       $data = ['step' => 'step2','token_email' => $token_email];
       return view('page.admin.forgotpassword',['data' => $data]);  
    }

    public function sendmail(Request $request){

        if($request->post()){

        $this->validate(request(), [
            'email' => 'required|string|email|max:255',
        ]);

        $input = $request->all();

        $checkemail = User::where(['email' => $input['email'],'user_type' => 0])->get();

        if(count($checkemail)==0){
        return back()->with('error',trans('login.forgotpassword_email_failed'));
        exit;
        }

        if(count($checkemail)>0){

        //send mail 
        $token_email = base64_encode($input['email']);

        $data = array(
            'email_from' => $this->SettingWeb()->Set_EmailAdmin,
            'subject' => 'Forgot Password - แจ้งลืมรหัสผ่าน'.' ('.$this->SettingWeb()->title_web.')',
            'page' => 'page.member.mail.forgotpassword',
            'input' =>  $request->all(),
            'forgotpassword_link' => url('admin/forgotpassword/changepassword/'.$token_email)
        );

        Mail::to($input['email'])->send(new SendMail($data));

        if (Mail::failures()) {
        return back()->with('error',trans('login.forgotpassword_failed'));   
        }else{
        return back()->with('success',trans('login.forgotpassword_success')); 
        }


        }

        }

        }


    public function verify(Request $request){

        if($request->post()){

        $this->validate(request(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        $input = $request->all();

        $token_email = base64_decode($input['token_email']);

        $token_password = md5($this->SettingWeb()->Set_TokenPasswordWeb);

        $result = User::where(['email' => $token_email,'user_type' => 0])->get();

        if($result==true){
        $result = User::where(['email' => $token_email])->update(['password' => md5($input['password']).$token_password,'updated_at' => now()]);
        if($result==true){
        return back()->with('success',trans('login.forgotpassword_newpassword'));    
        }
        else{
        return back()->with('error',trans('login.forgotpassword_failed'));   
        }
        }
        else{
        return back()->with('error',trans('login.forgotpassword_failed'));    
        }

         }

    }

}
