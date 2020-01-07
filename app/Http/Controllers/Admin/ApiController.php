<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Category;

class ApiController extends Controller
{

  public function __construct(Request $request)
    { 
        if(!$request->ajax()){
        var_dump('Error access data');
        }

    }
    
     public function getdata_category(Request $request){

      $fvalue = explode(",",$request->fvalue);
      $fvalue = $fvalue[0];

      if($request->find==1){
      $result = DB::table('sub_category_level1')
      ->select('Scl1_ID','Scl1_Name')
      ->where('Scl1_Status','0')
      ->where('Cat_ID',$fvalue)
      ->get();

      if (count($result)>0) {
      $temp = '<option value="">:::::&nbsp;เลือกหมวดหมู่รอง&nbsp;:::::</option>';
      foreach($result as $read){
          $temp .= '<option value="'.$read->Scl1_ID.'">'.$read->Scl1_Name.'</option>';
      }
      } else {
        $temp = '<option value="">:::&nbsp;ไม่มีข้อมูล&nbsp;:::</option>';  
      }

      }

      else if($request->find==2){
      $result = DB::table('sub_category_level2')
      ->select('Scl2_ID','Scl2_Name')
      ->where('Scl2_Status','0')
      ->where('Scl1_ID',$fvalue)
      ->get();

      if (count($result)>0) {
      $temp = '<option value="">:::::&nbsp;เลือกหมวดหมู่ย่อย&nbsp;:::::</option>';
      foreach($result as $read){
          $temp .= '<option value="'.$read->Scl2_ID.'">'.$read->Scl2_Name.'</option>';
      }
      } else {
        $temp = '<option value="">:::&nbsp;ไม่มีข้อมูล&nbsp;:::</option>';  
      }

      }

      echo $temp;

    }

}
