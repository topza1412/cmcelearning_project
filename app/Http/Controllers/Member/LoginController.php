<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Session;
use App\Login;
use App\User;
use Socialite;

class LoginController extends Controller
{

    public function index () {

        //seo
        $seo = $this->Seo(
            asset('upload/admin/logo_web/images/'.$this->SettingWeb()->logo_web),
            'Login',
            'Login',
            'Login',
            'Login',
            url('login'));

        $data = ['seo' => $seo];

        return view('page.member.login',['data' => $data]);
    }


    public function auth(Request $request){

        if($request->post()){

        $this->validate(request(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);


        $token = md5($this->TokenPassword());

    	  $email  = $request->email;
        $password  = md5($request->password).$token;

        $input = array('email' => $email,'password' => $password);

        $field = array('field_email' => 'email','field_password' => 'password');

        $result = Login::ChkLogin($field,$input,2);

        if($result['result']=='login success'){
        if($request->remember_login_user!=null){
        setcookie ("remember_login_user",$request->remember_login,time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("remember_email_user",$request->email,time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("remember_password_user",$request->password,time()+ (10 * 365 * 24 * 60 * 60));
        }
        else{
        setcookie ("remember_login_user",null);
        setcookie ("remember_email_user",null);
        setcookie ("remember_password_user",null);    
        }
        $data = User::find($result['id']);
        session()->put('session_id',$data->user_id);
        session()->put('session_username',$data->email);
        return redirect('dashboard');
        }
        else if($result['result']=='permission failed'){
        return back()->with('error',trans('login.permission_failed'));
        }
        else{
        return back()->with('error','Email or Password Incorrect!');   
        }

        }


    }

    // start login social
    public function social_login($type){
        return Socialite::driver($type)->redirect();
    }

    public function social_callback($type){
       $getInfo = Socialite::driver($type)->stateless()->user(); 
       $user = $this->createUserSocial($getInfo,$type);
       if($user!=false){
       session()->put('session_id',$user->user_id);
       session()->put('session_username',$user->email);
       return redirect()->to('dashboard');
        }
       else{
       return redirect()->to('register');
        }
    }
    

    function createUserSocial($getInfo,$type){
     $user = User::where('social_id', $getInfo->id)->first();
     if ($user==null) {
          $user = new User;
          $user->social_id = $getInfo->id;
          $user->image = $getInfo->avatar_original;
          $user->first_name = $getInfo->name;
          $user->email = $getInfo->email;
          $user->user_type = $type;
          $user->save();

         if(count($user)>0){
          $user = User::select('user_id','first_name')->orderby('user_id','desc')->first();
         }
         else{
          $user = false;
         }

       }
       return $user;
    }
    //end login social
    


    public function logout(){
        Session::flush();
        return redirect('/');
    }


}
