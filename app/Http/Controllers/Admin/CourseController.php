<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Lesson;
use App\LessonFile;
use App\GradeBook;
use App\Category;
use App\ReviewCourse;
use App\User;
use App\PrePostTest;
use App\Question;
use App\Choice;


class CourseController extends Controller
{

    public function __construct(Request $request)
    {
        if(!$request->ajax()){
        $this->middleware('session_login_admin');
        }
    }

    
    public function page($page){

      if($page=='main'){
      $detail = Course::select('user.first_name','user.last_name','course.course_id','course.course_name','course.course_price','course.created_at as date_create','course.updated_at as date_update','course.course_status')
      ->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')
      ->join('user', 'user.user_id', '=', 'course.course_teacher_id')
      ->where('course_category.category_status',1)
      ->orderby('course.course_id','desc')
      ->paginate(10);

      $total_sub = [];
      $total_student = [];
      foreach ($detail as $value) {
      $total_sub[] = DB::table('wishlist')->where('course_id',$value->course_id)->count();
      // $total_student[] = DB::table('orders')->where('course_id',$value->course_id)->count();
      }

      $total_sub = (count($total_sub)>0) ? $total_sub : null;
      // $total_student = (count($total_student)>0) ? $total_student : null;

      $data = ['page' => 'Main','detail' => $detail,'total_sub' => $total_sub,'type' => 'view'];
  	  }
  	  else if($page=='category'){
  	  $detail = Category::orderby('category_id','desc')->paginate(10);
      $data = ['page' => 'Category','detail' => $detail,'type' => 'view'];
  	  }
      
      return view('page.admin.course',['data' => $data]);

    }


    public function search($page,Request $request){

      if($request->post()){

      if($page=='Main'){

      $query = Course::query();

      if($request->date_start!=null){
      $date_start = date("Y-m-d",strtotime($request->date_start));
      $detail = $query->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), ">=", $date_start);
      }

      if($request->date_end!=null){
      $date_end = date("Y-m-d",strtotime($request->date_end));
      $detail = $query->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), "<=", $date_end);
      }

      if($request->status!=null){
      $detail = $query->where('course.course_status',$request->status);
      }

      if($request->txt_search!=null){
      $detail = $query->where('course.course_name', 'like', '%' .$request->txt_search. '%');
      $detail = $query->orWhere('user.first_name', 'like', '%' .$request->txt_search. '%');
      $detail = $query->orWhere('user.last_name', 'like', '%' .$request->txt_search. '%');
      $detail = $query->orWhere('course.course_price', 'like', '%' .$request->txt_search. '%');
      }

      $detail = $query->select('user.first_name','user.last_name','course.course_id','course.course_name','course.course_price','course.created_at as date_create','course.updated_at as date_update','course.course_status')->join('user', 'user.user_id', '=', 'course.course_teacher_id')->orderby('course.course_id','desc')->paginate(10);

      $total_sub = [];
      // $total_student = [];
      foreach ($detail as $value) {
      $total_sub[] = DB::table('wishlist')->where('course_id',$value->course_id)->count();
      }

      $total_sub = (count($total_sub)>0) ? $total_sub : null;
      // $total_student = (count($total_student)>0) ? $total_student : null;

      $data = ['page' => 'Main','detail' => $detail,'total_sub' => $total_sub,'type' => 'view'];

      return view('page.admin.course',['data' => $data]);

      }

      else{

      $query = Category::query();

      if($request->date_start!=null){
      $date_start = date("Y-m-d",strtotime($request->date_start));
      $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), ">=", $date_start);
      }

      if($request->date_end!=null){
      $date_end = date("Y-m-d",strtotime($request->date_end));
      $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "<=", $date_end);
      }

      if($request->status!=null){
      $detail = $query->where('category_status',$request->status);
      }

      if($request->txt_search!=null){
      $detail = $query->where('category_name', 'like', '%' .$request->txt_search. '%');
      }

      $detail = $query->orderby('category_id','desc')->paginate(10);

      $data = ['page' => 'Category','detail' => $detail,'type' => 'view'];

      return view('page.admin.course',['data' => $data]);

      }


      }

    }


    public function form_add ($page) {

      if($page=='main'){
      $detail = null;
      $course_is_required = Course::where('course_status',1)->get();
      $category = Category::all();
      $teacher = User::where('user_type',3)->get();
      $pre_post_test = null;
      $question = null;

      $lesson = Lesson::select('lesson.lesson_id','lesson.lesson_name','lesson.lesson_vdo_url','lesson.document_file','lesson.lesson_content','lesson.lesson_status','lesson.created_at as date_create','lesson.updated_at as date_update')->join('course', 'course.course_id', '=', 'lesson.course_id')->paginate(10);

      $gradebook = GradeBook::select('user_course.user_course_id','user.first_name','user_course.start_date','user_course.finish_date','lesson.user_course_status','lesson.total_score')->join('orders', 'orders.order_id', '=', 'user_course.order_id')->join('user', 'user.user_id', '=', 'orders.user_id')->paginate(10);

      $data = ['page' => 'Main','detail' => $detail,'course_is_required' => $course_is_required,'category' => $category,'teacher' => $teacher,'pre_post_test' => $pre_post_test,'question' => $question,'lesson' => $lesson,'gradebook' => $gradebook,'type' => 'form','action' => 'Create','id' => null];
      }
      else if($page=='category'){
      $detail = null;
      $data = ['page' => 'Category','detail' => $detail,'type' => 'form','action' => 'Create','id' => null];
      }

      return view('page.admin.course',['data' => $data]);

    }


    public function form_edit ($page,$id,Request $request) {

      if($page=='course'){

      if($request->search=='true'){

      $query = Lesson::query();

      if($request->date_start!=null){
      $date_start = date("Y-m-d",strtotime($request->date_start));
      $lesson = $query->where(DB::raw("(DATE_FORMAT(lesson.created_at,'%Y-%m-%d'))"), ">=", $date_start);
      }

      if($request->date_end!=null){
      $date_end = date("Y-m-d",strtotime($request->date_end));
      $lesson = $query->where(DB::raw("(DATE_FORMAT(lesson.created_at,'%Y-%m-%d'))"), "<=", $date_end);
      }

      if($request->status!=null){
      $lesson = $query->where('lesson.lesson_status',$request->status);
      }

      if($request->txt_search!=null){
      $lesson = $query->where('lesson.lesson_name', 'like', '%' .$request->txt_search. '%');
      }

      $detail = Course::select('course.course_id','course.course_image','course.course_name','course.course_cat_id','course.course_teacher_id','course.course_vdo_url','course.course_short_description','course.course_full_description','course.course_is_required','course.course_status','course.course_price','course_category.category_name','course_category.category_status','user.first_name','user.last_name','course.created_at as date_create','course.updated_at as date_update','course.course_status')->join('user', 'user.user_id', '=', 'course.course_teacher_id')->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')->where('course_category.category_status',1)->where('course.course_id',$id)->first();


      $course_is_required = Course::where('course_status',1)->get();
      $category = Category::all();
      $teacher = User::where('user_type',3)->get();

      $pre_post_test = PrePostTest::where('course_id',$id)->first();

      $choice = [];

      if(count($pre_post_test)>0){
      $question = Question::where('test_id',$pre_post_test->test_id)->get();

      if(count($question)>0){
      foreach ($question as $value) {
      $choice[] = Choice::where('question_id',$value->question_id)->get();
      }
      }

      }
      else{
      $question = null;
      $choice[] = null;
      }


      $lesson = $query->select('lesson.lesson_id','lesson.lesson_name','lesson.lesson_vdo_url','lesson.lesson_content','lesson.lesson_status','lesson.created_at as date_create','lesson.updated_at as date_update')->join('course', 'course.course_id', '=', 'lesson.course_id')->paginate(10);

      $file_lesson = [];

      foreach ($lesson as $value) {

      $file_lesson[] = $query->where('lesson_id',$value->lesson_id)->get();

      }

      $gradebook = GradeBook::select('user.first_name','user_course.start_date','user_course.finish_date','lesson.user_course_status','lesson.total_score')->join('orders', 'orders.order_id', '=', 'user_course.order_id')->join('user', 'user.user_id', '=', 'orders.user_id')->paginate(10);


      $data = ['page' => 'Main','detail' => $detail,'course_is_required' => $course_is_required,'category' => $category,'teacher' => $teacher,'pre_post_test' => $pre_post_test,'question' => $question,'choice' => $choice,'lesson' => $lesson,'file_lesson' => $file_lesson,'gradebook' => $gradebook,'type' => 'form','action' => 'Edit','id' => $id];

      }

      else{

      $detail = Course::select('course.course_id','course.course_image','course.course_name','course.course_cat_id','course.course_teacher_id','course.course_vdo_url','course.course_short_description','course.course_full_description','course.course_is_required','course.course_status','course.course_price','course_category.category_name','course_category.category_status','user.first_name','user.last_name','course.created_at as date_create','course.updated_at as date_update','course.course_status')->join('user', 'user.user_id', '=', 'course.course_teacher_id')->join('course_category', 'course_category.category_id', '=', 'course.course_cat_id')->where('course_category.category_status',1)->where('course.course_id',$id)->first();

      $course_is_required = Course::where('course_status',1)->get();
      $category = Category::all();
      $teacher = User::where('user_type',3)->get();

      $pre_post_test = PrePostTest::where('course_id',$id)->first();

      $choice = [];

      if(count($pre_post_test)>0){
      $question = Question::where('test_id',$pre_post_test->test_id)->get();

      if(count($question)>0){
      foreach ($question as $value) {
      $choice[] = Choice::where('question_id',$value->question_id)->get();
      }
      }

      }
      else{
      $question = null;
      $choice[] = null;
      }

      $lesson = Lesson::select('lesson.lesson_id','lesson.lesson_name','lesson.lesson_vdo_url','lesson.lesson_content','lesson.lesson_status','lesson.created_at as date_create','lesson.updated_at as date_update')
      ->join('course', 'course.course_id', '=', 'lesson.course_id')
      ->where('lesson.course_id',$id)
      ->paginate(10);

      $file_lesson = [];

      foreach ($lesson as $value) {

      $file_lesson[] = LessonFile::where('lesson_id',$value->lesson_id)->get();

      }

      $gradebook = GradeBook::select('user.first_name','user_course.start_date','user_course.finish_date','lesson.user_course_status','lesson.total_score')->join('orders', 'orders.order_id', '=', 'user_course.order_id')->join('user', 'user.user_id', '=', 'orders.user_id')->paginate(10);

      $data = ['page' => 'Main','detail' => $detail,'course_is_required' => $course_is_required,'category' => $category,'teacher' => $teacher,'pre_post_test' => $pre_post_test,'question' => $question,'choice' => $choice,'lesson' => $lesson,'file_lesson' => $file_lesson,'gradebook' => $gradebook,'type' => 'form','action' => 'Edit','id' => $id];

      }

      
      }

      else if($page=='category'){
      $detail = Category::where('category_id',$id)->first();
      $data = ['page' => 'Category','detail' => $detail,'type' => 'form','action' => 'Edit','id' => $id];
      }


      return view('page.admin.course',['data' => $data]);


    }


    public function action ($page,Request $request) {

    if($request->post() or $request->ajax()){

    	if($page=='Main'){

            $this->validate(request(), [
            'img' => 'mimes:jpeg,jpg,png|max:2048',
            ]);

      if($request->img==null){
      $img = $request->img_hidden;
      }
      else{
      $file_upload = ['filename' => $_FILES['img']['name'],'tmp_name' => $_FILES['img']['tmp_name'],'folder' => 'upload/member/course/images','width' => 0,'height' => 0];
      $img = $this->Upload_File($file_upload);
      }

    	if($request->type_action=='Create'){

      $result = new Course;
      $result->course_name  = $request->course_name;
      $result->course_cat_id = $request->category;
      $result->course_teacher_id = $request->teacher;
      $result->course_vdo_url = $request->video_url;
      $result->course_price = $request->price;
      $result->course_short_description = $request->short_description;
      $result->course_full_description = $request->full_description;
      $result->course_is_required = $request->course_is_required;
      $result->course_image = $img;
      $result->course_status = ($request->status==1) ? $request->status : 0;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      if($result){
      $result = ['result' => true,'message' => 'Add data complete'];
      }
      else{
      $result = ['result' => false,'message' => 'Add data not complete'];  
      }

      return response()->json($result);
      exit;

      }
      else if($request->type_action=='Edit'){

      $data = [
      'course_name' => $request->course_name,
      'course_cat_id' => $request->category,
      'course_teacher_id' => $request->teacher,
      'course_vdo_url' => $request->video_url,
      'course_price' => $request->price,
      'course_short_description' => $request->short_description,
      'course_full_description' => $request->full_description,
      'course_is_required' => $request->course_is_required,
      'course_image' => $img,
      'course_status' => ($request->status==1) ? $request->status : 0,
      'updated_at' => now(),
      ];
      $result = Course::where('course_id',$request->id)->update($data);

      if($result){
      $result = ['result' => true,'message' => 'Edit data complete'];
      }
      else{
      $result = ['result' => false,'message' => 'Edit data not complete'];  
      }

      return response()->json($result);
      exit;

      }

    	}


      else if($page=='Pretest'){

      if($request->type_action=='Create'){

      // create pre post
      $result = new PrePostTest;
      $result->pretest_header  = $request->pretest;
      $result->posttest_header = $request->posttest;
      $result->score_required = $request->score;
      $result->course_id = $request->course_id;
      $result->question_type = $request->question_type;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      $test_id = PrePostTest::orderby('test_id','desc')->first();

      // create question
      foreach ($request->question_create as $key => $value) {
      $result = new Question;
      $result->question = $value;
      $result->test_id = $test_id->test_id;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();


      $question_id[$key] = Question::orderby('question_id','desc')->first();

      // create choice in question
      foreach ($request->choices_create[$key] as $key2 => $value2) {

      foreach ($request->answers_create[$key] as $value3) {
      if($key2==$value3){
      $answers = 'true';
      }
      else{
      $answers = null;
      }
      }

      $result = new Choice;
      $result->question_id = $question_id[$key]->question_id;
      $result->choice = $value2;
      $result->answer = $answers;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();
      }

      }

      if($result){
      $result = ['result' => true,'message' => 'Add data complete'];
      }
      else{
      $result = ['result' => false,'message' => 'Add data not complete'];  
      }

      return response()->json($result);
      exit;

      }
      else if($request->type_action=='Edit'){

      $data = [
      'pretest_header' => $request->pretest,
      'posttest_header' => $request->posttest,
      'score_required' => $request->score,
      'course_id' => $request->id,
      'question_type' => $request->question_type,
      'updated_at' => now(),
      ];
      $result = PrePostTest::where('test_id',$request->test_id)->update($data);


      if($request->question_id!=null){


      foreach ($request->question_update as $key => $value) {

      $data = [
      'question' => $value,
      'updated_at' => now(),
      ];

      $result = Question::where('question_id',$request->question_id[$key])->update($data);

      foreach ($request->choices_update[$key] as $key2 => $value2) {

      foreach ($request->answers_update[$key] as $value3) {
      if($key2==$value3){
      $answers = 'true';
      }
      else{
      $answers = null;
      }
      }

      $data = [
      'choice' => $value2,
      'answer' => $answers,
      'updated_at' => now(),
      ];
      $result = Choice::where('choice_id',$request->choice_id[$key][$key2])->update($data);
      }

      }


      if(count($request->question_create)>0){

      // create question
      foreach ($request->question_create as $key => $value) {
      $result = new Question;
      $result->question = $value;
      $result->test_id = $request->test_id;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();


      $question_id[$key] = Question::orderby('question_id','desc')->first();
      
      // create choice in question
      foreach ($request->choices_create[$key] as $key2 => $value2) {

      foreach ($request->answers_create[$key] as $value3) {
      if($key2==$value3){
      $answers = 'true';
      }
      else{
      $answers = null;
      }
      }

      $result = new Choice;
      $result->question_id = $question_id[$key]->question_id;
      $result->choice = $value2;
      $result->answer = $answers;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();
      }

      }

      }
     

      }

      else{

      if($request->test_id==null){

      // create pre post
      $result = new PrePostTest;
      $result->pretest_header  = $request->pretest;
      $result->posttest_header = $request->posttest;
      $result->score_required = $request->score;
      $result->course_id = $request->id;
      $result->question_type = $request->question_type;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      $test_id = PrePostTest::orderby('test_id','desc')->first();

      $test_id = $test_id->test_id;

      }

      else{

      $test_id = $request->id;

      }


      if(count($request->question_create)>0){

      // create question
      foreach ($request->question_create as $key => $value) {
      $result = new Question;
      $result->question = $value;
      $result->test_id = $test_id;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();


      $question_id[$key] = Question::orderby('question_id','desc')->first();
      
      // create choice in question
      foreach ($request->choices_create[$key] as $key2 => $value2) {

      foreach ($request->answers_create[$key] as $value3) {
      if($key2==$value3){
      $answers = 'true';
      }
      else{
      $answers = null;
      }
      }

      $result = new Choice;
      $result->question_id = $question_id[$key]->question_id;
      $result->choice = $value2;
      $result->answer = $answers;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();
      }

      }

      }



      }


      
      if($result){
      $result = ['result' => true,'message' => 'Edit data complete'];
      }
      else{
      $result = ['result' => false,'message' => 'Edit data not complete'];  
      }

      return response()->json($result);
      exit;

      }

      }


      else if($page=='Lesson'){


      if($request->type_action=='Create'){

      $result = new Lesson;
      $result->lesson_name  = $request->lesson_name;
      $result->lesson_vdo_url = $request->vdo_url;
      $result->lesson_content = $request->detail;
      $result->lesson_status = $request->status;
      $result->course_id = $request->course_id;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();

      $path_tmp_file = 'upload/member/lesson/tmp_file/';
      $path_file = 'upload/member/lesson/file/';

      foreach ($request->input('document', []) as $file) {
      if(file_exists($path_tmp_file.$file))
      {
      $result = new LessonFile;
      $result->lesson_id  = Lesson::max('lesson_id');
      $result->lesson_file = $file;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();
      copy($path_tmp_file.$file,$path_file.$file);
      unlink($path_tmp_file.$file);
      }

      }

      if($result){
      $result = ['result' => true,'message' => 'Add data complete'];
      }
      else{
      $result = ['result' => false,'message' => 'Add data not complete'];  
      }

      return response()->json($result);
      exit;

      }
      else if($request->type_action=='Edit'){

      $data = [
      'lesson_name' => $request->lesson_name,
      'lesson_vdo_url' => $request->vdo_url,
      'lesson_content' => $request->detail,
      'lesson_status' => $request->status,
      'updated_at' => now(),
      ];
      $result = Lesson::where('lesson_id',$request->lesson_id)->update($data);

      $path_tmp_file = 'upload/member/lesson/tmp_file/';
      $path_file = 'upload/member/lesson/file/';

      foreach ($request->input('document', []) as $file) {
      if(file_exists($path_tmp_file.$file))
      {
      $result = new LessonFile;
      $result->lesson_id  = $request->lesson_id;
      $result->lesson_file = $file;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();
      copy($path_tmp_file.$file,$path_file.$file);
      unlink($path_tmp_file.$file);
      }

      }
      
      if($result){
      $result = ['result' => true,'message' => 'Edit data complete'];
      }
      else{
      $result = ['result' => false,'message' => 'Edit data not complete'];  
      }

      return response()->json($result);

      exit;

      }

      }


      else if($page=='Category'){

      if($request->type_action=='Create'){

      $result = new Category;
      $result->category_name = $request->category;
      $result->category_status = $request->status;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
      }
      else if($request->type_action=='Edit'){

      $data = [
      'category_name' => $request->category,
      'category_status' => $request->status,
      'updated_at' => now(),
      ];
      $result = Category::where('category_id',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
      }

      }


    	if($result){
    	return back()->with('success',trans('other.'.$alert_success));
    	}
    	else{
    	return back()->with('error',trans('other.'.$alert_not_success));
    	}

     }


    }


    public function upload_file_lesson (Request $request) {


    $path = 'upload/member/lesson/tmp_file';

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $file = $_FILES['file'];

    $name = uniqid() . '_' . trim($file['name'][0]);

    copy($file['tmp_name'][0],'upload/member/lesson/tmp_file/'.$name);

    return response()->json([
        'name'          => $name,
        'original_name' => $file['name'][0],
    ]);

      
    }

    public function delete_upload_file_lesson (Request $request) {

      unlink('upload/member/lesson/tmp_file/'.$request->name);

    }


    public function delete ($page,$id) {

    	if($page=='Main'){
    	$result = Course::where('course_id',$id)->delete();
      $result = Lesson::where('course_id',$id)->delete();
      $result = ReviewCourse::where('course_id',$id)->delete();
    	}
    	else if($page=='Category'){
      $result = Category::where('category_id',$id)->delete();
      }
      
      else if($page=='Lesson'){
      $result = DB::table('lesson')->where('lesson_id',$id)->delete();
      }

      else if($page=='Gradebook'){
      $result = Gradebook::where('user_course_id',$id)->delete();
      }

      else if($page=='LessonFileDelete'){
      $result = DB::table('lesson_file')->where('lesson_file',$id)->delete();
      unlink('upload/member/lesson/file/'.$request->id);
      }


    	if(isset($result)){
      return back()->with('success',trans('other.delete_success'));
      }
      else{
      return back()->with('error',trans('other.delete_not_success'));
      }

    }



}
