<div class="row">
<div class="col-sm-12">

  <form class="form-horizontal" action="{{url('admin/news/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data">
   @csrf

   <input type="hidden" name="type_action" value="{{$data['action']}}">

   <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

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



   @if($data['page']=='Main')

   @if(isset($data['detail']['news_title']))
    <?php $title = $data['detail']['news_title'];?>
    @else
    <?php $title = null;?>
    @endif

    @if(file_exists(public_path().'/upload/member/news/images/'.$data['detail']['news_image']) && $data['detail']['news_image'] != null)
    <input type="hidden" name="img_hidden" value="{{$data['detail']['news_image']}}">
    <?php $img = asset('upload/member/news/images/'.$data['detail']['news_image']);?>
    @else
    <?php $img = asset('assets/member/images/no-image.png');?>
    @endif

    @if(isset($data['detail']['news_short_content']))
    <?php $short_content = $data['detail']['news_short_content'];?>
    @else
    <?php $short_content = null;?>
    @endif

    @if(isset($data['detail']['news_full_content']))
    <?php $full_content = $data['detail']['news_full_content'];?>
    @else
    <?php $full_content = null;?>
    @endif

    @if(isset($data['detail']['news_page_title']))
    <?php $page_title = $data['detail']['news_page_title'];?>
    @else
    <?php $page_title = null;?>
    @endif

    @if(isset($data['detail']['news_description']))
    <?php $description = $data['detail']['news_description'];?>
    @else
    <?php $description = null;?>
    @endif

    @if(isset($data['detail']['news_keyword']))
    <?php $keyword = $data['detail']['news_keyword'];?>
    @else
    <?php $keyword = null;?>
    @endif

    @if(isset($data['detail']['news_status']))
    <?php $status = $data['detail']['news_status'];?>
    @else
    <?php $status = null;?>
    @endif

    <section class="panel panel-default">
      <header class="panel-heading">
        <span class="h4">{{$data['action']}} News</span>
      </header>
      <div class="panel-body">                     
       <div class="form-group pull-in clearfix">
        <div class="col-sm-5">
            <div align="center">
              <a href="{{$img}}" target="_blank">
              <img src="{{$img}}" width="300">
              </a>
            </div>
                <br>
              <label>Image cover</label>
              <input type="file" name="img" class="form-control" id="img">
              <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-7">
              <label>Title</label>
              <input name="title" type="text" class="form-control" placeholder="Title News" value="{{$title}}" required>
            </div>
             <div class="col-sm-8">
                <br>
              <label>Short Content</label>
              <textarea name="short_content" class="form-control" placeholder="Short Content">{{$short_content}}</textarea>
            </div>
            <div class="col-sm-12">
                <br>
              <label>Full Content</label>
              <textarea name="full_content" class="form-control ckeditor" placeholder="Full Content">{{$full_content}}</textarea>
            </div>
            <div class="col-sm-7">
               <br>
              <label>Meta page title</label>
              <input name="page_title" type="text" class="form-control" placeholder="Meta page title" value="{{$page_title}}" required>
            </div>
             <div class="col-sm-7">
               <br>
              <label>Meta description</label>
              <input name="description" type="text" class="form-control" placeholder="Meta description" value="{{$description}}" required>
            </div>
             <div class="col-sm-7">
               <br>
              <label>Meta keyword</label>
              <input name="keyword" type="text" class="form-control" placeholder="Meta keyword" value="{{$keyword}}" required>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-5">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <label class="switch">
                  <input name="status" type="checkbox" @if($status==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>
      </div>
      <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>
    </section>
    @endif

  </form>

</div>
</div>


