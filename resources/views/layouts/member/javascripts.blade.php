<!-- js -->
<script src="{{asset('assets/member/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/member/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/member/js/slick.js')}}"></script>
<script src="{{asset('assets/member/js/waypoints.js')}}"></script>
<script src="{{asset('assets/member/js/jquery.counterup.js')}}"></script>
<script src="{{asset('assets/member/js/jquery.mixitup.js')}}"></script>
<script src="{{asset('assets/member/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('assets/member/js/custom.js')}}"></script>



<script type="text/javascript">
//loader page
$(window).load(function() {
    $(".loader").fadeOut("slow");
})  


//checked payment
$("#payment1").click(function()
{ 
    $("#checked_payment1").show();
    $("#checked_payment2").hide();
    $("#checked_payment3").hide();
});
$("#payment2").click(function()
{ 
    $("#checked_payment1").hide();
    $("#checked_payment2").show();
    $("#checked_payment3").hide();
});
$("#payment3").click(function()
{ 
    $("#checked_payment1").hide();
    $("#checked_payment2").hide();
    $("#checked_payment3").show();
});
</script>


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


<!-- favorite course-->
<script type="text/javascript">
function save_favorite_course(id){

var url_favorite = "{{url('course/favorite/save/')}}/"+id;

 $.ajax({
        type:"get",
        url:url_favorite,
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
          text: data.message,
          showConfirmButton: false,
          timer: 3000
            })

     }

     else {

        swal.fire({
          type: 'error',
          title: 'Error',
          text: data.message,
          showConfirmButton: false,
          timer: 3000
            })

          }


        }


            });

}
</script>


<!-- review course -->
<script type="text/javascript">
//btn show rating
$("#btn_rating").click(function() {
var session_id = "{{session('session_id')}}";
var register = "{{url('register')}}";
if(session_id==''){
Swal.fire({
  title: 'Please login!',
  html: "<font color=red>Please login to use this section!</font><br><br>หรือ<br><br><a href="+register+"><U>New register</U></a>",
  type: 'warning',
  showConfirmButton: false,
})
}
else{
$('#show_rating').slideDown("slow");
}
});

// select rating
$(".rateButton").click(function() {
  if($(this).hasClass('btn-grey')) {      
    $(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
    $(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
    $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');     
  } else {            
    $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
  }
  $("#rating").val($('.star-selected').length);   
});

//cancel rating
$("#cancelReview").click(function() {
    $("#show_rating").slideUp('slow'); 
  }); 

//insert rating
$('#ratingForm').on('submit', function(event){
event.preventDefault();
var formData = $(this).serialize();
$.ajax({
type : 'POST',
url : "{{url('api/course/review')}}",
data : formData,
dataType: "json",
success:function(data){
$("#ratingForm")[0].reset();

if(data.result==true){

      Swal.fire({
      title: data.message,
      type: 'success',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ตกลง',
    }).then((result) => {
      if (result.value) {
        window.setTimeout(function(){window.location.reload()},1000)
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
// window.setTimeout(function(){window.location.reload()},1000)
}

});
});


//payment
function payment_order(type,price){
$("#price").val(price);
if(type==1){
$("#payment_credit_card").modal('show');
}
else{
$("#payment_transfer").modal('show');
}
}


// show lesson
function show_lesson(name,vdo_url,content){
$("#show_lesson_modal").modal('show');

$("#lesson_name").html(name);

$("#lesson_vdo_url").html('<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'+vdo_url+'"></iframe></div>');

$("#lesson_content").html(content);

}
</script>


<script type="text/javascript">
//testing course
$('#testing_course_save').on('submit', function(e){
e.preventDefault(); 

var formData = new FormData($(this)[0]);

var url_api = "{{url('api/mycourse/testing/save')}}";

$.ajax({
type : 'post',
url : url_api,
data : formData,
dataType: "json",
async: false,
cache: false,
contentType: false,
processData: false,
success:function(data){

$("#testing_course_save")[0].reset();

if(data.result==true){


if(data.step!=4){
var url_after = "{{url('mycourse/testing')}}"+'/'+data.id+'/'+data.title+'/'+data.step;
}
else{
var url_after = "{{url('mycourse/testing/score')}}"+'/'+data.score_pretest+'/'+data.score_posttest+'/'+data.title+'/'+data.question_amount+'/'+data.status;
}

     swal.fire({
      type: 'success',
      html: data.message,
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK',
    }).then((result) => {
      if (result.value) {
        window.location=url_after;
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


@include('page.member.ajax.course.javascript')