<div class="card-title">
<h5>รายละเอียด: {{$data['page']}}</h5></div>


            <div class="card-body">
                <div class="basic-elements">
                    <form action="{{url('admin/setting/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('layouts.admin.flash-message')

                                  @if(count($errors))
                                      <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <div style="padding: 10px;">
                                          <ul>
                                              @foreach($errors->all() as $error)
                                                  <li>{{$error}}</li>
                                              @endforeach
                                          </ul>
                                        </div>
                                      </div>
                                 @endif

                    @if($data['page']=='Website')
                    @foreach($data['setting'] as $value)
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ชื่อเว็บไซต์</label>
                                    <input name="title_web" type="text" class="form-control" placeholder="Title Web" required value="{{$value->Set_Title}}">
                                </div>
                                <div class="form-group">
                                    <label>ชื่อส่วนท้ายของเว็บ</label>
                                    <input name="footer_web" type="text" class="form-control" placeholder="Footer Web" required value="{{$value->Set_Footer}}">
                                </div>
                                <div class="form-group">
                                    <label>โลโก้เว็บไซต์</label>
                                    @if($value->Set_Title!=null)
                                    <br>
                                    <input type="hidden" name="logo_web_hidden" value="{{$value->Set_Logo}}">
                                    <img src="{{asset('upload/admin/logo_web/'.$value->Set_Logo)}}" width="180">
                                    @endif
                                    <input name="logo_web" type="file" class="form-control" placeholder="Logo Web">
                                    <p class="small text-danger">*ขนาดรูปภาพไม่เกิน 2 mb. || รองรับเฉพาะไฟล์ jpeg,jpg,png</p>
                                </div>
                                <div class="form-group">
                                    <label>Email เจ้าของเว็บไซต์</label>
                                    <input name="email_admin" type="email" class="form-control" placeholder="Email Web Site" value="{{$value->Set_EmailAdmin}}">
                                </div>

                                <div class="form-group alert alert-info">
                                    <label>สถานะเว็บไซต์</label>
                                    <br>
                                    <input name="status_web" type="radio" required @if($value->Set_StatusWeb==1){{'checked'}}@endif value="1"> <span style="color:green;"><b>Online</b></span>
                                    <input name="status_web" type="radio" required @if($value->Set_StatusWeb==0){{'checked'}}@endif value="0"> <span style="color:red;"><b>Offline</b></span>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Url เว็บไซต์</label>
                                    <input name="url_web" type="url" class="form-control" placeholder="Url Web" value="{{$value->Set_Url}}">
                                </div>

                                <div class="form-group">
                                    <label>ที่อยู่/ติดต่อเรา</label>
                                    <textarea name="address_web" class="form-control" rows="4" placeholder="Address">{{$value->Set_Address}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>ชื่อ Token ใช้สำหรับสร้างรหัสผ่าน <span class="text-danger">(กำหนดได้แค่ครั้งเดียวเท่านั้น!)</span></label>
                                    <input name="token_password" type="text" class="form-control" @if($value->Set_TokenPasswordWeb!=null){{'readonly'}}@endif placeholder="Token Password" required value="{{$value->Set_TokenPasswordWeb}}">
                                </div>

                                <div class="form-group">
                                    <label>ค่าบริการของสมาชิกต่อเดือน</label>
                                    <input name="price_member" type="number" class="form-control" placeholder="Price Member Period" required value="{{$value->Set_PriceMember}}">
                                </div>


                            </div>

                            <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">บันทึก</button>
                            &nbsp;
                            <button type="reset" class="btn btn-danger btn-flat m-b-30 m-t-30">ล้างข้อมูล</button>

                        </div>
                        @endforeach
                        @endif

                        @if($data['page']=='SEO')
                        @foreach($data['setting'] as $value)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>รายละเอียดเกี่ยวกับเว็บไซต์ <span class="text-danger">(ตัวอย่าง คอร์สเรียน สอนออนไลน์ เรียนออนไลน์)</span></label>
                                    <textarea name="description_seo" class="form-control" placeholder="Description">{{$value->Set_Description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>คำที่ต้องการให้ Google หาเจอ</label>
                                    <textarea name="keyword_seo" class="form-control" placeholder="Keywords">{{$value->Set_Keywords}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>คำที่ต้องการให้ bot มาเก็บข้อมูล</label>
                                    <textarea name="robot_seo" class="form-control" placeholder="Bots">{{$value->Set_Robots}}</textarea>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">บันทึก</button>
                            &nbsp;
                            <button type="reset" class="btn btn-danger btn-flat m-b-30 m-t-30">ล้างข้อมูล</button>

                        </div>
                        @endforeach
                        @endif


                    </form>

                    @if($data['page']=='Language')
                        <div class="row">
                            <div class="col-lg-12">  
                            <div class="table-responsive m-t-40">
                            <a href="{{url('admin/setting/language/add')}}" class="btn btn-warning"><i class="fa fa-edit f-s-15"></i> เพิ่มข้อมูล</a>
                            <br><br>
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ตัวย่อภาษา</th>
                                        <th>รายละเอียด</th>
                                        <th>วันที่สร้าง</th>
                                        <th>วันที่อัพเดท</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['language'])>0)
                                <?php $i = 1;?>
                                @foreach($data['language'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$value->Lan_Name}}</td>
                                    <td>{{$value->Lan_Description}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->updated_at}}</td>
                                    <td>
                                    <a href="{{url('admin/setting/language/edit/'.$value->Lan_ID)}}" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/setting/delete/Language/')}}','{{$value->Lan_ID}}');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                <td colspan="6" class="text-danger"><div align="center">ไม่พบข้อมูล!</div></td>    
                                </tr>
                                @endif
                            </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        @endif


                        @if($data['page']=='Slider')
                        <div class="row">
                            <div class="col-lg-12">  
                            <div class="table-responsive m-t-40">
                            <a href="{{url('admin/setting/slider/add')}}" class="btn btn-warning"><i class="fa fa-edit f-s-15"></i> เพิ่มข้อมูล</a>
                            <br><br>
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>รูป</th>
                                        <th>ชื่อรูป</th>
                                        <th>วันที่สร้าง</th>
                                        <th>วันที่อัพเดท</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['slider'])>0)
                                <?php $i = 1;?>
                                @foreach($data['slider'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{asset('upload/member/slide/'.$value->Sli_Img)}}" target="_blank"><img src="{{asset('upload/member/slide/'.$value->Sli_Img)}}" width="160px"></a></td>
                                    <td>{{$value->Sli_Name}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->updated_at}}</td>
                                    <td>
                                    <a href="{{url('admin/setting/slider/edit/'.$value->Sli_ID)}}" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/setting/delete/Slider/')}}','{{$value->Sli_ID}}');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                <td colspan="6" class="text-danger"><div align="center">ไม่พบข้อมูล!</div></td>    
                                </tr>
                                @endif
                            </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        @endif


                        @if($data['page']=='Institution')
                        <div class="row">
                            <div class="col-lg-12">  
                            <div class="table-responsive m-t-40">
                            <a href="{{url('admin/setting/institution/add')}}" class="btn btn-warning"><i class="fa fa-edit f-s-15"></i> เพิ่มข้อมูล</a>
                            <br><br>
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="10%">รูป</th>
                                        <th>ชื่อรูป</th>
                                        <th>วันที่สร้าง</th>
                                        <th>วันที่อัพเดท</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['institution'])>0)
                                <?php $i = 1;?>
                                @foreach($data['institution'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{asset('upload/member/Institution/images/cover/'.$value->Inj_Img)}}" target="_blank"><img src="{{asset('upload/member/Institution/images/cover/'.$value->Inj_Img)}}" width="110px"></a></td>
                                    <td>{{$value->Inj_Name}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->updated_at}}</td>
                                    <td>
                                    <a href="{{url('admin/setting/institution/edit/'.$value->Inj_ID)}}" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/setting/delete/Institution/')}}','{{$value->Inj_ID}}');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                <td colspan="6" class="text-danger"><div align="center">ไม่พบข้อมูล!</div></td>    
                                </tr>
                                @endif
                            </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                        @endif

                </div>
            </div>