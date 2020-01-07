<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\SendMail;
use App\Contact;

class ContactController extends Controller
{
    public function index() {

      $detail = Contact::first();

      if(count($detail)>0){
      $meta_title = $detail->meta_title;
      $meta_description = $detail->meta_description;
      $meta_keyword = $detail->meta_keyword;
      }
      else{
      $meta_title = 'Contact Us';
      $meta_description = 'Contact Us';
      $meta_keyword = 'Contact Us';
      }

        //seo
        $seo = $this->Seo(asset('upload/admin/logo_web/images/'.$this->LogoWeb()),
            $meta_title,
            $meta_description,
            $meta_keyword,
            $meta_keyword,
            url('about'));

      $data = array('detail' => $detail,'seo' => $seo);

      return view('page.member.contact',['data' => $data]);
    }

    public function send_mail(Request $request){

       $data = array(
            'email_from' => $request->email,
            'subject' => 'New Contacts - ข้อมูลการติดต่อใหม่'.' ('.$this->SettingWeb()->title_web.')',
            'page' => 'page.member.mail.contact',
            'input'      =>  $request->all(),
        );

        Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));

       if (Mail::failures()) {
           return back()->with('error','ไม่สามารถส่งข้อมูลการติดต่อได้!');
         }else{
           return back()->with('success','ส่งข้อมูลการติดต่อเรียบร้อย!');
         }


    }


    public function subscribe(Request $request){

       $data = array(
            'email_from' => $request->email,
            'subject' => 'New Subscribe - ข้อมูลการติดตามข่าวสารใหม่!'.' ('.$this->SettingWeb()->title_web.')',
            'page' => 'page.member.mail.subscribe',
            'input'      =>  $request->all(),
        );

        Mail::to($this->SettingWeb()->email_web)->send(new SendMail($data));

       if (Mail::failures()) {
           return back()->with('error','Subscribe error!');
         }else{
           return back()->with('success','Subscribe success!');
         }


    }

}
