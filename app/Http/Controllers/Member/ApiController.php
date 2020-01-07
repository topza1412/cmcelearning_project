<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

  public function __construct(Request $request)
    { 
        if(!$request->ajax()){
        var_dump('Error access data');
        }

    }
    
     public function getdata_address(Request $request){

      $fvalue = explode(",",$request->fvalue);
      $fvalue = $fvalue[0];

      if($request->find==1){
      $result = DB::table('amphur')
      ->select('AMPHUR_ID','AMPHUR_NAME')
      ->where('PROVINCE_ID',$fvalue)
      ->get();

      if (count($result)>0) {
      $temp = '<option value="">:::::&nbsp;เลือกอำเภอ&nbsp;:::::</option>';
      foreach($result as $read){
          $temp .= '<option value="'.$read->AMPHUR_ID.'">'.$read->AMPHUR_NAME.'</option>';
      }
      } else {
        $temp = '<option value="">:::&nbsp;ไม่มีข้อมูล&nbsp;:::</option>';  
      }

      }

      else if($request->find==2){
      $result = DB::table('district')
      ->select('DISTRICT_CODE','DISTRICT_NAME')
      ->where('AMPHUR_ID',$fvalue)
      ->get();

      if (count($result)>0) {
      $temp = '<option value="">:::::&nbsp;เลือกตำบล&nbsp;:::::</option>';
      foreach($result as $read){
          $temp .= '<option value="'.$read->DISTRICT_CODE.'">'.$read->DISTRICT_NAME.'</option>';
      }
      } else {
        $temp = '<option value="">:::&nbsp;ไม่มีข้อมูล&nbsp;:::</option>';  
      }

      }


      else if($request->find==3){
      $result = DB::table('zipcode')
      ->select('ZIPCODE')
      ->where('DISTRICT_CODE',$fvalue)
      ->get();

      if (count($result)>0) {
      foreach($result as $read){
          $temp = $read->ZIPCODE;
      }
      } else {
          $temp = 'ไม่มีข้อมูล';  
      }

      }

      echo $temp;

    }

}
