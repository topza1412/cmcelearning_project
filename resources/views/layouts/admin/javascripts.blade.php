<!-- js -->
<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>
<script src="{{asset('assets/admin/js/app.plugin.js')}}"></script>
<script src="{{asset('assets/admin/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/admin/js/charts/easypiechart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('assets/admin/js/charts/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/admin/js/charts/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/admin/js/charts/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('assets/admin/js/charts/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/admin/js/charts/flot/jquery.flot.grow.js')}}"></script>
<script src="{{asset('assets/admin/js/charts/flot/demo.js')}}"></script>
<script src="{{asset('assets/admin/js/calendar/bootstrap_calendar.js')}}"></script>
<script src="{{asset('assets/admin/js/calendar/demo.js')}}"></script>
<script src="{{asset('assets/admin/js/sortable/jquery.sortable.js')}}"></script>
<script src="{{asset('assets/admin/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/js/datepicker/bootstrap-datepicker.js')}}"></script>


<script type="text/javascript">

//loader page
$(window).load(function() {
    $(".loader").fadeOut("slow");
})  

//add row pretest posttest
$("#question_type").change(function() {
if($("#question_type").val()==1){
$("#show_question2").hide();
$("#show_question1").show();
}
else if($("#question_type").val()==2){
$("#show_question1").hide();
$("#show_question2").show();
}
else{
$("#show_question1").hide();
$("#show_question2").hide();		
}
});

//add row auto
$(function(){  
    $("#addRow").click(function(obj){  
        $('#mytbl tbody tr').last().clone().appendTo('#mytbl tbody');
        $('#mytbl tbody tr').last().find('input:text').val('');

    });  

    $("#addRow2").click(function(obj){  

      var text = '<div class="form-group col-sm-10"><label><b>Choice</b></label><input name="choices[]" type="text" class="form-control" placeholder="Choice" required></div> <div class="form-group col-sm-2">&nbsp;&nbsp;<label><b>Answer</b></label><div style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;<input name="answers[]" type="radio" value="true"></div></div>';

      // var text = '<div class="form-group col-sm-2">&nbsp;&nbsp;<label><b>Answer</b></label><div style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;<input name="answers[]" type="checkbox" value="true"></div></div>';

      // var text .= '<div class="form-group col-sm-2">&nbsp;&nbsp;<label><b>Answer</b></label><div style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;<input name="answers[]" type="checkbox" value="true"></div></div>';

      // $('#add_row').append(text);
        $('#add_row').last().append(text);
        $('#add_row').last().find('input:text').val('');
    }); 

    $("#addRow3").click(function(obj){  
        $('.mytbl3 tbody tr').last().clone().appendTo('.mytbl3 tbody');
        $('.mytbl3 tbody tr').last().find('input:text').val('');
    }); 



    }); 

   function doRemoveItem(obj){
        // if($('#mytbl').size() >= 1){
        //     if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
        // }else{
        //     alert('ไม่อนุญาตให้ลบแถวที่เหลือนี้ได้');
        //     return false;
        // }
        if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
    }

    function doRemoveItem2(obj){
        // if($('.mytbl2 tbody tr').size() > 1){
        //     if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
        // }else{
        //     alert('ไม่อนุญาตให้ลบแถวที่เหลือนี้ได้');
        //     return false;
        // }

        if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
    }

 //end
 </script>


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


<!--welcome admin-->
@if (Session::has('login_success'))
<script type="text/javascript" charset="utf-8">
Swal.fire({
  type: 'success',
  title: 'ยินดีต้อนรับผู้ดูแลระบบ',
  showConfirmButton: false,
  timer: 3000
})
</script>
@endif

<!-- confirm delete -->
<script type="text/javascript" charset="utf-8">
function confirm_delete(url,id){
Swal.fire({
  title: 'Comfirm delete data!',
  text: "You are sure to delete this data!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm',
  cancel: 'Cancel'
}).then((result) => {
  if (result.value) {
    window.location = url+'/'+id;
  }
})
}
</script>

<!-- show video -->
<script type="text/javascript" charset="utf-8">
function show_video(name,url) {

if(url==''){
var url = "<hr><span class=text-danger>ไม่พบวิดีโอ!</span>";
}
else{
var url = "<hr><iframe width=400 src="+url+"></iframe>"; 
}

Swal.fire({
  title: name,
  html: url,
  showConfirmButton: false
})
}
</script>


<!-- select2 category data -->
<script type="text/javascript">    
$(document).ready(function() {
    /*กำหนดให้ class js-data-example-ajax  เรียกใช้งาน Function Select 2*/
    $(".select2_category_data").select2({
      ajax: {
        url: "{{url('api/admin/category/getdata')}}",/* Url ที่ต้องการส่งค่าไปประมวลผลการค้นข้อมูล*/
        dataType: 'json',
        delay: 250,
        data: function (params) {
            
          return {
            q: params.term, // ค่าที่ส่งไป
            page: params.page
          };

        },
        processResults: function (data, params) {
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: formatRepo, // omitted for brevity, see the source of this page
      templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

});


function formatRepo (repo) {

  if (repo.loading) return repo.text;
  
  var markup = "<div class='select2-result-repository clearfix'>" +
    "<div class='select2-result-repository__meta'>" +
      "<div class='select2-result-repository__title'>" + repo.value + "</div></div></div>";

  return markup;
}


function formatRepoSelection (repo) {
  return repo.value || repo.text;
}

</script>


<!-- form course -->
<script type="text/javascript">
$("#form_course").on("submit",function(e){
e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax

var formData = new FormData($(this)[0]);

var url_api = "{{url('api/admin/course/Main/action')}}";

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
      title: 'Success',
      text: data.message
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



<!-- create question -->
<script type="text/javascript">
$("#btn_create_question").click(function() {
var amount_question = $("#amount_question").val();
var amount_choice = $("#amount_choice").val();

if(amount_question>0 && amount_choice>0){
var data = '';
var n = 0;

data += '<h4 align="center"><b>Add New Question</b></h4>';

for(i=1;i<=amount_question;i++){

data += '<div class="col-lg-6 alert alert-success" id="mytbl">';

data += '<div class="form-group col-sm-10"><label class="text-info"><h5><b>Question&nbsp;'+i+'</b></h5></label><input name="question_create[]" type="text" class="form-control" placeholder="Question" required></div>';

data += '<div class="form-group col-sm-2 text-right" style="padding: 5px;"><button type="button" class="btn btn-danger" onclick="doRemoveItem(this);"><i class="fa fa-trash-o"></i></button></div>';

data += '<div class="clearfix"></div>';

for(s=1;s<=amount_choice;s++){

data += '<div class="form-group col-sm-10"><label><h6><b>Choice&nbsp;'+s+'</b>&nbsp;</h6></label><input name="choices_create['+n+'][]" type="text" class="form-control" placeholder="Choice" required></div>';

data += '<div class="form-group col-sm-2"><button type="button" class="btn btn-danger btn-xs" onclick="doRemoveItem2(this);"><i class="fa fa-trash-o"></i></button></div>';

}

data += '<div class="form-group col-sm-6">';

data += '<label><h6><b>Answer</b>&nbsp;</h6></label>';

if(amount_choice==1){

data += '<select name="answers_create['+n+'][]" class="form-control"><option value="0">Choice1</option></select>';

}

else if(amount_choice==2){

data += '<select name="answers_create['+n+'][]" class="form-control"><option value="0">Choice1</option><option value="1">Choice2</option></select>';

}

else if(amount_choice==3){

data += '<select name="answers_create['+n+'][]" class="form-control"><option value="0">Choice1</option><option value="1">Choice2</option><option value="2">Choice3</option></select>';

}

else if(amount_choice==4){

data += '<select name="answers_create['+n+'][]" class="form-control"><option value="0">Choice1</option><option value="1">Choice2</option><option value="2">Choice3</option><option value="3">Choice4</option></select>';

}

data += '</div>';

data += '</div>';


n++;

}

data += '<div class="clearfix"></div>';

$("#show_question_amount").html(data);

}

});
</script>


<!-- form pre post -->
<script type="text/javascript">
$("#form_pre_post").on("submit",function(e){
e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax

var formData = new FormData($(this)[0]);

var url_api = "{{url('api/admin/course/Pretest/action')}}";

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
      title: 'Success',
      text: data.message
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


<!-- modal create lesson -->
<script type="text/javascript">
function btn_create_lesson (type_action,lesson_file,course_id,lesson_id,lesson_name,vdo_url,detail,status){

$('#form_create_lesson')[0].reset();

$("#modal_create_lesson").modal('show');

if(type_action=='Create'){
$(".type_action").val(type_action);
$(".course_id").val(course_id);
$("#download_file").hide();
}
else
{
$('#lesson_file').empty();
data = $.parseJSON(lesson_file);
if(data.length>0){
$.each(data, function(k, v) {
$("#lesson_file").append('<a target="_blank" href="{{asset('upload/member/lesson/file/')}}/'+v+'">'+v+'</a>&nbsp;&nbsp;<a href="javascript:void();" onclick=confirm_delete("{{url('admin/course/delete/LessonFileDelete/')}}","'+v+'");><i class="fa fa-trash-o"></i></a><br>');
});
}
else{
$("#lesson_file").html('No file upload.');
}

$(".type_action").val(type_action);
$("#lesson_id").val(lesson_id);
$("#lesson_name").val(lesson_name);
$("#vdo_url").val(vdo_url);
$("#filename_hidden").val(filename_hidden);
$(".detail").val(detail);


if(status==1){
$('#status').prop('checked', true);
}
else{
$('#status').prop('checked', false);  
}

}

} 


</script>


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



<!-- modal create banner -->
<script type="text/javascript">
function btn_banner_slide (type_action,id,img_banner,banner_title,banner_url){

$('#form_create_banner_slide')[0].reset();

$("#modal_create_banner_slide").modal('show');
$(".type_action").val(type_action);
$(".banner_id").val(id);
if(type_action=='Edit'){
$("#show_banner").html("<img src='{{asset('')}}/upload/admin/banner/images/"+img_banner+"'width=550'>");
}
else{
$("#show_banner").html('');
}
$(".img_banner").val(img_banner);
$(".banner_title").val(banner_title);
$(".banner_url").val(banner_url);
} 
</script>







