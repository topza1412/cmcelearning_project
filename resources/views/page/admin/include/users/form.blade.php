<div class="row">
<div class="col-sm-12">

  <form class="form-horizontal" action="{{url('admin/users/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data">
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


    @if(isset($data['detail']['image']))
    <input type="hidden" name="img_hidden" value="{{$data['detail']['image']}}">
    <?php $img = asset('upload/'.$data['page'].'/profile/images/'.$data['detail']['image']);?>
    @else
    <?php $img = asset('assets/member/images/no-image.png');?>
    @endif

   
    @if(isset($data['detail']['first_name']))
    <?php $first_name = $data['detail']['first_name'];?>
    @else
    <?php $first_name = null;?>
    @endif

    @if(isset($data['detail']['last_name']))
    <?php $last_name = $data['detail']['last_name'];?>
    @else
    <?php $last_name = null;?>
    @endif

    @if(isset($data['detail']['email']))
    <?php $email = $data['detail']['email'];?>
    @else
    <?php $email = null;?>
    @endif

    @if(isset($data['detail']['sex']))
    <?php $sex = $data['detail']['sex'];?>
    @else
    <?php $sex = null;?>
    @endif

    @if(isset($data['detail']['birthday']))
    <?php $birthday = $data['detail']['birthday'];?>
    @else
    <?php $birthday = null;?>
    @endif

    @if(isset($data['detail']['phone_number']))
    <?php $phone = $data['detail']['phone_number'];?>
    @else
    <?php $phone = null;?>
    @endif

    @if(isset($data['detail']['address']))
    <?php $address = $data['detail']['address'];?>
    @else
    <?php $address = null;?>
    @endif

    @if(isset($data['detail']['id_card']))
    <?php $id_card = $data['detail']['id_card'];?>
    @else
    <?php $id_card = null;?>
    @endif

    @if(isset($data['detail']['occupation']))
    <?php $occupation = $data['detail']['occupation'];?>
    @else
    <?php $occupation = null;?>
    @endif

    @if(isset($data['detail']['company']))
    <?php $company = $data['detail']['company'];?>
    @else
    <?php $company = null;?>
    @endif

    @if(isset($data['detail']['user_status']))
    <?php $status = $data['detail']['user_status'];?>
    @else
    <?php $status = null;?>
    @endif

     @if(isset($data['detail']['user_type']))
    <?php $type = $data['detail']['user_type'];?>
    @else
    <?php $type = null;?>
    @endif

    <section class="panel panel-default">
      <header class="panel-heading">
        <span class="h4">{{$data['action']}} {{$data['page']}}</span>
      </header>
      <div class="panel-body">                     

        <div class="col-sm-6">

            <div class="col-sm-12">
                <br>
              <label>First Name</label>
              <input name="first_name" type="text" class="form-control" placeholder="First Name" value="{{$first_name}}" required>
            </div>

            <div class="col-sm-12">
                <br>
              <label>Last Name</label>
              <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="{{$last_name}}" required>
            </div>

            <div class="col-sm-12">
              <br>
              <div align="center">
              <a href="{{$img}}" target="_blank">
              <img src="{{$img}}" width="200" class="img-thumbnail">
              </a>
            </div>
                <br>
              <label>Upload image</label>
              <input type="file" name="img" class="form-control" id="img">
              <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.</p>
            </div>

            <div class="col-sm-12">
                <br>
              <label>Email</label>
              <input name="email" type="email" class="form-control" placeholder="Email" value="{{$email}}" required>
            </div>

            @if($data['action']=='Create')

             <div class="col-sm-12">
                <br>
              <label>Password</label>
              <input name="password" type="text" class="form-control" placeholder="Password 8 digits" maxlength="8" id="show_gen_pass" required>
              <button type="button" class="btn btn-primary btn-sm" onclick="gen_pass(8);">Generate password</button>
            </div>

            @endif

            <div class="col-sm-12">
                <br>
              <label>Phone</label>
              <input name="phone" type="text" class="form-control" placeholder="Phone 10 digits" maxlength="10" value="{{$phone}}">
            </div>

            <div class="col-sm-12">
                <br>
              <label>Address</label>
              <textarea name="address" class="form-control" placeholder="Address">{{$address}}</textarea>
            </div>

        </div>

         <div class="col-sm-6">

            <div class="col-sm-12">
                <br>
              <label>Sex</label>
              <select name="sex" class="form-control">
               <option value="">Select</option>
               <option value="1"@if($sex==1){{'selected'}}@endif>Male</option> 
               <option value="2"@if($sex==2){{'selected'}}@endif>Famale</option>   
              </select>
            </div>

            <div class="col-sm-12">
                <br>
              <label>Birthday</label>
              <input name="birthday" type="text" class="form-control datepicker-input" placeholder="Birthday" value="{{$birthday}}">
            </div>

            <div class="col-sm-12">
                <br>
              <label>ID Card No.</label>
              <input name="id_card" type="text" class="form-control" maxlength="13" placeholder="ID Card No 13 digits" value="{{$id_card}}" required>
            </div>

            <div class="col-sm-12">
                <br>
              <label>Occupation</label>
              <input name="occupation" type="text" class="form-control" placeholder="Occupation" value="{{$occupation}}">
            </div>

            <div class="col-sm-12">
                <br>
              <label>Company</label>
              <input name="company" type="text" class="form-control" placeholder="Company" value="{{$company}}">
            </div>

            <div class="col-sm-12">
                <br>
              <label>User type</label>
              <select name="type" class="form-control" required>
               <option value="">Select</option>
               <option value="1"@if($type==1){{'selected'}}@endif>Admin</option> 
               <option value="2"@if($type==2){{'selected'}}@endif>User</option> 
               <option value="3"@if($type==3){{'selected'}}@endif>Teacher</option>   
              </select>
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

  </form>

</div>
</div>

<script type="text/javascript">
function gen_pass(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   
   $("#show_gen_pass").val(result);
}
</script>


