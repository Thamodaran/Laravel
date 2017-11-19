$(document).ready(function() {
    $('#'+$('#new-row-'+$('#detail-table tr').length)[0].children[12].children[0].id).show();
    $('#'+$('#new-row-'+$('#detail-table tr').length)[0].children[12].children[1].id).hide();
  });

  function makeproductDropDown(products) {
    $("#se_product_code").val(products[0].p_product_code);
    console.log(products[0].p_product_code);
  }

function setProductDetails() {
  var name = $('#se_product_code option:selected').text();
  var src = "/searchajax";
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
var clickCount = 3;
function addRow(new_Attribute) {
    clickCount++;
    var newRow = '<tr id="new-row-'+clickCount+'"> <td>'+parseInt(clickCount-2)+'</td><td><select style="width: 100%;" id="se_product_code_'+clickCount+'" class="se_product_code" value="" onchange="setProductDetails()" name="se_product_code_'+clickCount+'"></select></td><td><input type="text" name="se_product_name_'+clickCount+'" id="se_product_name_'+clickCount+'" class="" value=""></td><td><input type="text" value="" class=""></td><td><input type="text" name="se_quantity_'+clickCount+'" id="se_quantity_'+clickCount+'" class="" value=""></td><td><input type="text" name="se_sell_price_'+clickCount+'" id="se_sell_price_'+clickCount+'" class="" value=""></td><td><input type="text" value="" class=""></td><td><input type="text" name="se_tax_cgst_'+clickCount+'" id="se_tax_'+clickCount+'" class="" value=""></td><td><input type="text" name="se_tax_cgst_amt_'+clickCount+'" id="se_tax_'+clickCount+'" class="" value=""></td><td><input type="text" name="se_tax_sgst_'+clickCount+'" id="se_tax_'+clickCount+'" class="" value=""></td><td><input type="text" name="se_tax_sgst_amt_'+clickCount+'" id="se_tax_'+clickCount+'" class="" value=""></td><td><input type="text" name="se_total_amt_'+clickCount+'" id="se_total_amt_'+clickCount+'" class="" value=""></td><td class="action"> <span id="add_more_'+clickCount+'" style="color: green;" onclick="addRow(this)"><i class="fa fa-plus" aria-hidden="true"></i></span> <span style="color: red;"  onclick="deleteRow(this)""><i class="fa fa-times" aria-hidden="true"></i></span> </td></tr>';
    $('#detail-table').append(newRow);
    selectLoad($('#'+new_Attribute.parentNode.parentNode.id).next()[0].children[1].children[0].id);
//    console.log(new_Attribute.parentNode.parentNode.id);$('#new-row-1').next()[0].children[1].children.id
//    console.log($('#'+new_Attribute.parentNode.parentNode.id).next()[0].children[1].children[0].id);
    var rowLength = $('#detail-table tr').length;
    console.log($('#new-row-'+rowLength));
    if( $('#new-row-'+rowLength)[0] != undefined) {
//        console.log($('#new-row-'+rowLength)[0].children[12].children[0]);
        $('#'+$('#new-row-'+rowLength)[0].children[12].children[0].id).show();
        $('#'+$('#new-row-'+parseInt(rowLength-1))[0].children[12].children[0].id).hide();
        $('#'+$('#new-row-'+rowLength)[0].children[12].children[1].id).hide();
        $('#'+$('#new-row-'+parseInt(rowLength-1))[0].children[12].children[1].id).show();
    }
}
function deleteRow(attribute) {
    var rowLength = $('#detail-table tr').length;
    console.log(rowLength);
    $('#'+attribute.parentNode.parentNode.id).remove();
    console.log($('#'+$('#new-row-'+parseInt(rowLength-1))[0].children[12].children[0].id).show());
    console.log($('#'+$('#new-row-'+parseInt(rowLength-1))[0].children[12].children[1].id).hide());
//    if(rowLength == 3) {
////        $('#'+$('#new-row-'+parseInt(rowLength-1))[0].children[12].children[0].id).show();
//        $('#'+$('#new-row-'+parseInt(rowLength))[0].children[12].children[1].id).hide();
//    }
}
function selectLoad (id) {
    var src = "/searchajax";
    var name = $("#"+id).val();
    $("#"+id).select2({
        placeholder: 'Select an item',
        ajax: {
            url: src,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}