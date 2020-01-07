<div class="row">
<div class="col-sm-12">

  <form class="form-horizontal" action="{{url('admin/products/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data">
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

   @if(isset($data['detail']['product_name']))
    <?php $product_name = $data['detail']['product_name'];?>
    @else
    <?php $product_name = null;?>
    @endif

    @if(file_exists(public_path().'/upload/member/product/images/'.$data['detail']['product_image']) && $data['detail']['product_image'] != null)
    <input type="hidden" name="img_hidden" value="{{$data['detail']['product_image']}}">
    <?php $img = asset('upload/member/product/images/'.$data['detail']['product_image']);?>
    @else
    <?php $img = asset('assets/member/images/no-image.png');?>
    @endif

    @if(isset($data['detail']['product_detail']))
    <?php $detail = $data['detail']['product_detail'];?>
    @else
    <?php $detail = null;?>
    @endif

    @if(isset($data['detail']['product_status']))
    <?php $status = $data['detail']['product_status'];?>
    @else
    <?php $status = null;?>
    @endif

    <section class="panel panel-default">
      <header class="panel-heading">
        <span class="h4">{{$data['action']}} Product</span>
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
              <label>Upload image</label>
              <input type="file" name="img" class="form-control" id="img">
              <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-7">
              <label>Product Name</label>
              <input name="product_name" type="text" class="form-control" placeholder="Product Name" value="{{$product_name}}" required>
            </div>
            <div class="col-sm-12">
                <br>
              <label>Description</label>
              <textarea name="detail" class="form-control ckeditor" placeholder="Description">{{$detail}}</textarea>
            </div>
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


