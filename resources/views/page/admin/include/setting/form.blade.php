<div class="card-title">
<h5>{{$data['action']}}: {{$data['page']}}</h5></div>


            <div class="card-body">
                <div class="basic-elements">
                    <form action="{{url('admin/setting/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="type_action" value="{{$data['action']}}">

                    <input type="hidden" name="id" value="@if(isset($data['detail'][0][0])){{$data['detail'][0][0]}}@else{{''}}@endif">

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

                    @if($data['page']=='Language')


                    @if(isset($data['detail']['Lan_Name']))
                    <?php $name = $data['detail']['Lan_Name'];?>
                    @else
                    <?php $name = null;?>
                    @endif

                    @if(isset($data['detail']['Lan_Description']))
                    <?php $description = $data['detail']['Lan_Description'];?>
                    @else
                    <?php $description = null;?>
                    @endif


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>ตัวย่อภาษา</label>
                                    <input name="name" type="text" class="form-control" placeholder="Short Name" required value="{{$name}}">
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียด</label>
                                    <input name="description" type="text" class="form-control" placeholder="Description" required value="{{$description}}">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">บันทึก</button>
                            &nbsp;
                            <button type="submit" class="btn btn-danger btn-flat m-b-30 m-t-30">ล้างข้อมูล</button>

                        </div>
                        @endif



                        @if($data['page']=='Slider')

                        @if(isset($data['detail']['Sli_Name']))
                        <?php $name = $data['detail']['Sli_Name'];?>
                        @else
                        <?php $name = null;?>
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>ชื่อรูป</label>
                                    <input name="name" type="text" class="form-control" placeholder="Name Slider" required value="{{$name}}">
                                </div>
                                <div class="form-group">
                                    <label>รูปสไลด์</label>
                                    @if(isset($data['detail']['Sli_Img']))
                                    <br>
                                    <input type="hidden" name="slide_img_hidden" value="{{$data['detail']['Sli_Img']}}">
                                    <img src="{{asset('upload/member/slide/'.$data['detail']['Sli_Img'])}}" width="200">
                                    @endif
                                    <input name="slide_img" type="file" class="form-control" placeholder="Image Slide">
                                    <p class="small text-danger">*ขนาดรูปภาพ 1920x600 Size ไม่เกิน 2 mb. || รองรับเฉพาะไฟล์ jpeg,jpg,png</p>
                                </div>
                                @if($data['action']=='แก้ไขข้อมูล')
                                <div class="form-group">
                                    <label>สถานะ</label>
                                    <br>
                                    <input name="status" type="radio" required @if($data['detail']['Sli_Status']==0){{'checked'}}@endif value="0"> Active
                                    <input name="status" type="radio" required @if($data['detail']['Sli_Status']==1){{'checked'}}@endif value="1"> In-Active
                                </div>
                                @endif

                            </div>

                            <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">บันทึก</button>
                            &nbsp;
                            <button type="reset" class="btn btn-danger btn-flat m-b-30 m-t-30">ล้างข้อมูล</button>

                        </div>
                        @endif


                        @if($data['page']=='Institution')

                        @if(isset($data['detail']['Inj_Name']))
                        <?php $name = $data['detail']['Inj_Name'];?>
                        @else
                        <?php $name = null;?>
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>ชื่อรูป</label>
                                    <input name="name" type="text" class="form-control" placeholder="Name Image" required value="{{$name}}">
                                </div>
                                <div class="form-group">
                                    <label>รูป Logo</label>
                                    @if(isset($data['detail']['Inj_Img']))
                                    <br>
                                    <input type="hidden" name="institution_img_hidden" value="{{$data['detail']['Inj_Img']}}">
                                    <img src="{{asset('upload/member/institution/images/cover/'.$data['detail']['Inj_Img'])}}" width="200">
                                    @endif
                                    <input name="institution_img" type="file" class="form-control" placeholder="Image Logo">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">บันทึก</button>
                            &nbsp;
                            <button type="reset" class="btn btn-danger btn-flat m-b-30 m-t-30">ล้างข้อมูล</button>

                        </div>
                        @endif


                    </form>

 

                </div>
            </div>