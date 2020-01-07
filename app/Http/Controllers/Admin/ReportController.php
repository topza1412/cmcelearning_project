<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Payment;
use App\User;
use App\Course;
use App\VisitWeb;

class ReportController extends Controller
{ 

  public function __construct()
    {
        $this->middleware('session_login_admin');
    }

    public function page($page){

      if($page=='member'){
      $data = ['page' => 'Member','type' => 'view'];
  	  }
  	  else if($page=='course'){
  	  $data = ['page' => 'Course','type' => 'view'];
  	  }
      else if($page=='payment'){
      $data = ['page' => 'Payment','type' => 'view'];
      }
      else if($page=='memberperiod'){
      $data = ['page' => 'MemberPeriod','type' => 'view'];
      }
      else if($page=='memberperiodexpire'){
      $data = ['page' => 'MemberPeriodExpire','type' => 'view'];
      }
      else if($page=='visitweb'){
      $data = ['page' => 'VisitWeb','type' => 'view'];
      }
      else if($page=='logs'){
      $data = ['page' => 'LogsSystem','type' => 'view'];
      }

      return view('page.admin.report',['data' => $data]);

    }


    public function search ($page,Request $request) {

    if($request->post()){

    	if($page=='Member'){

        $detail = User::select('user.Use_ID','user_period.Use_ID','user.Use_Fullname','user.Use_Username','user.Use_Email','user.Use_Tel','user.Use_Address','user.Use_Permission','user.created_at','user_period.Usp_DateEnd')->join('user_period', 'user_period.Use_ID', '=', 'user.Use_ID')->where(DB::raw("(DATE_FORMAT(user.created_at,'%Y-%m-%d'))"), ">=", $request->date_start)
        ->where(DB::raw("(DATE_FORMAT(user.created_at,'%Y-%m-%d'))"), "<=", $request->date_end)
        ->where('user_period.Usp_Status',0)
        ->orderby('user.Use_ID','desc')
        ->get();

    	}

      if($page=='Course'){

        $detail = Course::select('course.Cou_ID','course.Cou_Img','course.Cou_Title','category.Cat_Name','teacher.Tea_FullName','course.created_at as date_course','course.Cou_All_Lesson','course.Cou_Status')
        ->join('teacher', 'teacher.Tea_ID', '=', 'course.Tea_ID')->join('category', 'category.Cat_ID', '=', 'course.Cat_ID')
        ->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), ">=", $request->date_start)
        ->where(DB::raw("(DATE_FORMAT(course.created_at,'%Y-%m-%d'))"), "<=", $request->date_end)
        ->orderby('course.Cou_ID','desc')
        ->get();

      }

      if($page=='Payment'){

        $detail = Payment::join('user', 'user.Use_ID', '=', 'payment.Use_ID')
        ->join('bank_payment', 'bank_payment.Ban_ID', '=', 'payment.Ban_ID')
        ->where(DB::raw("(DATE_FORMAT(payment.created_at,'%Y-%m-%d'))"), ">=", $request->date_start)
        ->where(DB::raw("(DATE_FORMAT(payment.created_at,'%Y-%m-%d'))"), "<=", $request->date_end)
        ->orderby('payment.Pay_ID','desc')
        ->get();

      }

      if($page=='MemberPeriod'){

        $detail = User::select('user.Use_ID','user_period.Use_ID','user.Use_Fullname','user.Use_Username','user.Use_Email','user.Use_Tel','user_period.Usp_DateStart','user_period.Usp_DateEnd')->join('user_period', 'user_period.Use_ID', '=', 'user.Use_ID')->where(DB::raw("(DATE_FORMAT(user_period.Usp_DateStart,'%Y-%m-%d'))"), ">=", $request->date_start)
        ->where(DB::raw("(DATE_FORMAT(user_period.Usp_DateStart,'%Y-%m-%d'))"), "<=", $request->date_end)
        ->where('user_period.Usp_Status',0)
        ->orderby('user_period.Usp_ID','desc')
        ->get();

      }

      if($page=='MemberPeriodExpire'){

        $detail = User::select('user.Use_ID','user_period.Use_ID','user.Use_Fullname','user.Use_Username','user.Use_Email','user.Use_Tel','user_period.Usp_DateEnd')->join('user_period', 'user_period.Use_ID', '=', 'user.Use_ID')->where(DB::raw("(DATE_FORMAT(user_period.Usp_DateStart,'%Y-%m-%d'))"), ">=", $request->date_start)
        ->where(DB::raw("(DATE_FORMAT(user_period.Usp_DateStart,'%Y-%m-%d'))"), "<=", $request->date_end)
        ->where('user_period.Usp_Status',1)
        ->orderby('user_period.Usp_ID','desc')
        ->get();

      }

      if($page=='VisitWeb'){

        $detail = VisitWeb::where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), ">=", $request->date_start)
        ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "<=", $request->date_end)
        ->orderby('Viw_ID','desc')
        ->get();

      }

      if($page=='LogsSystem'){

        $detail = VisitWeb::where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), ">=", $request->date_start)
        ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "<=", $request->date_end)
        ->get();

      }


      $data = ['detail' => $detail,'page' => $page,'type' => 'search','date_start' => $request->date_start,'date_end' => $request->date_end];

    	return view('page.admin.report',['data' => $data]);

     }


    }


    public function export ($page,Request $request) {

    if($request->post()){


      if($result){
      return back()->with('success',trans('other.'.$alert_success));
      }
      else{
      return back()->with('error',trans('other.'.$alert_not_success));
      }

     }


    }




}
