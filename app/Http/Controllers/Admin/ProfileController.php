<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;

class ProfileController extends Controller
{


  public function __construct()
    {
        $this->middleware('session_login_admin');
    }

    public function form ($page) {

      if($page=='changeprofile'){
      $detail = User::where(['user_id' => session('session_admin_id'),'user_type' => 1])->first();
      $data = ['page' => 'ChangeProfile','detail' => $detail,'action' => 'Edit','id' => session('session_admin_id')];
      }
      if($page=='changepassword'){
      $data = ['page' => 'ChangePassword','action' => 'Edit','id' => session('session_admin_id')];
      }

      return view('page.admin.profile',['data' => $data]);

    }


    public function action ($page,Request $request) {

    if($request->post()){

      if($page=='ChangeProfile'){

      $this->validate(request(), [
      'img' => 'mimes:jpeg,jpg,png|max:2048',
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255',
      'phone' => 'digits:10|numeric',
      'id_card' => 'required|digits:13|numeric',
      ]);

      if(isset($request->img)){
      $file_upload = ['filename' => $_FILES['img']['name'],'tmp_name' => $_FILES['img']['tmp_name'],'folder' => 'upload/admin/profile/images','width' => 0,'height' => 0];
      $img = $this->Upload_File($file_upload);
      }
      else{
      $img = $request->img_hidden;
      }

    	$data = [
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'sex' => $request->sex,
      'birthday' => $request->birthday,
      'address' => $request->address,
      'phone_number' => $request->phone,
      'id_card' => $request->id_card,
      'occupation' => $request->occupation,
      'company' => $request->company,
      'image' =>$img,
      'user_status' => $request->status,
      'user_type' => $request->type,
      'updated_at' => now(),
      ];
    	$result = User::where('user_id',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';

      }


      if($page=='ChangePassword'){

     $this->validate(request(), [
      'current_password' => 'required|string|min:8',
      'password_change' => 'required|string|min:8|confirmed',
      'password_change_confirmation' => 'required|string|min:8',
      ]);

      $input = $request->all();

      $token_password = md5($this->TokenPassword());

      if(User::where(['password' => md5($input['current_password']).$token_password,'user_id' => session('session_admin_id')])->first()){

      $data = [
      'password' => md5($input['password_change']).$token_password,
      'updated_at' => now(),
      ];
      $result = User::where('user_id',session('session_admin_id'))->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';

      }

      else{
      return back()->with('error','The current password is not correct.'); 
      }

      }


      }


    	if(isset($result)){
    	return back()->with('success',trans('other.'.$alert_success));
    	}
    	else{
    	return back()->with('error',trans('other.'.$alert_not_success));
    	}

     }


}
