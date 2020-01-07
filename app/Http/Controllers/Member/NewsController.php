<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\SendMail;
use App\News;

class NewsController extends Controller
{
    public function index() {

      if(isset($_GET['search'])){
      if($_GET['search']==1){
      $detail = News::where('news_status',1)->orderby('updated_at','desc')->paginate(16);
      }
      else if($_GET['search']==2){
      $detail = News::where('news_status',1)->orderby('news_title','asc')->paginate(16);
      }
      }
      else{
      $detail = News::where('news_status',1)->orderby('updated_at','desc')->paginate(16);     
      }

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'News',
            'News',
            'News',
            'News',
            url('news'));

      $data = array('detail' => $detail,'seo' => $seo);

      return view('page.member.news',['data' => $data]);
    }


    public function view_news($id,$title) {

      $detail['main'] = News::where('news_id',$id)->first();

      if(count($detail)>0){
        $this->AddViewNews($id);
      }

      $detail['last'] = News::where('news_id', '!=' , $id)->orderby('news_id','desc')->limit(8)->get();

        //seo
        $seo = $this->Seo(
        asset('upload/member/news/images/'.$detail['main']->news_image),
        $detail['main']->news_title,
        $detail['main']->news_title,
        $detail['main']->news_title,
        $detail['main']->news_title,
        url('news/detail/'.$detail['main']->news_id.'/'.$detail['main']->news_title)
        );

      $data = array('detail' => $detail,'seo' => $seo);

      return view('page.member.view_news',['data' => $data]);
        
    }


    public function AddViewNews($id){

     $result = News::find($id);
     $result->news_view = ($result->news_view)+1;
     $result->save();

    }

}
