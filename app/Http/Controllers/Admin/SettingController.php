<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Setting;
use App\Language;
use App\SlideBanner;
use App\Institution;

class SettingController extends Controller
{

  public function __construct()
    {
        // $this->middleware('session_login_admin');
    }
    
    public function page($page){

      if($page=='website'){
      $detail_setting = Setting::all();
      $data = ['page' => 'Website','setting' => $detail_setting,'type' => 'view'];
      return view('page.admin.setting',['data' => $data]);
  	  }
  	  else if($page=='email'){
  	  $detail_setting = Setting::all();
  	  $data = ['page' => 'Email','setting' => $detail_setting,'type' => 'view'];
      return view('page.admin.setting',['data' => $data]);
  	  }
  	  else if($page=='seo'){
  	  $detail_setting = Setting::all();
  	  $data = ['page' => 'SEO','setting' => $detail_setting,'type' => 'view'];
      return view('page.admin.setting',['data' => $data]);
  	  }

    }


    public function form_add ($page) {

  	  if($page=='language'){
  	  $language = null;
  	  $data = ['page' => 'Language','detail' => $language,'type' => 'form','action' => 'เพิ่มข้อมูล'];
      return view('page.admin.setting',['data' => $data]);
  	  }
  	  else if($page=='slider'){
  	  $slider = null;
  	  $data = ['page' => 'Slider','detail' => $slider,'type' => 'form','action' => 'เพิ่มข้อมูล'];
      return view('page.admin.setting',['data' => $data]);
  	  }
      else if($page=='institution'){
      $institution = null;
      $data = ['page' => 'Institution','detail' => $institution,'type' => 'form','action' => 'เพิ่มข้อมูล'];
      return view('page.admin.setting',['data' => $data]);
      }

    }


    public function form_edit ($page,$id) {

  	  if($page=='language'){
  	  $language = Language::where('Lan_ID',$id)->first();
  	  $data = ['page' => 'Language','detail' => $language,'type' => 'form','action' => 'แก้ไขข้อมูล'];
      return view('page.admin.setting',['data' => $data]);
  	  }
  	  else if($page=='slider'){
  	  $slider = SlideBanner::where('Sli_ID',$id)->first();
  	  $data = ['page' => 'Slider','detail' => $slider,'type' => 'form','action' => 'แก้ไขข้อมูล'];
      return view('page.admin.setting',['data' => $data]);
  	  }
      else if($page=='institution'){
      $institution = Institution::where('Inj_ID',$id)->first();
      $data = ['page' => 'Institution','detail' => $institution,'type' => 'form','action' => 'แก้ไขข้อมูล'];
      return view('page.admin.setting',['data' => $data]);
      }

    }

    public function action ($page,Request $request) {

    if($request->post()){

    	if($page=='Website'){

        $this->validate(request(), [
            'logo_web' => 'mimes:jpeg,jpg,png|size:2000',
            ]);

    	if($request->logo_web==null){
    	$logo_web = $request->logo_web_hidden;
    	}
    	else{
      $file_upload = ['filename' => $_FILES['logo_web']['name'],'tmp_name' => $_FILES['logo_web']['tmp_name'],'folder' => 'upload/admin/logo_web','width' => 180,'height' => 45];
      $logo_web = $this->Upload_File($file_upload);
    	}

    	$data = [
    	'Set_Title' => $request->title_web,
    	'Set_Footer' => $request->footer_web,
    	'Set_Logo' => $logo_web,
    	'Set_Url' => $request->url_web,
    	'Set_Address' => $request->address_web,
    	'Set_TokenPasswordWeb' => $request->token_password,
    	'Set_PriceMember' => $request->price_member,
    	'Set_EmailAdmin' => $request->email_admin,
    	'Set_StatusWeb' => $request->status_web,
    	];
    	$result = Setting::where('Set_ID','1')->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
    	}

    	else if($page=='SEO'){
    	$data = [
    	'Set_Robots' => $request->robot_seo,
    	'Set_Description' => $request->description_seo,
    	'Set_Keywords' => $request->keyword_seo,
    	];
    	$result = Setting::where('Set_ID','1')->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
    	}

    	else if($page=='Language'){

    	if($request->type_action=='เพิ่มข้อมูล'){
    	$result = new Language;
    	$result->Lan_Name = $request->name;
    	$result->Lan_Description = $request->description;
    	$result->created_at = now();
    	$result->created_at = now();
    	$result->save();
    	$alert_success = 'add_success';
    	$alert_not_success = 'add_not_success';
    	}
    	else{
    	$data = [
    	'Lan_Name' => $request->name,
    	'Lan_Description' => $request->description,
    	'created_at' => now(),
    	'updated_at' => now(),
    	];
    	$result = Language::where('Lan_ID',$request->id)->update($data);
    	$alert_success = 'edit_success';
    	$alert_not_success = 'edit_not_success';
    	}

    	}

    	else if($page=='Slider'){

        $this->validate(request(), [
            'slide_img' => 'required|mimes:jpeg,jpg,png|size:2000',
            ]);

    	if($request->slide_img==null){
      $slide_img = $request->slide_img_hidden;
      }
      else{
      $file_upload = ['filename' => $_FILES['slide_img']['name'],'tmp_name' => $_FILES['slide_img']['tmp_name'],'folder' => 'upload/member/slide','width' => 0,'height' => 0];
      $slide_img = $this->Upload_File($file_upload);
      }
    	if($request->type_action=='เพิ่มข้อมูล'){
    	$result = new SlideBanner;
    	$result->Sli_Name = $request->name;
    	$result->Sli_Img = $slide_img;
      $result->Sli_Status = 0;
    	$result->created_at = now();
    	$result->created_at = now();
    	$result->save();
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
    	}
    	else{
    	$data = [
    	'Sli_Name' => $request->name,
    	'Sli_Img' => $slide_img,
      'Sli_Status' => $request->status,
    	'updated_at' => now(),
    	];
    	$result = SlideBanner::where('Sli_ID',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
    	}

    	}


      else if($page=='Institution'){

      if($request->slide_img==null){
      $institution_img = $request->institution_img_hidden;
      }
      else{
      $file_upload = ['filename' => $_FILES['institution_img']['name'],'tmp_name' => $_FILES['institution_img']['tmp_name'],'folder' => 'upload/member/institution/images/cover','width' => 0,'height' => 0];
      $institution_img = $this->Upload_File($file_upload);
      }
      if($request->type_action=='เพิ่มข้อมูล'){
      $result = new Institution;
      $result->Inj_Img = $institution_img;
      $result->Inj_Name = $request->name;
      $result->created_at = now();
      $result->created_at = now();
      $result->save();
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
      }
      else{
      $data = [
      'Inj_Img' => $request->name,
      'Inj_Name' => $institution_img,
      'updated_at' => now(),
      ];
      $result = Institution::where('Inj_ID',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
      }

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

    	if($page=='Language'){
    	$result = Language::where('Lan_ID',$id)->delete();
    	}
    	else if($page=='Slider'){
    	$result = SlideBanner::where('Sli_ID',$id)->delete();
    	}
      else if($page=='Institution'){
      $result = Institution::where('Inj_ID',$id)->delete();
      }

    	if($result){
    	return back()->with('success',trans('other.delete_success'));
    	}
    	else{
    	return back()->with('error',trans('other.delete_not_success'));
    	}

    }

}
