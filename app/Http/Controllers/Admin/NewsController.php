<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('session_login_admin');
    }

    
    public function page($page){

      $detail = News::orderby('news_id','desc')->paginate(10);
      $data = ['page' => 'Main','detail' => $detail,'type' => 'view'];

      
      return view('page.admin.news',['data' => $data]);

    }

    public function search($page,Request $request){

      if($request->post()){

      $query = News::query();

      if($request->date_start!=null){
      $date_start = date("Y-m-d",strtotime($request->date_start));
      $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), ">=", $date_start);
      }

      if($request->date_end!=null){
      $date_end = date("Y-m-d",strtotime($request->date_end));
      $detail = $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "<=", $date_end);
      }

      if($request->status!=null){
      $detail = $query->where('news_status',$request->status);
      }

      if($request->txt_search!=null){
      $detail = $query->where('news_title', 'like', '%' .$request->txt_search. '%');
      }

      $detail = $query->orderby('news_id','desc')->paginate(10);

      $data = ['page' => 'Main','detail' => $detail,'type' => 'view'];

      return view('page.admin.news',['data' => $data]);

      }

    }


    public function form_add ($page) {

      $detail = null;
      $data = ['page' => 'Main','detail' => $detail,'type' => 'form','action' => 'Create'];


      return view('page.admin.news',['data' => $data]);

    }


    public function form_edit ($page,$id) {

      $detail = News::where('news_id',$id)->first();
      $data = ['page' => 'Main','detail' => $detail,'type' => 'form','action' => 'Edit','id' => $id];
      

      return view('page.admin.news',['data' => $data]);


    }


    public function action ($page,Request $request) {


    if($request->post()){

            $this->validate(request(), [
            'img' => 'mimes:jpeg,jpg,png|max:2048',
            ]);

    	if($request->type_action=='Create'){

      if($request->img==null){
      $img = $request->img_hidden;
      }
      else{
      $file_upload = ['filename' => $_FILES['img']['name'],'tmp_name' => $_FILES['img']['tmp_name'],'folder' => 'upload/member/news/images','width' => 0,'height' => 0];
      $img = $this->Upload_File($file_upload);
      }

      $result = new News;
      $result->news_title = $request->title;
      $result->news_short_content = $request->short_content;
      $result->news_full_content = $request->full_content;
      $result->news_page_title = $request->page_title;
      $result->news_description = $request->description;
      $result->news_keyword = $request->keyword;
      $result->news_image = $img;
      $result->news_status =$request->status;
      $result->created_at = now();
      $result->updated_at = now();
      $result->save();
      $alert_success = 'add_success';
      $alert_not_success = 'add_not_success';
      }
      else if($request->type_action=='Edit'){

      if($request->img==null){
      $img = $request->img_hidden;
      }
      else{
      $file_upload = ['filename' => $_FILES['img']['name'],'tmp_name' => $_FILES['img']['tmp_name'],'folder' => 'upload/member/news/images','width' => 0,'height' => 0];
      $img = $this->Upload_File($file_upload);
      }

      $data = [
      'news_title' => $request->title,
      'news_short_content' => $request->short_content,
      'news_full_content' => $request->full_content,
      'news_page_title' => $request->page_title,
      'news_description' => $request->description,
      'news_keyword' => $request->keyword,
      'news_image' => $img,
      'news_status' => $request->status,
      'updated_at' => now(),
      ];
      $result = News::where('news_id',$request->id)->update($data);
      $alert_success = 'edit_success';
      $alert_not_success = 'edit_not_success';
      }


    	if($result){
    	return back()->with('success',trans('other.'.$alert_success));
    	}
    	else{
    	return back()->with('error',trans('other.'.$alert_not_success));
    	}

     }


    }


    public function delete ($page,$id) {

    	$result = News::where('news_id',$id)->delete();

    	if($result){
    	return back()->with('success',trans('other.delete_success'));
    	}
    	else{
    	return back()->with('error',trans('other.delete_not_success'));
    	}

    }



}
