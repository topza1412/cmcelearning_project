<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VisitWeb;
use App\Course;
use App\Category;
use App\News;
class HomeController extends Controller
{

    public function __construct()
    {
        
    }


    public function index()
    {   

        // $device = $this->DeviceDetect();

        $date_today = date('Y-m-d');

        $course['course_new'] = Course::select('course.course_id','course.course_name','course.course_short_description','course.course_price','course.created_at as date_create')
        ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
        ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
        ->where('course.course_status',1)
        ->orderBy('course.course_id','desc')->limit(4)->get();

        $course['course_poppular'] = Course::select('course.course_id','course.course_cat_id','course.course_name','course.course_short_description','course.course_price','course.course_image','course.course_view','course.created_at as date_create','user.first_name','user.last_name')
        ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
        ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
        ->where('course.course_status',1)
        ->orderBy('course.course_id','desc')->get();

        $category = Category::where('category_status',1)->get();

        $news = News::where('news_status',1)->orderby('updated_at','desc')->limit(3)->get();

        // seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->SettingWeb()->logo_web),
            $this->SettingWeb()->seo_description,
            $this->SettingWeb()->seo_keywords,
            $this->SettingWeb()->seo_keywords,
            $this->SettingWeb()->seo_keywords,
            url('/'));

        $data = array('course' => $course,'category' => $category,'news' => $news,'seo' => $seo);

        return view('page.member.index',['data' => $data]);
    }
}
