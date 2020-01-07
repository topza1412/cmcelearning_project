<div align="center">
<img src="{{asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb())}}">
<h2>New Payment Member - แจ้งชำระเงินค่าคอร์ส</h2>
</div>
<hr>
<h3>ท่านได้ทำการแจ้งชำระเงินกับทางเราเรียบร้อย รายละเอียดการชำระเงินมีดังนี้</h3>
<h4>
ชื่อ-นามสกุล: {{$data['input']['fullname']}}
<br>
Email: {{$data['input']['email']}}
<br>
เบอร์ติดต่อ: {{$data['input']['phone']}}
<br>
ธนาคารที่รับชำระ: {{$data['bank']}}
<br>
จำนวนเงินที่ต้องชำระ: {{$data['input']['pricing']}}
<br>
จำนวนเงินที่ชำระเข้ามา: {{$data['input']['price']}}
<br>
หลักฐานการชำระเงิน: {{$data['input']['phone']}}
<br>
วันที่ชำระเงิน: {{$data['input']['date']}}
<br>
เวลาที่ชำระเงิน: {{$data['input']['time']}}
<br>
รายละเอียดเพิ่มเติม: {{$data['input']['detail']}}
<br>
<p style="color:blue;">หมายเหตุ: กรุณารอการตรวจสอบการชำระเงินจากเจ้าหน้าที่อีกครั้ง!</p>
</h4>
<hr>
<p style="color:red;">This is an automatically generated e-mail. Please do not reply.</p>

