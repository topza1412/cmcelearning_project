<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\SendMail;
use App\Register;
use App\User;

class RegisterController extends Controller
{

    public function index () {

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'Register',
            'Register',
            'Register',
            'Register',
            url('register'));

        $data = ['seo' => $seo];

        return view('page.member.register',['data' => $data]);
    }


    public function create(Request $request){

        if($request->post()){

        $this->validate(request(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255',
        ]);

    	$input = $request->all();

        $token = md5($this->TokenPassword());

        $result = Register::ChkRegisterUser($input,$token);

        if($result=='success'){

        $data = array(
            'email_from' => $this->SettingWeb()->email_web,
            'subject' => 'New Register - ยินดีต้อนรับสมาชิกใหม่'.' ('.$this->SettingWeb()->title_web.')',
            'page' => 'page.member.mail.register',
            'input' =>  $request->all(),
        );

        Mail::to($input['email'])->send(new SendMail($data));

        return back()->with('success','Register success'); 
        }
        else if($result==trans('register.register_email_duplicate')){
        return back()->with('error',trans('register.register_email_duplicate')); 
        }
        else if($result=='error'){
        return back()->with('error','Error register!');   
        }


        }


    }


}
