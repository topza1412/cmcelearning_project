<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\User;

class ProfileController extends Controller
{

    public function index () {

        $profile = User::where('Use_ID',session('session_id'))->first();

        $province = DB::table('province')
        ->select('*')
        ->get();

        $amphur = DB::table('amphur')
        ->select('*')
        ->get();

        $district = DB::table('district')
        ->select('*')
        ->get();

        //จำนวนวันคงเหลือ
        $member_period = DB::table('user_period')
        ->select(DB::raw("DATEDIFF(Usp_DateEnd,now()) AS Days"))
        ->where('Use_ID',session('session_id'))
        ->where('Usp_Status',0)
        ->first();


        //seo
        $seo = $this->Seo('จัดการข้อมูลส่วนตัว',
            'จัดการข้อมูลส่วนตัว',
            'จัดการข้อมูลส่วนตัว',
            'จัดการข้อมูลส่วนตัว');

        $data = ['profile' => $profile,'seo' => $seo,'province' => $province,'amphur' => $amphur,'district' =>$district,'member_period' => $member_period->Days];

        return view('page.member.profile',['data' => $data]);
    }

    public function changepassword () {

        //seo
        $seo = $this->Seo('เปลี่ยนรหัสผ่าน',
            'เปลี่ยนรหัสผ่าน',
            'เปลี่ยนรหัสผ่าน',
            'เปลี่ยนรหัสผ่าน');

        $data = ['seo' => $seo];

        return view('page.member.changepassword',['data' => $data]);
    }

    public function password_update (Request $request) {

        if($request->post()){

        $this->validate(request(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $input = $request->all();

        $token = md5($this->SettingWeb()->Set_TokenPasswordWeb);

        $result = User::where(['Use_ID' => session('session_id')])->get();

        if($result==true){
        $result = User::where(['Use_ID' => session('session_id')])->update(['Use_Password' => md5($input['password']).$token]);
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



    public function profile_update($type,Request $request){

        if($request->post()){

        if($type=='profile'){
        $this->validate(request(), [
            'img' => 'mimes:jpeg,jpg,png|size:2000',
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|digits:10|numeric',
        ]);
        }
        if($type=='other'){
        $this->validate(request(), [
            'id_card' => 'required|digits:13|numeric',
        ]);
        }

    	$input = $request->all();

        $result = User::ChkUpdate($type,$input);

        if($result==true){
        return back()->with('success',trans('profile.profile_success')); 
        }
        else if($result==trans('profile.profile_username_duplicate')){
        return back()->with('error',trans('profile.profile_username_duplicate')); 
        }
        else if($result==trans('profile.profile_email_duplicate')){
        return back()->with('error',trans('profile.profile_email_duplicate')); 
        }
        else if($result==trans('profile.profile_idcard_duplicate')){
        return back()->with('error',trans('profile.profile_idcard_duplicate')); 
        }
        else{
        return back()->with('error',trans('profile.profile_failed'));   
        }


        }


    }


    public function member_period(){

       $user = User::join('user_period', 'user_period.Use_ID', '=', 'user.Use_ID')->where('user.Use_ID',session('session_id'))->orderby('user_period.Usp_Status','asc')->get();

       //seo
        $seo = $this->Seo('ประวัติการต่ออายุสมาชิก',
            'ประวัติการต่ออายุสมาชิก',
            'ประวัติการต่ออายุสมาชิก',
            'ประวัติการต่ออายุสมาชิก');

      $data = array('user' => $user,'seo' => $seo);

      return view('page.member.member_period',['data' => $data]);

    }


    public function member_referral(){

        $user_link = User::find(session('session_id'));

       $user_referral = User::select('user_period.Usp_DateStart','user_period.Usp_DateEnd','user_period.Usp_Status','user.Use_Fullname','user.Use_Username','user.created_at as date_register')
       ->join('user_referral', 'user_referral.Uss_ID', '=', 'user.Use_ID')
       ->join('user_period', 'user_period.Use_ID', '=', 'user_referral.Uss_ID')
       ->where('user_referral.Use_ID',session('session_id'))
       ->orderby('user_referral.Usr_ID','desc')
       ->paginate(10);

       //seo
        $seo = $this->Seo('แนะนำเพื่อน',
            'แนะนำเพื่อน',
            'แนะนำเพื่อน',
            'แนะนำเพื่อน');

      $data = array('user_link' => $user_link,'user_referral' => $user_referral,'seo' => $seo);

      return view('page.member.member_referral',['data' => $data]);

    }



}
