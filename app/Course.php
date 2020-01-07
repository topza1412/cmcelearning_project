<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ReviewCourse;

class Course extends Model {
 
     protected $table = 'course';
 
     protected $primaryKey = 'course_id';

     public static function ShowCourseDetail($id){

     	$result['course'] = Course::join('teacher', 'teacher.Tea_ID', '=', 'course.Tea_ID')->where('course.Cou_ID',$id)->first();

      	$result['course_lesson'] = Course::select('course_lesson.Col_ID','course_lesson.Col_Name','course_lesson.Col_SubName')->join('course_lesson', 'course_lesson.Cou_ID', '=', 'course.Cou_ID')->where('course_lesson.Cou_ID',$id)->get();

      	if(count($result['course_lesson'])>0){
      	$result['course_lesson_detail'] = DB::table('course_lesson_detail')
        ->select('course_lesson_detail.Col_ID','course_lesson_detail.Cld_ID','course_lesson_detail.Cld_Name','course_lesson_detail.Cld_Detail','course_lesson_detail.Cld_Time')
        ->join('course_lesson', 'course_lesson.Col_ID', '=', 'course_lesson_detail.Col_ID')
        ->get();
    	}

    	$result['review_course'] = Course::join('review_course', 'review_course.Cou_ID', '=', 'course.Cou_ID')->join('user', 'user.Use_ID', '=', 'review_course.Use_ID')->where('review_course.Cou_ID',$id)->orderby('review_course.Rec_ID','desc')->get();

        $result['sum_review_course'] = Course::select('review_course.Rec_Rating')->join('review_course', 'review_course.Cou_ID', '=', 'course.Cou_ID')->join('user', 'user.Use_ID', '=', 'review_course.Use_ID')->where('review_course.Cou_ID',$id)->orderby('review_course.Rec_ID','desc')->avg('review_course.Rec_Rating');

        return $result;

     }

     public static function ShowCourseLessonDetail($lesson_id){

      	$result = DB::table('course_lesson_detail')
        ->select('*')
        ->join('course_lesson', 'course_lesson.Col_ID', '=', 'course_lesson_detail.Col_ID')
        ->where('course_lesson_detail.Col_ID',$lesson_id)
        ->get();

        return $result;

     }



    public static function AddViewCourse($id){

     $result = Course::find($id);
     $result->Cou_View = ($result->Cou_View)+1;
     $result->save();

    }


    public static function AddViewCourseLesson($id){

     $result = DB::table('course_lesson_detail')
        ->where('Cld_ID',$id)
        ->first();

     $count = $result->Cld_View + 1;

     DB::table('course_lesson_detail')
     	->where('Cld_ID',$id)
        ->update(['Cld_View' => $count]);

    }

}

