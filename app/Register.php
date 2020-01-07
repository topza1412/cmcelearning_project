<?php

namespace App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class Register extends Model {

    public static function ChkRegisterUser($input,$token){

    $email = User::where('email',$input['email'])->first();

    if(count($email)>0){
    $value = trans('register.register_email_duplicate');
    return $value;
    }

    if(count($email)==0){  
    
    //add data register
    $result = new User;
    $result->first_name = $input['first_name'];
    $result->last_name = $input['last_name'];
    $result->email = $input['email'];
    $result->password = md5($input['password']).$token;
    $result->user_status = 1;
    $result->user_type = 2;
    $result->user_from = 'register';
    $result->save();

    if($result){

    $value = 'success';

    }

    else{

    $value = 'error';

    }

    }

    else{
    
    $value = 'error';
       
    }

    return $value;

    }
 
}

