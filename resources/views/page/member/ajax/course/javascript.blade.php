<!-- price range -->
<script type="text/javascript">
$(document).ready(function(){  
  $("#price_range").slider({
    range: true,
    min: 0,
    max: 30000,
    values: [1,1000],
    slide:function(event, ui){
      $("#amount").val( "฿" + ui.values[ 0 ] + " - ฿" + ui.values[ 1 ] );
      $(".loader").fadeIn("slow");
      load_course(ui.values[0], ui.values[1]);
    }
  });

  $("#amount").val( "฿" + $("#price_range").slider( "values", 0 ) +
      " - ฿" + $("#price_range").slider( "values", 1 ));
  
  load_course(0,30000);

  load_course_category(0,30000,$("#category_id").val());
  
  function load_course(minimum_range, maximum_range)
  {

    $.ajax({
      url:"{{url('api/course')}}",
      method:"POST",
      data:{minimum_range:minimum_range, maximum_range:maximum_range},
      success:function(data)
      {	
		 $(".loader").fadeOut("slow");
        $('#show_course').fadeIn('slow').html(data);
      }
    });
  }


  function load_course_category(minimum_range, maximum_range,category_id)
  {

    console.log(category_id);

    $.ajax({
      url:"{{url('api/course/category')}}",
      method:"POST",
      data:{minimum_range:minimum_range, maximum_range:maximum_range,category_id:category_id},
      success:function(data)
      { 
     $(".loader").fadeOut("slow");
        $('#show_course_category').fadeIn('slow').html(data);
      }
    });
  }
  
});


$(window).on('hashchange', function() {

if (window.location.hash) {

    var page = window.location.hash.replace('#', '');

    if (page == Number.NaN || page <= 0) {

        return false;

    }else{

        getData(page);

    }

}

});


$(document).ready(function()

{

$(document).on('click', '.pagination a',function(event)

{

    event.preventDefault();

    $('li').removeClass('active');

    $(this).parent('li').addClass('active');

    var myurl = $(this).attr('href');

    var page=$(this).attr('href').split('page=')[1];

    var minimum_range = $("#minimum_range").val();

    var maximum_range = $("#maximum_range").val();

    $(".loader").fadeIn("slow");

    getData(page,minimum_range,maximum_range);

});

});


function getData(page,minimum_range,maximum_range){

    $.ajax(
    {

        url: '?page=' + page+'&minimum_range'+minimum_range+'&maximum_range'+maximum_range,

        type: "get",

        datatype: "html"

    }).done(function(data){

    	 $(".loader").fadeOut("slow");

        $("#tag_container").html(data);

        location.hash = page;

    }).fail(function(jqXHR, ajaxOptions, thrownError){

          alert('No response from server');

    });

}
</script>