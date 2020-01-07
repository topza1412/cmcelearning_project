<div align="center">
<img src="{{asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb())}}">
<h2>New Register - ยินดีต้อนรับสมาชิกใหม่</h2>
</div>
<hr>
<h3>ท่านได้ทำการสมัครสมาชิกกับทางเราเรียบร้อย รายละเอียดการสมัครสมาชิกของท่านสามารถดูได้ที่ข้อมูลด้านล่างนี้</h3>
<h4>
ชื่อ-นามสกุล: {{$data['input']['first_name'].' '.$data['input']['last_name']}}
<br>
Email: {{$data['input']['email']}}
<br>
Password: {{$data['input']['password']}}
<br>
เข้าสู่เว็บไซต์: <a href="{{url('login')}}">คลิกที่นี้</a>
<br>
<p style="color:green;">*โปรดเก็บรักษาข้อมูลของท่านไว้ให้ดี เพื่อใช้ในการเข้าสู่ระบบ!</p>
</h4>
<hr>
<p style="color:red;">This is an automatically generated e-mail. Please do not reply.</p>

