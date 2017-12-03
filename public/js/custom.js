$(document).ready(function() {
    $($('#detail-table tr:last td:last-child').children()[0]).show();
    callClickEvent('#add_more_3');
  });
function callClickEvent (id) {
    $(id).keydown(function(e){
         e.preventDefault();
        if(e.which === 13){
            $(id).click();
        }
    });
}
function calculateAmount() {
  var quantity = $("#se_quantity").val();
  var sellPrice = $("#se_sell_price").val();
  $("#se_total_amt").val(parseFloat(quantity) * parseFloat(sellPrice));
}
function setUserDetails($this) {
  var userId = $("#se_customer_user").val();
  var src = "/user/"+userId;
   $.ajax({
       url: src,
       dataType: "json",
       success: function(data) {
             $('#se_user_discount').val(data.u_discount);
             $('#se_user_address').val(data.u_address);
       }
   });
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
             $('#se_hsn_code').val(value.p_hsn_sac_code);
             $('#se_sell_price').val(250);
           }
         });
       }
   });
};
var clickCount = 0;
var tabIndex = 17;
function addRow(new_Attribute) {
    clickCount++;
    tabIndex++;
    $('#'+new_Attribute.id).hide();
    var newRow = '<tr id="new-row-'+clickCount+'"> <td>'+parseInt(clickCount+1)+'</td><td> <select tabindex='+tabIndex+' style="width: 100%;" id="se_product_code_'+clickCount+'" class="se_product_code se_entry_'+clickCount+'" value="" onchange="setProductDetails()" name="se_product_code_'+clickCount+'"></select> </td><td> <input tabindex='+parseInt(tabIndex+2)+' type="text" name="se_product_name_'+clickCount+'" id="se_product_name_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex="'+parseInt(tabIndex+3)+'" type="text" name="se_hsn_code_'+clickCount+'" id="se_hsn_code_'+clickCount+'" value="" class="se_entry_'+clickCount+'"> </td><td> <input tabindex="'+parseInt(tabIndex+4)+'" type="text" name="se_quantity_'+clickCount+'" id="se_quantity_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex="'+parseInt(tabIndex+5)+'" type="text" name="se_sell_price_'+clickCount+'" id="se_sell_price_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+6)+' type="text" name="se_discount_'+clickCount+'" id="se_discount_'+clickCount+'" value="" class="se_entry_'+clickCount+'"> </td><td> <input tabindex='+parseInt(tabIndex+7)+' type="text" name="se_tax_cgst_'+clickCount+'" id="se_tax_cgst_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+8)+' type="text" name="se_tax_cgst_amt_'+clickCount+'" id="se_tax_cgst_amt_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+9)+' type="text" name="se_tax_sgst_'+clickCount+'" id="se_tax_sgst_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+10)+' type="text" name="se_tax_sgst_amt_'+clickCount+'" id="se_tax_sgst_amt_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+11)+' type="text" name="se_total_amt_'+clickCount+'" id="se_total_amt_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td class="action"> <span tabindex='+parseInt(tabIndex+12)+' id="add_more_'+clickCount+'" style="color: green;" onclick="addRow(this)"><i class="fa fa-plus" aria-hidden="true"></i></span> <span tabindex='+parseInt(tabIndex+13)+' style="color: red;" onclick="deleteRow(this)" "><i class="fa fa-times " aria-hidden="true "></i></span> </td></tr>';
    tabIndex = tabIndex+13;
    $('#detail-table').append(newRow);
    selectLoad($('#'+new_Attribute.parentNode.parentNode.id).next()[0].children[1].children[0].id);
    callClickEvent('#add_more_'+clickCount);
}
function deleteRow(attribute) {
    var cildrenLen = $('#'+attribute.parentNode.parentNode.previousElementSibling.id)[0].children.length;
    $('#'+$('#'+attribute.parentNode.parentNode.previousElementSibling.id)[0].children[cildrenLen-1].children[0].id).show();
    $('#'+attribute.parentNode.parentNode.id).remove();
}
function selectLoad (id) {
    var src = "/searchajax";
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
function saveSalesEntry () {
////  console.log(e);
//  var salesArray = [];
//
//  // return false;
//    $("tr[id^='new-row-']").each(function(index, element){
//      var sale = {};
//      sale._token = $("input[name = '_token']").val();
//      sale.productCode = $("#se_product_code_"+index).select2("val");
//      sale.quantity = $("#se_quantity_"+index).val();
//      sale.se_sgst_amount = $("#se_tax_sgst_amt_"+index).val();
//      sale.se_cgst_amount = $("#se_tax_cgst_amt_"+index).val();
//      salesArray.push(sale);
//    });
    var url = '/sales';
    $.ajax({
      type: "POST",
        url: url,
//        contentType: "application/x-www-form-urlencoded",
        // method: POST,
//        data: salesArray
      });
}
function printBill() {
    orderEntry();
    window.open('/pdf', '_blank');
//    var userId = $("#se_customer_user").val();
//    var amountGiven = $("#se_amt_given").val();
////console.log($("#se_customer_user").val());
//    var url = '/pdf';
//    $.ajax({
//        type: "POST",
//        url: url,
//        contentType: "application/x-www-form-urlencoded",
////        data: {_token:$("input[name = '_token']").val(),userId:userId},
//        data: {_token:$("#token").val(),userId:userId,amountGiven:amountGiven},
////        _token : $("input[name = '_token']").val()
//      });
}
function orderEntry() {
    var userId = $("#se_customer_user").val();
    var amountGiven = $("#se_amt_given").val();
//console.log($("#se_customer_user").val());
    var url = '/order';
    $.ajax({
        type: "POST",
        url: url,
        contentType: "application/x-www-form-urlencoded",
//        data: {_token:$("input[name = '_token']").val(),userId:userId},
        data: {_token:$("#token").val(),userId:userId,amountGiven:amountGiven},
//        _token : $("input[name = '_token']").val()
      });
}