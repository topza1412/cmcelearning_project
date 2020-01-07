<div class="modal fade bd-example-modal-lg" id="modal_create_lesson" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form name="form_create_lesson" id="form_create_lesson" method="post" autocomplete="off">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-edit"></i> New Lesson</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="type_action" class="type_action">
          <input type="hidden" name="filename_hidden" id="filename_hidden">
          <input type="hidden" name="course_id" class="course_id">
          <input type="hidden" name="lesson_id" id="lesson_id">

          <div class="row">

          <div class="col-lg-7">
          <div class="form-group">
            <label class="col-form-label">Lesson Name:</label>
            <input type="text" name="lesson_name" class="form-control" id="lesson_name"  required>
          </div>
          <div class="form-group">
            <label class="col-form-label">Vdo Url:</label>
            <input type="url" name="vdo_url" class="form-control"  id="vdo_url">
          </div>
        </div>

        <div class="col-lg-5">
        <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <label class="switch">
                  <input name="status" type="checkbox" id="status" value="1" >
                  <span></span>
                </label>
              </div>
            </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Detail:</label>
            <textarea class="form-control detail" name="detail" ></textarea>
          </div>
        </div>

         <div class="col-lg-12">
          <div class="form-group">
            <label class="col-form-label">Upload file: <span class="text-danger">(Upload a maximum of 5 mb per file.)</span></label>
            <div class="needsclick dropzone" id="document-dropzone"></div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="col-form-label">File upload:</label>
            <div id="lesson_file"></div>
          </div>
        </div>

      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" id="btn_lesson" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modal_create_banner_slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="form_create_banner_slide" id="form_create_banner_slide" method="post">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b><i class="fa fa-edit"></i> New Banner Slide</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" name="type_action" class="type_action">
          <input type="hidden" name="banner_id" class="banner_id">
          <input type="hidden" name="img_banner" class="img_banner">

          <div class="row">

          <div class="col-lg-12">
          <div class="form-group">
            <div id="show_banner"></div>
            <br>
            <label class="col-form-label">Upload image:</label>
            <input type="file" name="img" class="form-control" id="img">
            <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 3 mb & size 1920*695.</p>
          </div>
          <div class="form-group">
            <label class="col-form-label">Banner Title:</label>
            <input type="text" name="title" class="form-control banner_title">
          </div>
          <div class="form-group">
            <label class="col-form-label">Banner Url:</label>
            <input type="url" name="banner_url" class="form-control banner_url">
          </div>
        </div>

      </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>
  </div>
</div>
<!-- end modal -->


<script type="text/javascript">

var uploadedDocumentMap = {}

Dropzone.options.documentDropzone = {
    url: "{{url('api/admin/course/lesson/upload')}}",
    width: 300,
    height: 300, 
    maxFilesize: 5, // MB
    progressBarWidth: '100%',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $.ajax({
            type: 'POST',
            url: "{{url('api/admin/course/lesson/upload/delete')}}",
            data: "name="+name,
            dataType: 'html'
        });
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($project) && $project->document)
        var files =
          {!! json_encode($project->document) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
</script>

<script type="text/javascript">
$("#form_create_lesson").on("submit",function(e){
e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax

var formData = new FormData($(this)[0]);

var url_api = "{{url('api/admin/course/Lesson/action')}}";

 $.ajax({
        type:"post",
        url:url_api,
        data:formData,
        dataType: "json",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function (data) {

    if(data.result==true){

       swal.fire({
      type: 'success',
      title: 'success',
      text: data.message
    }).then((result) => {
      if (result.value) {
        location.reload();
      }
    })    

     }

     else {

        swal.fire({
          type: 'error',
          title: 'Error',
          text: data.message,
          showConfirmButton: false,
          timer: 2500
            })

          }


        }


            });

});
</script>


<script type="text/javascript">
$("#form_create_banner_slide").on("submit",function(e){
e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax

var formData = new FormData($(this)[0]);

var url_api = "{{url('api/admin/content/banner/action')}}";

 $.ajax({
        type:"post",
        url:url_api,
        data:formData,
        dataType: "json",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function (data) {

    if(data.result==true){

      swal.fire({
      type: 'success',
      title: 'success',
      text: data.message
    }).then((result) => {
      if (result.value) {
        window.location = '{{url('admin/content/home')}}';
      }
    })  

     }

     else {

        swal.fire({
          type: 'error',
          title: 'Error',
          text: data.message,
          showConfirmButton: false,
          timer: 2500
            })

          }


        }


            });

});
</script>
