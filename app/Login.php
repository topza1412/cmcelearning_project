<?php

namespace App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\User;

class Login extends Model {

    public static function ChkLogin($field,$input,$type){

    $result = User::where($field['field_email'],$input['email'])->where($field['field_password'],$input['password'])->where('user_type',$type)->first();

    if(count($result)>0){

    if($result->user_status==1){   
    $id = $result->user_id;
    $value = array('result' => 'login success','id' => $id);
	}
	else{
	$value = array('result' => 'permission failed');
	}

    }

    else
    {
    $value = array('result' => false);
    }

    return $value;

    }
 
}

