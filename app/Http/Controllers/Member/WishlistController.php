<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\SendMail;
use App\Course;
use App\User;
use App\Wishlist;

class WishlistController extends Controller
{

    public function __construct()
    {
        // $this->middleware('session_login_user');
    }

    public function index() {

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'My Wishlist',
            'My Wishlist',
            'My Wishlist',
            'My Wishlist',
            url('mywishlist'));

      $detail = Wishlist::select('wishlist.wishlist_id','wishlist.created_at as date_create','course.course_id','course.course_name','course.course_view','course.course_teacher_id','user.first_name','user.last_name')
      ->join('course', 'course.course_id', '=', 'wishlist.course_id')
      ->join('user', 'user.user_id', '=', 'wishlist.user_id')
      ->where('wishlist.user_id',session('session_id'))
      ->orderby('wishlist.wishlist_id','desc')
      ->paginate(10);

      $teacher = User::where('user_type',3)->get();

      $data = array('seo' => $seo,'detail' => $detail,'teacher' => $teacher);

      return view('page.member.wishlist',['data' => $data]);
    }


    public function search(Request $request){

      if($request->post()){

      $query = Wishlist::query();

      if($request->date_start!=null){
      $date_start = date("Y-m-d",strtotime($request->date_start));
      $detail = $query->where(DB::raw("(DATE_FORMAT(wishlist.created_at,'%Y-%m-%d'))"), ">=", $date_start);
      }

      if($request->date_end!=null){
      $date_end = date("Y-m-d",strtotime($request->date_end));
      $detail = $query->where(DB::raw("(DATE_FORMAT(wishlist.created_at,'%Y-%m-%d'))"), "<=", $date_end);
      }

      if($request->teacher!=null){
      $detail = $query->where('course.course_teacher_id',$request->teacher);
      }

      if($request->txt_search!=null){
      $detail = $query->where('course.course_name', 'like', '%' .$request->txt_search. '%');
      $detail = $query->orWhere('user.first_name', 'like', '%' .$request->txt_search. '%');
      $detail = $query->orWhere('user.last_name', 'like', '%' .$request->txt_search. '%');
      }

      $detail = $query->select('wishlist.wishlist_id','wishlist.created_at as date_create','course.course_id','course.course_name','course.course_view','course.course_teacher_id','user.first_name','user.last_name')
      ->join('course', 'course.course_id', '=', 'wishlist.course_id')
      ->join('user', 'user.user_id', '=', 'wishlist.user_id')
      ->where('wishlist.user_id',session('session_id'))
      ->orderby('wishlist.wishlist_id','desc')
      ->paginate(10);;

      $teacher = User::where('user_type',3)->get();

      //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'My Wishlist',
            'My Wishlist',
            'My Wishlist',
            'My Wishlist',
            url('mywishlist'));

      $data = ['detail' => $detail,'teacher' => $teacher,'seo' => $seo];

      return view('page.member.wishlist',['data' => $data]);

      }

    }


    public function delete ($id) {
      
      $result = Wishlist::where('wishlist_id',$id)->delete();

      if(isset($result)){
      return back()->with('success',trans('other.delete_success'));
      }
      else{
      return back()->with('error',trans('other.delete_not_success'));
      }

    }
}
