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

function findDiscountAmt(discountPer, totalAmt) {
  var discountAmt = (discountPer/100)*totalAmt;
  return discountAmt;
}

function findLastIndex(id){
  var idArray = id.split("_");
  var lastIndex = (idArray.length)-1;
  return idArray[lastIndex];
}

function calculateAmount(element) {
  var idLastVal = findLastIndex(element.id);
  var quantity = $("#se_quantity_"+idLastVal).val();
  var sellPrice = $("#se_sell_price_"+idLastVal).val();
  var totalAmt = parseFloat(quantity) * parseFloat(sellPrice);

  var discountPercentage = $("#se_discount_"+idLastVal).val();
  var cgstPercentage = $("#se_tax_cgst_"+idLastVal).val();
  var sgstPercentage = $("#se_tax_sgst_"+idLastVal).val();
  var discountAmt = 0;
  var cgstAmt = 0;
  var sgstAmt = 0;

  if(discountPercentage > 0) {
    discountAmt = findDiscountAmt(discountPercentage, totalAmt);
  }
  if(cgstPercentage > 0) {
    cgstAmt = findDiscountAmt(cgstPercentage, totalAmt);
    $("#se_tax_cgst_amt_"+idLastVal).val(cgstAmt);
  }
  console.log(cgstPercentage);
  if(sgstPercentage > 0) {
    sgstAmt = findDiscountAmt(sgstPercentage, totalAmt);
    $("#se_tax_sgst_amt_"+idLastVal).val(sgstAmt);
  }

  totalAmt = totalAmt - discountAmt;
  totalAmt = totalAmt + cgstAmt;
  totalAmt = totalAmt + sgstAmt;

  if(!isNaN(totalAmt)) {
      $("#se_total_amt_"+idLastVal).val(totalAmt);
  } else {
      $("#se_total_amt_"+idLastVal).val(0);
  }
}

function calculateTotalAmount(element) {
    var lastTotal = 0;
    var totalAmountElements = $( "input[name^='se_total_amt_']" );
    totalAmountElements.each(function(index) {
        console.log($(this).val());
        if($(this).val()) {
            lastTotal += parseFloat($(this).val());
        }        
    });
    $("#total_amount").text(lastTotal);
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

function setProductDetails(thisElement) {
  var nextElementId = thisElement.parentElement.nextElementSibling.children[0].id;
  var prodId = thisElement.value;
  var idArray = nextElementId.split("_");
  var lastIndex = (idArray.length)-1;
  var idLastVal = idArray[lastIndex];
  var src = "/product";
   $.ajax({
       url: src+'/'+prodId,
       success: function(data) {
          if($.isNumeric(idLastVal)) {
              $('#se_product_name_'+idLastVal).val(data.p_product_name);
              $('#se_tax_'+idLastVal).val(data.p_tax);
              $('#se_hsn_code_'+idLastVal).val(data.p_hsn_sac_code);
              $('#se_sell_price_'+idLastVal).val(250);
          }
       }
   });
};

var clickCount = 0;
var tabIndex = 17;
function addRow(new_Attribute) {
    clickCount++;
    tabIndex++;
    $('#'+new_Attribute.id).hide();
    var newRow = '<tr id="new-row-'+clickCount+'"> <td>'+parseInt(clickCount+1)+'</td><td> <select tabindex='+tabIndex+' style="width: 100%;" id="se_product_code_'+clickCount+'" class="se_product_code se_entry_'+clickCount+'" value="" onchange="setProductDetails(this)" name="se_product_code_'+clickCount+'"></select> </td><td> <input tabindex='+parseInt(tabIndex+2)+' type="text" name="se_product_name_'+clickCount+'" id="se_product_name_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex="'+parseInt(tabIndex+3)+'" type="text" name="se_hsn_code_'+clickCount+'" id="se_hsn_code_'+clickCount+'" value="" class="se_entry_'+clickCount+'"> </td><td> <input tabindex="'+parseInt(tabIndex+4)+'" type="text" name="se_quantity_'+clickCount+'" onkeyup="calculateAmount(this)" id="se_quantity_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex="'+parseInt(tabIndex+5)+'" type="text" name="se_sell_price_'+clickCount+'" id="se_sell_price_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+6)+' type="text" name="se_discount_'+clickCount+'" onkeyup="calculateAmount(this)" id="se_discount_'+clickCount+'" value="" class="se_entry_'+clickCount+'"> </td><td> <input tabindex='+parseInt(tabIndex+7)+' type="text" onkeyup="calculateAmount(this)" name="se_tax_cgst_'+clickCount+'" id="se_tax_cgst_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+8)+' type="text" name="se_tax_cgst_amt_'+clickCount+'" id="se_tax_cgst_amt_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+9)+' type="text" name="se_tax_sgst_'+clickCount+'" onkeyup="calculateAmount(this)" id="se_tax_sgst_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+10)+' type="text" name="se_tax_sgst_amt_'+clickCount+'" id="se_tax_sgst_amt_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td> <input tabindex='+parseInt(tabIndex+11)+' type="text" name="se_total_amt_'+clickCount+'" onkeyup="calculateTotalAmount(this)" id="se_total_amt_'+clickCount+'" class="se_entry_'+clickCount+'" value=""> </td><td class="action"> <span tabindex='+parseInt(tabIndex+12)+' id="add_more_'+clickCount+'" style="color: green;" onclick="addRow(this)"><i class="fa fa-plus" aria-hidden="true"></i></span> <span tabindex='+parseInt(tabIndex+13)+' style="color: red;" onclick="deleteRow(this)" "><i class="fa fa-times " aria-hidden="true "></i></span> </td></tr>';
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
    // var url = '/sales';
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
