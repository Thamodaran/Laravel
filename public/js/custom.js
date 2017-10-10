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
    
//    console.log($("#"+currPlanId).find("#monthlist-taluAmount"));
    $("#"+currPlanId).find("#monthlist-taluAmount").val(taluAmtAvg);
    
//    var toBePaid = 200;
    toBePaidCalculation($("#monthlist-taluAmount")[0]);
    console.log($("#monthlist-taluAmount")[0]);
//    console.log($("#"+currPlanId).find("#monthlist-taluAmount").val('500'));
//    $.each( $("#"+currPlanId).find("tr"), function( key, value ) {
//        console.log(value);
//    });
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