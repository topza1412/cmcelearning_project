<div class="row">
<div class="col-sm-12">

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



   @if($data['page']=='Home')

   @if($data['logo_web']!=null)

   @if(file_exists(public_path().'/upload/admin/logo_web/images/'.$data['logo_web']->logo_image) && $data['logo_web']->logo_image!=null)
    <input type="hidden" name="img_hidden" value="{{$data['logo_web']->logo_image}}">
    <?php $img = asset('upload/admin/logo_web/images/'.$data['logo_web']->logo_image);?>
    @else
    <?php $img = asset('assets/member/images/no-image.png');?>
    @endif

    @else
    <?php $img = asset('assets/member/images/no-image.png');?>
    @endif

    <section class="panel panel-default">

      <form class="form-horizontal" action="{{url('admin/content/home/action')}}" method="post" enctype="multipart/form-data">
   @csrf


      <header class="panel-heading">
        <span class="h4">Logo Home Page</span>
      </header>
      
      <div class="col-lg-12">

        <br>

        <div class="form-group col-sm-12">
          <div align="center">
            <a href="{{$img}}" target="_blank">
              <img src="{{$img}}" width="160" height="40" class="img-thumbnail">
              </a>
          </div>
          <br>
          <input type="file" name="img" class="form-control" id="img">
          <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb & size 200*40.</p>
        </div>
         
        </div>

      <div class="col-lg-12">
       <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>
    </div>


  </form>


      <div class="panel-body">   

      <span class="h4"><b>Banner Slide</b></span>

      <br><br>

        <div class="text-left"> 
        <button type="button" id="btn_banner_slide" onclick="btn_banner_slide('Create','','','');" class="btn btn-info"><i class="fa fa-arrows"></i> Add</button>
        </div>

       <div class="form-group pull-in clearfix">

        <br>

        @foreach($data['banner'] as $value)

        @if(file_exists(public_path().'/upload/admin/banner/images/'.$value->banner_image) && $value->banner_image !=null)
        <?Php $img = asset('upload/admin/banner/images/'.$value->banner_image);?>
        @else
        <?Php $img = asset('assets/member/images/no-image.png');?>
        @endif

            <div class="col-sm-4">
            
            <section class="panel panel-default">
            <header class="panel-heading bg-default lt no-border">
              <div class="clearfix">
                <a href="{{$img}}" class="pull-left" target="_blank">
                  <img src="{{$img}}" class="img-responsive">
                </a>
            </header>
            <div class="list-group no-radius alt">
              <a class="list-group-item" href="{{$value->banner_url}}" target="_blank">
               {{$value->banner_url}} 
              </a>
              <button type="button" id="btn_add_img" class="btn btn-primary" onclick="btn_banner_slide('Edit','{{$value->banner_id}}','{{$value->banner_image}}','{{$value->banner_title}}','{{$value->banner_url}}');">Edit</button>
              <button type="button" id="btn_delete_img" class="btn btn-danger" onclick="confirm_delete('{{url('admin/content/delete/Banner/')}}','{{$value->banner_id}}');">Delete</button>
            </div>
          </section>

            </div>

        @endforeach

            {{$data['banner']->links()}}

      </div>

    </section>

    @endif


  @if($data['page']=='Content')

    <section class="panel panel-default">
      <div class="panel-body">   

      <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item active">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#about" role="tab" aria-controls="home" aria-selected="true">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#terms" role="tab" aria-controls="profile" aria-selected="false">Terms & Condition</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#policy" role="tab" aria-controls="contact" aria-selected="false">Pravacy Policy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Us</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">



    <div class="tab-pane fade active in" id="about" role="tabpanel" aria-labelledby="home-tab">

    <form class="form-horizontal" action="{{url('admin/content/about/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="id" value="@if(isset($data['id']['about_id'])){{$data['id']['about_id']}}@else{{''}}@endif">

    @if(isset($data['about_us']->name_page))
    <?php $name_page = $data['about_us']->name_page;?>
    @else
    <?php $name_page = null;?>
    @endif

    @if(isset($data['about_us']->content))
    <?php $content_page = $data['about_us']->content;?>
    @else
    <?php $content_page = null;?>
    @endif

    @if(isset($data['about_us']->meta_page_title))
    <?php $meta_page_title = $data['about_us']->meta_page_title;?>
    @else
    <?php $meta_page_title = null;?>
    @endif

    @if(isset($data['about_us']->meta_description))
    <?php $meta_description = $data['about_us']->meta_description;?>
    @else
    <?php $meta_description = null;?>
    @endif

    @if(isset($data['about_us']->meta_keyword))
    <?php $meta_keyword = $data['about_us']->meta_keyword;?>
    @else
    <?php $meta_keyword = null;?>
    @endif
        
      <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Name Page</label>
          <input name="name_page" type="text" class="form-control" placeholder="Name Page" value="{{$name_page}}" required>
        </div>
        </div>

        <div class="col-lg-12">

        <div class="form-group col-sm-12">
          <label>Content Page</label>
          <textarea name="detail" class="form-control ckeditor" placeholder="Content Page" required>{{$content_page}}</textarea>
        </div>

        </div>

        <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Meta Page Title</label>
          <input name="meta_page_title" type="text" class="form-control" placeholder="Meta Page Title" value="{{$meta_page_title}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Description</label>
          <input name="meta_description" type="text" class="form-control" placeholder="Meta Description" value="{{$meta_description}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Keyword</label>
          <input name="meta_keyword" type="text" class="form-control" placeholder="Meta Keyword" value="{{$meta_keyword}}">
        </div>

        </div>

        <div class="col-lg-12">

        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>

    </div>

      </form>

      </div>




    <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="profile-tab">

      <form class="form-horizontal" action="{{url('admin/content/terms/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="id" value="@if(isset($data['id']['terms_id'])){{$data['id']['terms_id']}}@else{{''}}@endif">

    @if(isset($data['terms']->name_page))
    <?php $name_page = $data['terms']->name_page;?>
    @else
    <?php $name_page = null;?>
    @endif

    @if(isset($data['terms']->content))
    <?php $content_page = $data['terms']->content;?>
    @else
    <?php $content_page = null;?>
    @endif

    @if(isset($data['terms']->meta_page_title))
    <?php $meta_page_title = $data['terms']->meta_page_title;?>
    @else
    <?php $meta_page_title = null;?>
    @endif

    @if(isset($data['terms']->meta_description))
    <?php $meta_description = $data['terms']->meta_description;?>
    @else
    <?php $meta_description = null;?>
    @endif

    @if(isset($data['terms']->meta_keyword))
    <?php $meta_keyword = $data['terms']->meta_keyword;?>
    @else
    <?php $meta_keyword = null;?>
    @endif

      <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Name Page</label>
          <input name="name_page" type="text" class="form-control" placeholder="Name Page" value="{{$name_page}}" required>
        </div>
        </div>

        <div class="col-lg-12">

        <div class="form-group col-sm-12">
          <label>Content Page</label>
          <textarea name="detail" class="form-control ckeditor" placeholder="Content Page" required>{{$content_page}}</textarea>
        </div>

        </div>

        <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Meta Page Title</label>
          <input name="meta_page_title" type="text" class="form-control" placeholder="Meta Page Title" value="{{$meta_page_title}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Description</label>
          <input name="meta_description" type="text" class="form-control" placeholder="Meta Description" value="{{$meta_description}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Keyword</label>
          <input name="meta_keyword" type="text" class="form-control" placeholder="Meta Keyword" value="{{$meta_keyword}}">
        </div>

        </div>

        <div class="col-lg-12">
        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>
      </div>

      </form>

      </div>



    <div class="tab-pane fade" id="policy" role="tabpanel" aria-labelledby="contact-tab">

      <form class="form-horizontal" action="{{url('admin/content/pravacy_policy/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="id" value="@if(isset($data['id']['pravacy_policy_id'])){{$data['id']['pravacy_policy_id']}}@else{{''}}@endif">
        
    @if(isset($data['pravacy_policy']->name_page))
    <?php $name_page = $data['pravacy_policy']->name_page;?>
    @else
    <?php $name_page = null;?>
    @endif

    @if(isset($data['pravacy_policy']->content))
    <?php $content_page = $data['pravacy_policy']->content;?>
    @else
    <?php $content_page = null;?>
    @endif

    @if(isset($data['pravacy_policy']->meta_page_title))
    <?php $meta_page_title = $data['pravacy_policy']->meta_page_title;?>
    @else
    <?php $meta_page_title = null;?>
    @endif

    @if(isset($data['pravacy_policy']->meta_description))
    <?php $meta_description = $data['pravacy_policy']->meta_description;?>
    @else
    <?php $meta_description = null;?>
    @endif

    @if(isset($data['pravacy_policy']->meta_keyword))
    <?php $meta_keyword = $data['pravacy_policy']->meta_keyword;?>
    @else
    <?php $meta_keyword = null;?>
    @endif

      <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Name Page</label>
          <input name="name_page" type="text" class="form-control" placeholder="Name Page" value="{{$name_page}}" required>
        </div>
        </div>

        <div class="col-lg-12">

        <div class="form-group col-sm-12">
          <label>Content Page</label>
          <textarea name="detail" class="form-control ckeditor" placeholder="Content Page" required>{{$content_page}}</textarea>
        </div>

        </div>

        <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Meta Page Title</label>
          <input name="meta_page_title" type="text" class="form-control" placeholder="Meta Page Title" value="{{$meta_page_title}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Description</label>
          <input name="meta_description" type="text" class="form-control" placeholder="Meta Description" value="{{$meta_description}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Keyword</label>
          <input name="meta_keyword" type="text" class="form-control" placeholder="Meta Keyword" value="{{$meta_keyword}}">
        </div>

        </div>

        <div class="col-lg-12">
        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>
      </div>

      </form>

      </div>


    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

      <form class="form-horizontal" action="{{url('admin/content/contact/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="id" value="@if(isset($data['id']['contact_id'])){{$data['id']['contact_id']}}@else{{''}}@endif">
        
    @if(isset($data['contact_us']->name_page))
    <?php $name_page = $data['contact_us']->name_page;?>
    @else
    <?php $name_page = null;?>
    @endif

    @if(isset($data['contact_us']->address))
    <?php $address = $data['contact_us']->address;?>
    @else
    <?php $address = null;?>
    @endif

    @if(isset($data['contact_us']->map_google))
    <?php $map_google = $data['contact_us']->map_google;?>
    @else
    <?php $map_google = null;?>
    @endif

    @if(isset($data['contact_us']->meta_page_title))
    <?php $meta_page_title = $data['contact_us']->meta_page_title;?>
    @else
    <?php $meta_page_title = null;?>
    @endif

    @if(isset($data['contact_us']->meta_description))
    <?php $meta_description = $data['contact_us']->meta_description;?>
    @else
    <?php $meta_description = null;?>
    @endif

    @if(isset($data['contact_us']->meta_keyword))
    <?php $meta_keyword = $data['contact_us']->meta_keyword;?>
    @else
    <?php $meta_keyword = null;?>
    @endif

      <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Name Page</label>
          <input name="name_page" type="text" class="form-control" placeholder="Name Page" value="{{$name_page}}" required>
        </div>
        <div class="form-group col-sm-12">
          <label>Address</label>
          <textarea name="address" class="form-control">{{$address}}</textarea>
        </div>

        </div>

        <div class="col-lg-12">

        <div class="form-group col-sm-12">
          <label>Map Google</label>
          <textarea name="map_google" class="form-control ckeditor" placeholder="Content Page" required>{{$map_google}}</textarea>
        </div>

        </div>

        <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Meta Page Title</label>
          <input name="meta_page_title" type="text" class="form-control" placeholder="Meta Page Title" value="{{$meta_page_title}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Description</label>
          <input name="meta_description" type="text" class="form-control" placeholder="Meta Description" value="{{$meta_description}}">
        </div>
        <div class="form-group col-sm-12">
          <label>Meta Keyword</label>
          <input name="meta_keyword" type="text" class="form-control" placeholder="Meta Keyword" value="{{$meta_keyword}}">
        </div>

        </div>

        <div class="col-lg-12">
        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>
      </div>

      </form>

      </div>


    </div>                  
       
       </div>

    </section>
    @endif


   @if($data['page']=='Email')


    <section class="panel panel-default">
      <div class="panel-body">   

      <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item active">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#order" role="tab" aria-controls="home" aria-selected="true">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#subscription" role="tab" aria-controls="profile" aria-selected="false">Subscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#registration" role="tab" aria-controls="contact" aria-selected="false">Registration</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">



    <div class="tab-pane fade active in" id="order" role="tabpanel" aria-labelledby="home-tab">

      <form class="form-horizontal" action="{{url('admin/content/email_order/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="id" value="@if(isset($data['id']['order_id'])){{$data['id']['order_id']}}@else{{''}}@endif">

    @if(isset($data['order']->subject))
    <?php $subject = $data['order']->subject;?>
    @else
    <?php $subject = null;?>
    @endif

    @if(isset($data['order']->content))
    <?php $content = $data['order']->content;?>
    @else
    <?php $content = null;?>
    @endif

    @if(isset($data['order']->send_to_admin))
    <?php $send_to_admin = $data['order']->send_to_admin;?>
    @else
    <?php $send_to_admin = null;?>
    @endif

    @if(isset($data['order']->send_to_teacher))
    <?php $send_to_teacher = $data['order']->send_to_teacher;?>
    @else
    <?php $send_to_teacher = null;?>
    @endif

    @if(isset($data['order']->send_to_user))
    <?php $send_to_user = $data['order']->send_to_user;?>
    @else
    <?php $send_to_user = null;?>
    @endif


        
        <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to admin</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_admin" type="checkbox" @if($send_to_admin==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to teacher</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_teacher" type="checkbox" @if($send_to_teacher==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to user</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_user" type="checkbox" @if($send_to_user==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

      <div class="col-lg-8">
        <br>
        <div class="form-group col-sm-12">
          <label>Subject</label>
          <input name="subject" type="text" class="form-control" placeholder="Subject" value="{{$subject}}" required>
        </div>
        </div>

        <div class="col-lg-12">
        <div class="form-group col-sm-12">
          <label>Email content</label>
          <textarea name="content" class="form-control ckeditor" placeholder="Email content" required>{{$content}}</textarea>
        </div>

        <div class="col-lg-12">

        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>

    </div>

        </div>

      </form>

      </div>




    <div class="tab-pane fade" id="subscription" role="tabpanel" aria-labelledby="profile-tab">

        <form class="form-horizontal" action="{{url('admin/content/email_subscription/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="id" value="@if(isset($data['id']['subscription_id'])){{$data['id']['subscription_id']}}@else{{''}}@endif">

    @if(isset($data['subscription']->subject))
    <?php $subject = $data['subscription']->subject;?>
    @else
    <?php $subject = null;?>
    @endif

    @if(isset($data['subscription']->content))
    <?php $content = $data['subscription']->content;?>
    @else
    <?php $content = null;?>
    @endif

    @if(isset($data['subscription']->send_to_admin))
    <?php $send_to_admin = $data['subscription']->send_to_admin;?>
    @else
    <?php $send_to_admin = null;?>
    @endif

    @if(isset($data['subscription']->send_to_teacher))
    <?php $send_to_teacher = $data['subscription']->send_to_teacher;?>
    @else
    <?php $send_to_teacher = null;?>
    @endif

    @if(isset($data['subscription']->send_to_user))
    <?php $send_to_user = $data['subscription']->send_to_user;?>
    @else
    <?php $send_to_user = null;?>
    @endif


        
        <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to admin</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_admin" type="checkbox" @if($send_to_admin==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to teacher</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_teacher" type="checkbox" @if($send_to_teacher==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to user</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_user" type="checkbox" @if($send_to_user==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

      <div class="col-lg-8">
        <br>
        <div class="form-group col-sm-12">
          <label>Subject</label>
          <input name="subject" type="text" class="form-control" placeholder="Subject" value="{{$subject}}" required>
        </div>
        </div>

        <div class="col-lg-12">
        <div class="form-group col-sm-12">
          <label>Email content</label>
          <textarea name="content" class="form-control ckeditor" placeholder="Email content" required>{{$content}}</textarea>
        </div>

        <div class="col-lg-12">

        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>

    </div>

        </div>

      </form>

      </div>



    <div class="tab-pane fade" id="registration" role="tabpanel" aria-labelledby="contact-tab">

      <form class="form-horizontal" action="{{url('admin/content/email_registration/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="id" value="@if(isset($data['id']['registration_id'])){{$data['id']['registration_id']}}@else{{''}}@endif">
        
    @if(isset($data['registration']->subject))
    <?php $subject = $data['registration']->subject;?>
    @else
    <?php $subject = null;?>
    @endif

    @if(isset($data['registration']->content))
    <?php $content = $data['registration']->content;?>
    @else
    <?php $content = null;?>
    @endif

    @if(isset($data['registration']->send_to_admin))
    <?php $send_to_admin = $data['registration']->send_to_admin;?>
    @else
    <?php $send_to_admin = null;?>
    @endif

    @if(isset($data['registration']->send_to_teacher))
    <?php $send_to_teacher = $data['registration']->send_to_teacher;?>
    @else
    <?php $send_to_teacher = null;?>
    @endif

    @if(isset($data['registration']->send_to_user))
    <?php $send_to_user = $data['registration']->send_to_user;?>
    @else
    <?php $send_to_user = null;?>
    @endif


        
        <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to admin</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_admin" type="checkbox" @if($send_to_admin==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to teacher</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_teacher" type="checkbox" @if($send_to_teacher==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-6 control-label"><b>Send to user</b></label>
              <div class="col-sm-6">
                <label class="switch">
                  <input name="send_to_user" type="checkbox" @if($send_to_user==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>

      <div class="col-lg-8">
        <br>
        <div class="form-group col-sm-12">
          <label>Subject</label>
          <input name="subject" type="text" class="form-control" placeholder="Subject" value="{{$subject}}" required>
        </div>
        </div>

        <div class="col-lg-12">
        <div class="form-group col-sm-12">
          <label>Email content</label>
          <textarea name="content" class="form-control ckeditor" placeholder="Email content" required>{{$content}}</textarea>
        </div>
        </div>

        <div class="col-lg-12">

        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>

    </div>

      </div>

    </form>

    </div>                  
       
       </div>
      
    </section>
    @endif

</div>
</div>


