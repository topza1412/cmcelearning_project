<div align="center">
<img src="{{asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb())}}">
<h2>New Contacts - ข้อมูลการติดต่อใหม่</h2>
</div>
<hr>
<h3>รายละเอียด:</h3>
<h4>
ชื่อ-นามสกุล: {{$data['input']['fullname']}}
<br>
Email: {{$data['input']['email']}}
<br>
หัวข้อ: {{$data['input']['subject']}}
<br>
รายละเอียด: {{$data['input']['detail']}}
</h4>
<hr>
<p style="color:red;">This is an automatically generated e-mail. Please do not reply.</p>

