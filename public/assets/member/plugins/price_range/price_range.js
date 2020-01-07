$(document).ready(function(){  
    
  $("#price_range").slider({
    range: true,
    min: 0,
    max: 30000,
    values: [0,0],
    slide:function(event, ui){
      $("#amount").val( "฿" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      // $("#minimum_range").val(ui.values[0]);
      // $("#maximum_range").val(ui.values[1]);
      load_product(ui.values[0], ui.values[1]);
    }
  });

  $("#amount").val( "฿" + $("#price_range").slider( "values", 0 ) +
      " - ฿" + $("#price_range").slider( "values", 1 ));
  
  load_product(0,30000);
  
  function load_product(minimum_range, maximum_range)
  {
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{minimum_range:minimum_range, maximum_range:maximum_range},
      success:function(data)
      {
        $('#load_product').fadeIn('slow').html(data);
      }
    });
  }
  
});  