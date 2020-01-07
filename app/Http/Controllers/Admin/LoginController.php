<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Login;
use App\User;

class LoginController extends Controller
{


    public function index () {

        return view('page.admin.login');
    }


    public function auth(Request $request){

        if($request->post()){

        $this->validate(request(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);


        $token = md5($this->TokenPassword());

    	$email  = $request->email;
        $password  = md5($request->password).$token;

        $input = array('email' => $email,'password' => $password);

        $field = array('field_email' => 'email','field_password' => 'password');


        $result = Login::ChkLogin($field,$input,1);

        if($result['result']=='login success'){
        if($request->remember_login!=null){
        setcookie ("remember_login",$request->remember_login,time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("remember_email",$request->email,time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("remember_password",$request->password,time()+ (10 * 365 * 24 * 60 * 60));
        }
        else{
        setcookie ("remember_login",null);
        setcookie ("remember_email",null);
        setcookie ("remember_password",null);    
        }
        $data = User::find($result['id']);
        session()->put('session_admin_id',$data->user_id);
        session()->put('session_admin_username',$data->email);
        session()->put('session_admin_image',$data->image);
        Session::flash('login_success', true);
        return redirect('admin/home');
        }
        else if($result['result']=='permission failed'){
        return back()->with('error',trans('login.permission_failed'));
        }
        else{
        return back()->with('error',trans('login.login_failed'));   
        }

        }


    }

    public function logout(){
        Session::flush();
        return redirect('admin/login');
    }


}
