<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;
use App\VisitWeb;
use App\Setting;
use App\Category;
use App\Visit;
use App\SlideBanner;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //language
    public function LangDefault(){

        if(app()->getLocale()=='th'){
            $lang_id = 1;
        }
        else {
            $lang_id = 2;
        }

        return $lang_id;
    }


    //setting web
    public static function SettingWeb(){
        $result = Setting::all();
        return $result[0];
    }

    //logo web
    public static function LogoWeb(){
        $result = DB::table('home_page')->orderby('home_page_id','desc')->first();
        return $result->logo_image;
    }

    //token password web
    public static function TokenPassword(){
      return 'cmcelearning';
    }

    //status web
    public static function StatusWeb(){
        $result = Setting::all();
        if($result[0]->status_web==2){
          return false;
        }
        else{
          return true;
        }
    }

    //setting web
    public static function Seo($logo,$title,$description,$keywords,$robots,$url){

        $seo['logo_seo'] = $logo;
        $seo['title_seo'] = $title;
        $seo['description_seo'] = $description;
        $seo['keywords_seo'] = $keywords;
        $seo['robots_seo'] = $robots;
        $seo['url_seo'] = $url;

        return $seo;
    }


    //slide banner
    public static function SlideBanner(){
        $result = SlideBanner::all();
        return $result;
    }

    //category menu
     public static function CategoryMenu(){
      $menu_main = Category::CategoryMenuMain();
      $menu_sub_level1 = Category::CategoryMenuSubLevel1();
      $menu_sub_level2 = Category::CategoryMenuSubLevel2();

      $result = array ('menu_main' => $menu_main,'menu_sub_level1' => $menu_sub_level1,'menu_sub_level2' => $menu_sub_level2);

      return $result;
    }

    //logo web
    public static function CartCount(){
        return Cart::getContent()->count();
    }

    //session login checking
    public static function SessionLoginChecking(){

    $ip = $_SERVER['REMOTE_ADDR'];

    $session_login = DB::table('session_login')
    ->where('Sel_ID',session('session_login_id'))
    ->where('updated_at', '!=' ,null)
    ->get();

    if(count($session_login)>0){
    Session::flush();
    echo "<script>alert('พบการเข้าสู่ระบบมากกว่า 1 อุปกรณ์ กรุณาทำการเข้าสู่ระบบใหม่อีกครั้ง!');</script>";
    }


    } 

    //check device visit web
    public static function DeviceDetect() {

      if(preg_match("/ipad/i", $_SERVER['HTTP_USER_AGENT'])){
        $device = 'iPad';
      }
      else if(preg_match("/tablet/i", $_SERVER['HTTP_USER_AGENT'])){
        $device = 'tablet';
      }
      else if(preg_match("/iphone/i", $_SERVER['HTTP_USER_AGENT'])){
        $device = 'iPhone';
      }
      else if(preg_match("/android/i", $_SERVER['HTTP_USER_AGENT'])){
        $device = 'Android';
      }
      else{
        $device = 'Desktop';
      }

      VisitWeb::AddVisit($device);

    }


    //thai date
    public function DateThai($type,$strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];

    if($type=='month_year'){
    return "$strMonthThai $strYear";
    }
    else if($type=='year'){
    return "$strYear";
    }

  }


  //next date
  public static function NextDate($start,$next,$type){
 $strdate = explode("-",$start);
 switch($type) {
  case "D" :  return( date("Y-m-d", mktime(0, 0, 0, $strdate["1"], $strdate["2"]+$next,  $strdate["0"]))); break;
  case "M" :  return( date("Y-m-d", mktime(0, 0, 0, $strdate["1"]+$next, $strdate["2"],  $strdate["0"]))); break;
  case "Y" :  return( date("Y-m-d", mktime(0, 0, 0, $strdate["1"], $strdate["2"],  $strdate["0"]+$next))); break;
  default : return( date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+7,  date("Y"))));
 }
}


  //upload file
  public static function Upload_File ($file_upload){

  $file = strrchr($file_upload['filename'], "."); //ตัดนามสกุลไฟล์เก็บไว้
  $filename = (Date("dmy_His").$file); //ตั้งเป็น วันที่_เวลา.นามสกุล

  if(trim($file_upload['tmp_name']) != "")
    {
    if($file_upload['width']==0 && $file_upload['height']==0){
        $images = $file_upload['tmp_name'];
        copy($images,$file_upload['folder'].'/'.$filename);
    }
    else {
    $images = $file_upload['tmp_name'];
        copy($images,$file_upload['folder'].'/'.$filename);
        $width=$file_upload['width']; //*** Fix Width & Heigh (Autu caculate) ***//
        $size=GetimageSize($images);
        $height=$file_upload['height'];

        if($file=='.jpg' or $file=='.jpeg'){
        $images_orig = ImageCreateFromJPEG($images);
        }
        else if($file=='.png'){
        $images_orig = ImageCreateFromPNG($images);
        }

        $photoX = ImagesX($images_orig);
        $photoY = ImagesY($images_orig);
        $images_fin = ImageCreateTrueColor($width, $height);
        ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
        ImageJPEG($images_fin,$file_upload['folder'].'/'.$filename);
        ImagePNG($images_fin,$file_upload['folder'].'/'.$filename);
        ImageDestroy($images_orig);
        ImageDestroy($images_fin);
    }
    }

    return $filename;

  }


  public static function DeleteAllInFolder($folder_path) {
   
    $files = glob($folder_path.'/*');  
       
    // Deleting all the files in the list 
    foreach($files as $file) { 
       
    if(is_file($file))  
    
    // Delete the given file 
    unlink($file);  

  }
  
}

  public static function CourseFavoriteTimeOut(){

    DB::table('course_favorite')->where('Cof_Timeout',date('Y-m-d'))->delete();

  }


  //check userperiod day
  public static function UserPeriodTimeOut(){

    DB::table('user_period')->where('Usp_DateEnd',date('Y-m-d'))->update(['Usp_Status' => 1]);

  }

    
}
