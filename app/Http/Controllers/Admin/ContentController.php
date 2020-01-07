<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{

    public function __construct(Request $request)
    {
        if(!$request->ajax()){
        $this->middleware('session_login_admin');
        }
    }
    
    public function page($page){

      if($page=='home'){
      $logo_web = DB::table('home_page')->orderby('home_page_id','desc')->first();
      $banner = DB::table('banner')->orderby('banner_id','desc')->paginate(9);
      $data = ['page' => 'Home','logo_web' => $logo_web,'banner' => $banner];
      return view('page.admin.content',['data' => $data]);
  	  }

  	  else if($page=='content'){
  	  $about_us = DB::table('about_us')->first();
      $terms = DB::table('terms_condition')->first();
      $pravacy_policy = DB::table('pravacy_policy')->first();
      $contact_us = DB::table('contact_us')->first();
      $id = ['about_id' => isset($about_us->about_id),'terms_id' => isset($terms->terms_id),'pravacy_policy_id' => isset($pravacy_policy->pravacy_id),'contact_id' => isset($contact_us->contact_id)];
  	  $data = ['page' => 'Content','about_us' => $about_us,'terms' => $terms,'pravacy_policy' => $pravacy_policy,'contact_us' => $contact_us];
      return view('page.admin.content',['data' => $data]);
  	  }

  	  else if($page=='email'){
  	  $order = DB::table('email_template')->where('type',0)->first();
      $subscription = DB::table('email_template')->where('type',1)->first();
      $registration = DB::table('email_template')->where('type',2)->first();
      $id = ['order_id' => isset($order->email_id),'subscription_id' => isset($subscription->email_id),'registration_id' => isset($registration->email_id)];
  	  $data = ['page' => 'Email','order' => $order,'subscription' => $subscription,'registration' => $registration,'id' => $id];
      return view('page.admin.content',['data' => $data]);
  	  }

    }



    public function action ($page,Request $request) {

    if($request->post()){

    	if($page=='home'){

      if(isset($request->img)){
      $file_upload = ['filename' => $_FILES['img']['name'],'tmp_name' => $_FILES['img']['tmp_name'],'folder' => 'upload/admin/logo_web/images','width' => 200,'height' => 40];
      $img = $this->Upload_File($file_upload);
      }
      else{
      $img = $request->img_hidden;
      }

      if($request->img_hidden==null){
      $data = [
      'logo_image' => $img,
      'created_at' => now(),
      'updated_at' => now()
      ];
      $result = DB::table('home_page')->insert($data);
      }
      else if($request->img_hidden!=null){
      $data = [
      'logo_image' => $img,
      'updated_at' => now()
      ];
    	$result = DB::table('home_page')->update($data);
      }
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
    	}

      else if($page=='banner'){

      $this->validate(request(), [
            'img' => 'mimes:jpeg,jpg,png|max:3072',
       ]);


      if(isset($request->img)){
      $file_upload = ['filename' => $_FILES['img']['name'],'tmp_name' => $_FILES['img']['tmp_name'],'folder' => 'upload/admin/banner/images','width' => 1920,'height' => 695];
      $img = $this->Upload_File($file_upload);
      }
      else{
      $img = $request->img_banner;
      }

      if($request->type_action=='Create'){

      $data = [
      'banner_image' => $img,
      'banner_title' => $request->title,
      'banner_url' => $request->banner_url,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('banner')->insert($data);
      if($result){
      $result = ['result' => true,'message' => 'Add data success'];
      }
      else{
      $result = ['result' => false,'message' => 'Add data not success'];
      }

      }

      else if($request->type_action=='Edit'){

      $data = [
      'banner_image' => $img,
      'banner_title' => $request->title,
      'banner_url' => $request->banner_url,
      'updated_at' => now()
      ];
      $result = DB::table('banner')->where('banner_id',$request->banner_id)->update($data);
      if($result){
      $result = ['result' => true,'message' => 'Edit data success'];
      }
      else{
      $result = ['result' => false,'message' => 'Edit data not success'];
      }

      }

      return response()->json($result);
      exit;

      }

    	else if($page=='about'){

      $result = DB::table('about_us')->get();

      if(count($result)==0){

      $data = [
      'name_page' => $request->name_page,
      'content' => $request->detail,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('about_us')->insert($data);
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';

      }

      else{

    	$data = [
      'name_page' => $request->name_page,
    	'content' => $request->detail,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'updated_at' => now(),
    	];
    	$result = DB::table('about_us')->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';

      }

    	}

      else if($page=='terms'){

      $result = DB::table('terms_condition')->get();

      if(count($result)==0){

      $data = [
      'name_page' => $request->name_page,
      'content' => $request->detail,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('terms_condition')->insert($data);
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';

      }

      else{

      $data = [
      'name_page' => $request->name_page,
      'content' => $request->detail,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'updated_at' => now(),
      ];
      $result = DB::table('terms_condition')->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';

      }

      }

      else if($page=='pravacy_policy'){

      $result = DB::table('pravacy_policy')->get();

      if(count($result)==0){

      $data = [
      'name_page' => $request->name_page,
      'content' => $request->detail,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('pravacy_policy')->insert($data);
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';

      }

      else{

      $data = [
      'name_page' => $request->name_page,
      'content' => $request->detail,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'updated_at' => now(),
      ];
      $result = DB::table('pravacy_policy')->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';

      }

      }

      else if($page=='contact'){

      $result = DB::table('contact_us')->get();
      
      if(count($result)==0){

      $data = [
      'name_page' => $request->name_page,
      'address' => $request->address,
      'email' => $request->email,
      'map_google' => $request->map_google,
      'longitude' => $request->longitude,
      'latitude' => $request->latitude,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('contact_us')->insert($data);
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
      }

      else {

      $data = [
      'name_page' => $request->name_page,
      'address' => $request->address,
      'email' => $request->email,
      'map_google' => $request->map_google,
      'longitude' => $request->longitude,
      'latitude' => $request->latitude,
      'meta_page_title' => $request->meta_page_title,
      'meta_description' => $request->meta_description,
      'meta_keyword' => $request->meta_keyword,
      'updated_at' => now()
      ];
      $result = DB::table('contact_us')->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
      }

      }


      else if($page=='email_order'){
      
      if($request->id==null){

      $data = [
      'subject' => $request->subject,
      'content' => $request->content,
      'send_to_admin' => $request->send_to_admin,
      'send_to_teacher' => $request->send_to_teacher,
      'send_to_user' => $request->send_to_user,
      'type' => 0,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('email_template')->insert($data);
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
      }

      else{

      $data = [
      'subject' => $request->subject,
      'content' => $request->content,
      'send_to_admin' => $request->send_to_admin,
      'send_to_teacher' => $request->send_to_teacher,
      'send_to_user' => $request->send_to_user,
      'updated_at' => now(),
      ];
      $result = DB::table('email_template')->where('email_id',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
      }

      }

      else if($page=='email_subscription'){
      
      if($request->id==null){

      $data = [
      'subject' => $request->subject,
      'content' => $request->content,
      'send_to_admin' => $request->send_to_admin,
      'send_to_teacher' => $request->send_to_teacher,
      'send_to_user' => $request->send_to_user,
      'type' => 1,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('email_template')->insert($data);
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
      }

      else{

      $data = [
      'subject' => $request->subject,
      'content' => $request->content,
      'send_to_admin' => $request->send_to_admin,
      'send_to_teacher' => $request->send_to_teacher,
      'send_to_user' => $request->send_to_user,
      'updated_at' => now(),
      ];
      $result = DB::table('email_template')->where('email_id',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
      }

      }

      else if($page=='email_registration'){
      
      if($request->id==null){

      $data = [
      'subject' => $request->subject,
      'content' => $request->content,
      'send_to_admin' => $request->send_to_admin,
      'send_to_teacher' => $request->send_to_teacher,
      'send_to_user' => $request->send_to_user,
      'type' => 2,
      'created_at' => now(),
      'updated_at' => now(),
      ];
      $result = DB::table('email_template')->insert($data);
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
      }

      else{

      $data = [
      'subject' => $request->subject,
      'content' => $request->content,
      'send_to_admin' => $request->send_to_admin,
      'send_to_teacher' => $request->send_to_teacher,
      'send_to_user' => $request->send_to_user,
      'updated_at' => now(),
      ];
      $result = DB::table('email_template')->where('email_id',$request->id)->update($data);
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

      if($page=='Banner'){
      $result = DB::table('banner')->where('banner_id',$id)->delete();
      }
      else if($page=='Category'){
      $result = Category::where('category_id',$id)->delete();
      }
      
      else if($page=='Lesson'){
      $result = DB::table('lesson')->where('lesson_id',$id)->delete();
      }
      else if($page=='Gradebook'){
      $result = Gradebook::where('user_course_id',$id)->delete();
      }

      if(isset($result)){
      return back()->with('success',trans('other.delete_success'));
      }
      else{
      return back()->with('error',trans('other.delete_not_success'));
      }

    }

   

}
