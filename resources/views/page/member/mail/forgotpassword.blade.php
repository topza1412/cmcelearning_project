<div align="center">
<img src="{{asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb())}}">
<h2>Forgot Password - แจ้งลืมรหัสผ่าน</h2>
</div>
<hr>
<h4>เรียนคุณ {{$data['input']['username']}}</h4>
<h4>ท่านได้ทำการร้องขอรหัสผ่านใหม่เข้ามา กรุณาทำการคลิกที่ Link ด้านล่าง เพื่อทำการเปลี่ยนรหัสผ่านใหม่ของท่าน</h4>
<h4><a href="{{$data['forgotpassword_link']}}">{{$data['forgotpassword_link']}}</a></h4>
<hr>
<p style="color:red;">This is an automatically generated e-mail. Please do not reply.</p>

