<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Charts;
use App\User;
use App\Wishlist;
use App\LastWatch;
use App\Course;

class DashboardController extends Controller
{

  public function __construct()
    {
        $this->middleware('session_login_user');
    }
    
    public function index() {

      $data['user'] = User::where(['user_id' => session('session_id'),'user_type' => 2])->first();

      $data['wishlist'] = Wishlist::select('course.course_id','course.course_cat_id','course.course_name','course.course_short_description','course.course_price','course.course_image','course.course_view','course.created_at as date_create','user.first_name','user.last_name')
      ->join('user', 'user.user_id', '=', 'wishlist.user_id')
      ->join('course', 'course.course_id', '=', 'wishlist.course_id')
      ->where('wishlist.user_id',session('session_id'))
      ->orderby('wishlist.wishlist_id','desc')
      ->limit(5)
      ->get();


      $data['last_watch'] = LastWatch::select('course.course_id','course.course_cat_id','course.course_name','course.course_short_description','course.course_price','course.course_image','course.course_view','course.created_at as date_create','user.first_name','user.last_name')
      ->join('user', 'user.user_id', '=', 'last_watch.user_id')
      ->join('course', 'course.course_id', '=', 'last_watch.course_id')
      ->where('last_watch.user_id',session('session_id'))
      ->orderby('last_watch.last_watch_id','desc')
      ->limit(4)
      ->get();


      if(isset($data['user']->image)){
        $logo = asset('upload/member/profile/images/'.$data['user']->image);
      }
      else{
        $logo = asset('assets/member/images/no-image.png');
      }

        //seo
        $seo = $this->Seo(
            $logo,
            'Dashboard',
            'Dashboard',
            'Dashboard',
            'Dashboard',
            url('dashboard'));


      //create chart
      $chart['course_complete'] = Charts::database(null, 'donut', 'morris')
            ->title(false)
            ->labels(['Course Not Complete','Course Complete'])
            ->values([80,20])
            ->dimensions(1000, 500)
            ->responsive(true);

      $chart['course_done'] = Charts::database(null, 'donut', 'morris')
            ->title(false)
            ->labels(['Course Not Done','Course To Be Done'])
            ->values([80,20])
            ->dimensions(1000, 500)
            ->responsive(true);

      $chart['course_go'] = Charts::database(null, 'donut', 'morris')
            ->title(false)
            ->labels(['Course Not Go','Course To Go'])
            ->values([80,20])
            ->dimensions(1000, 500)
            ->responsive(true);

      $data = array('detail' => $data,'seo' => $seo,'chart' => $chart);
      return view('page.member.dashboard',['data' => $data]);
        
    }
   
}
