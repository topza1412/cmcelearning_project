<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\SendMail;
use App\Product;

class ProductController extends Controller
{
    public function index() {

      $detail = Product::orderby('updated_at','desc')
      ->where('product_status',1)
      ->get();

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            'All Product',
            'All Product',
            'All Product',
            'All Product',
            url('about'));

      $data = array('detail' => $detail,'seo' => $seo);

      return view('page.member.product',['data' => $data]);
    }


  public function view_product($id,$title) {

      $detail['main'] = Product::where('product_id',$id)->first();

      if(count($detail)>0){
        $this->AddViewProduct($id);
      }

      $detail['last'] = Product::where('product_id', '!=' , $id)->orderby('product_id','desc')->limit(8)->get();

        //seo
        $seo = $this->Seo(
        asset('upload/member/product/images/'.$detail['main']->product_image),
        $detail['main']->product_name,
        $detail['main']->product_name,
        $detail['main']->product_name,
        $detail['main']->product_name,
        url('product/detail/'.$detail['main']->product_id.'/'.$detail['main']->product_name)
        );

      $data = array('detail' => $detail,'seo' => $seo);

      return view('page.member.view_product',['data' => $data]);
        
    }


    public function AddViewProduct($id){

     $result = Product::find($id);
     $result->product_view = ($result->product_view)+1;
     $result->save();

    }

}
