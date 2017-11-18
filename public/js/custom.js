$(document).ready(function() {

  });

  function makeproductDropDown(products) {
    $("#se_product_code").val(products[0].p_product_code);
    console.log(products[0].p_product_code);
  }

function setProductDetails() {
  var name = $('#se_product_code option:selected').text();

   $.ajax({
       url: src+'?term='+name,
       dataType: "json",
       success: function(data) {
         $.each( data, function( key, value ) {
           if(value.p_product_code === name) {
             $('#se_product_name').val(value.p_product_name);
             $('#se_tax').val(value.p_tax);
            //  $('#se_product_name').val(value.p_hsn_sac_code);
           }
          //  return false;
         });
       }
   });
};
