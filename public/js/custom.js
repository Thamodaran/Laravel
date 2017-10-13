function toBePaidCalculation(thisobj) {
//    console.log(thisobj);
    var toBePaid = parseInt(thisobj.parentElement.parentElement.previousElementSibling.children[0].children[0].value) - parseInt(thisobj.value);
    thisobj.parentElement.parentElement.nextElementSibling.children[0].children[0].value = toBePaid;
}

function totalTalluAmountCalculation(totalTalluAmt) {

//    console.log(totalTalluAmt.value);
//    console.log(totalTalluAmt.nextElementSibling.nextElementSibling.value);
    var taluAmtAvg = parseInt(totalTalluAmt.value) /parseInt(totalTalluAmt.nextElementSibling.nextElementSibling.value);
    var currPlanId = totalTalluAmt.parentElement.parentElement.parentElement.nextElementSibling.children[0].children[1].getAttribute("id");
    // $("#"+currPlanId).find("#monthlist-taluAmount_"+currPlanId.split("_")[1]).val(taluAmtAvg);
    // console.log($("#"+currPlanId).find(".monthlist"));

//    var toBePaid = 200;
// console.log($("#monthlist-taluAmount")[0]);
    // toBePaidCalculation($("#monthlist-taluAmount")[0]);

//    console.log($("#"+currPlanId).find("#monthlist-taluAmount").val('500'));
$("#"+currPlanId).find(".monthlist").each(function(key){
    // $('#'+$(this)[0].getAttribute('id')).val(taluAmtAvg);
    // console.log($(this)[0].getAttribute('id'));
    // console.log(currPlanId);
    console.log($(this)[0].getAttribute('id'));
    console.log('monthlist-taluAmount_'+currPlanId.split("_")[1]+'_'+key);
    // if ($('[id^=monthlist-taluAmount_]')) {

    if ($(this)[0].getAttribute('id') == 'monthlist-taluAmount_'+currPlanId.split("_")[1]+'_'+key) {
        $('#'+$(this)[0].getAttribute('id')).val(taluAmtAvg);
        // console.log($('#'+$(this)[0].getAttribute('id'))[0]);
        toBePaidCalculation($('#'+$(this)[0].getAttribute('id'))[0]);
    }

    // console.log('planType_'+selected.attr("value"));
    // if($(this)[0].getAttribute('id') !== 'filter') {
    //   if(selected.attr("value") != 0) {
    //     if('planType_'+selected.attr("value")==$(this)[0].getAttribute('id')){
    //         $("#"+$(this)[0].getAttribute('id')).show();
    //     } else {
    //         $("#"+$(this)[0].getAttribute('id')).hide();
    //     }
    //   } else {
    //     $("#"+$(this)[0].getAttribute('id')).show();
    //   }
    // }
});
//    console.log(currPlanId);

}

//$(document).ready(function(){
//    var no_of_plan = $(".panel-default").find("#planType_");
//    console.log(no_of_plan.prevObject);

//    $.each( no_of_plan.prevObject, function( key, value ) {
//        console.log($("#total_tallu_amt_"+key).val());
//        console.log($("#no_of_months_"+key).val());
////        console.log( value.children[1].children[0].children[1].children);
//        $.each( value.children[1].children[0].children[1].children, function( key1, value1 ) {
//
//            if(value1.children.length > 0){
////                console.log(value1.children);
//                $.each( value1.children, function( key2, value2 ) {
//                    console.log(value2);
//                });
//            }
//        });
////        console.log( value.children[1].find("tr"));
//    });
//
////    console.log(no_of_plan.prevObject);
//});
