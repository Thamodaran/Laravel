$(document).ready(function() {
    var src = "/searchajax";

    $("#se_product_name").keyup(function() {
      var name = $("#se_product_name").val();
       $.ajax({
           url: src+'/'+name,
           dataType: "json",
           success: function(data) {
             makeproductDropDown(data);
              //  response(data);
              //  console.log(data);
           }
       });
    });
  });

  function makeproductDropDown(products) {
    $("#se_product_code").val(products[0].p_product_code);
    console.log(products[0].p_product_code);
  }
