$(document).ready(function() {
    var src = "/searchajax";

    $("#p_product_name").keyup(function() {
      var name = $("#p_product_name").val();
       $.ajax({
           url: src+'/'+name,
           dataType: "json",
           success: function(data) {

              //  response(data);
               console.log(data);
           }
       });
    });
  });
