<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class VisitWeb extends Model {
 
     protected $table = 'visit_web';
 
     protected $primaryKey = 'Viw_ID';


     public static function AddVisit($device) {

        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];

        $result = new VisitWeb();
        $result->Viw_IP = $ip;
        $result->Viw_Browser = $browser;
        $result->Viw_Device = $device;
        $result->created_at = now();
        $result->updated_at = now();
        $result->save();

     }

 
}

