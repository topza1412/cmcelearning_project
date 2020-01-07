<?php

namespace App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
 
     protected $table = 'user';
 
     protected $primaryKey = 'user_id';


     public static function show_all() {

        $all = User::all();

        return $all;
     }


     public static function ChkUpdate($type,$input){

    if($type=='profile'){

    $username = User::where('Use_Username',$input['username'])->where('Use_ID','!=',session('session_id'))->get();
    $email = User::where('Use_Email',$input['email'])->where('Use_ID','!=',session('session_id'))->get();

    if(count($username)>0){
    $value = trans('profile.profile_username_duplicate');
    }

    if(count($email)>0){
    $value = trans('profile.profile_email_duplicate');
    }

    if(count($username)==0 && count($email)==0){

    if(isset($input['img'])){
    $file_upload = ['filename' => $_FILES['img']['name'],'tmp_name' => $_FILES['img']['tmp_name'],'folder' => 'upload/member/profile','width' => 180,'height' => 190];
    $img = Controller::Upload_File($file_upload);
    }
    else{
    $img = $input['img_hidden'];
    }


    $result = User::where('Use_ID',session('session_id'))->update(
    	[
        'Use_Img' => $img,
        'Use_Fullname' => $input['fullname'],
    	'Use_Username' => $input['username'],
    	'Use_Email' => $input['email'],
    	'Use_Tel' => $input['phone'],
        'Use_Facebook' => $input['facebook'],
        'Use_Line' => $input['line_id'],
        'Use_Instagram' => $input['instagram']
    	]);

    }

    }


    if($type=='other'){

    $idcard = User::where('Use_IdCard',$input['id_card'])->where('Use_ID','!=',session('session_id'))->get();

    if(count($idcard)>0){
    $value = trans('profile.profile_idcard_duplicate');
    }

    if(count($idcard)==0){

    $result = User::where('Use_ID',session('session_id'))->update(
        [
        'Use_IdCard' => $input['id_card'],
        'Use_Sex' => $input['sex'],
        'Use_Birthday' => $input['birthday'],
        'Use_Age' => $input['age'],
        'Use_Address' => $input['address'],
        'Use_PROVINCE_ID' => $input['province'],
        'Use_AMPHUR_ID' => $input['amphur'],
        'Use_DISTRICT_ID' => $input['district'],
        'Use_Zipcode' => $input['zipcode'],
        ]);

    }

    }


    if($type=='education'){

    $result = User::where('Use_ID',session('session_id'))->update(
        [
        'Use_School' => $input['school'],
        'Use_Education' => $input['education'],
        'Use_Major' => $input['major'],
        'Use_Faculty' => $input['faculty'],
        'Use_YearEducation' => $input['year_education'],
        ]);

    }



    if($result){
    $value = true;
    }
    else{
    $value = false;
    }

    return $value;

    }
 
}

