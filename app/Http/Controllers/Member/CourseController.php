<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\Category;

class CourseController extends Controller
{

  public function index (Request $request) {

    //seo
    $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
        'Training Course',
        'Training Course',
        'Training Course',
        'Training Course',
        url('course')
        );

    $category = Category::orderby('category_id','desc')->get();


    // $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
    //   ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
    //   ->whereBetween('course.course_price', [$request->minimum_range, $request->maximum_range])
    //   ->where('course.course_status',1)
    //   ->orderby('course.updated_at','desc')
    //   ->paginate(12);

    if($request->minimum_range){
    $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
      ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
      ->where('course.course_price', '>=' , $request->minimum_range)
      ->where('course.course_price', '<=' , $request->maximum_range)
      ->where('course.course_status',1)
      ->orderby('course.updated_at','desc')
      ->paginate(12);
    }
    else{
    $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
      ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
      ->where('course.course_status',1)
      ->orderby('course.updated_at','desc')
      ->paginate(12);
    }

    if(count($detail)>0){

    $data = ['category' => $category,'detail' => $detail,
    'seo' => $seo,
    'minimum_range' => $request->minimum_range,
    'maximum_range' => $request->maximum_range
    ];

    if ($request->ajax()) {
    return view('page.member.ajax.course.detail',['data' => $data]);
    }

    }

    else{
    $data = null;
    return view('page.member.data_not_found',['data' => $data]);
    }


    return view('page.member.course',['data' => $data]);


    }

    public function search_course (Request $request) {

    if($request->post()){

    $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
        $request->txt_search,
        $request->txt_search,
        $request->txt_search,
        $request->txt_search,
        url('search')
        );

    $detail = Course::where('course_name', 'like', '%' .$request->txt_search. '%')
    ->orWhere('course_price', 'like', '%' .$request->txt_search. '%')
    ->orWhere('course_short_description', 'like', '%' .$request->txt_search. '%')
    ->paginate(12);

    $data = ['detail' => $detail,'keyword' => $request->txt_search,'seo' => $seo];

    return view('page.member.search',['data' => $data]);

    }

    else{
    return redirect('/');
    }

    }



    public function category (Request $request,$id=null,$title=null) {

    //seo
    $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
        'Training Course',
        'description',
        'keywords',
        'robots',
        url('course')
        );

    $category = Category::orderby('category_id','desc')->get();
    

    $detail = Course::join('user', 'user.user_id', '=', 'course.course_teacher_id')
      ->where('course.course_cat_id',$request->category_id)
      ->where('course.course_status',1)
      ->orderby('course.updated_at','desc')
      ->paginate(12);


    $data = ['category' => $category,'detail' => $detail,
    'seo' => $seo,
    'minimum_range' => null,
    'maximum_range' => null,
    'category_id' => $id
    ];

    if ($request->ajax()) {
    return view('page.member.ajax.course.detail',['data' => $data]);
    }


    return view('page.member.category',['data' => $data]);

    }



    public function view_course($id,$title) {

      $detail = Course::join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
      ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
      ->where('course.course_id',$id)
      ->first();

      if(count($detail)>0){
        $this->AddViewCourse($id);
      }

      $category = Category::orderby('category_id','desc')->get();

      $course['last'] = Course::where('course_id', '!=' , $id)->orderby('course_id','desc')->limit(6)->get();

      $course['reccommend'] = Course::select('course.course_id','course.course_cat_id','course.course_name','course.course_short_description','course.course_price','course.course_image','course.course_view','course.created_at as date_create','user.first_name','user.last_name')
      ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
      ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
      ->where('course_cat_id',$detail->course_cat_id)
      ->where('course_id', '!=' ,$id)
      ->orderby('course_id','desc')->limit(3)->get();

        //seo
        $seo = $this->Seo(
        asset('upload/member/course/images/'.$detail->course_image),
        $detail->course_name,
        $detail->course_name,
        $detail->course_name,
        $detail->course_name,
        url('course/detail/'.$detail->course_id.'/'.$detail->course_name)
        );

      $data = array('detail' => $detail,'seo' => $seo,'category' => $category,'course' => $course);

    	return view('page.member.view_course',['data' => $data]);
        
    }


    public function AddViewCourse($id){

     $result = Course::find($id);
     $result->course_view = ($result->course_view)+1;
     $result->save();

    }


    public function course_favorite($id) {


      $result = DB::table('course_favorite')->where(['Cou_ID' => $id,'Use_ID' => session('session_id')])->get();

      if(count($result)>0){

      $result = ['result' => false,'message' => 'คุณได้ทำการบันทึกคอร์สนี้แล้ว!'];  

      }

      else{

      $timeout = $this->NextDate(date('Y-m-d'),30,'D');

      $data = [
      'Cou_ID' => $id,
      'Use_ID' => session('session_id'),
      'Cof_Timeout' => $timeout,
      'created_at' => now(),
      'updated_at' => now(),
      ];

      $result = DB::table('course_favorite')->insert($data);

      if($result){
      $result = ['result' => true,'message' => 'บันทึกคอร์สของคุณเรียบร้อย'];
      }
      else{
      $result = ['result' => false,'message' => 'บันทึกคอร์สไม่สำเร็จ!']; 
      }

      }


      return response()->json($result);

        
    }



    public function review_course(Request $request) {

      $result = DB::table('review_course')->where(['Cou_ID' => $request->course_id,'Use_ID' => $request->user_id])->get();

      if(count($result)>0){

      $result = ['result' => false,'message' => 'คุณได้ทำการรีวิวคอร์สนี้แล้ว ไม่สามารถรีวิวซ้ำได้!'];  

      }

      else{

      $data = [
      'Cou_ID' => $request->course_id,
      'Use_ID' => $request->user_id,
      'Rec_Rating' => $request->rating,
      'Rec_Comment' => $request->comment,
      'created_at' => now(),
      'updated_at' => now(),
      ];

      $result = DB::table('review_course')->insert($data);

      if($result){
      $result = ['result' => true,'message' => 'ขอบคุณสำหรับการรีวิวของท่าน'];
      }
      else{
      $result = ['result' => false,'message' => 'ไม่สามารถรีวิวได้!']; 
      }

      }


      return response()->json($result);

        
    }



   
}
