$(document).ready(function(){
    $("[name=total_tallu_amt]").each(function (key) {
        if($('#'+($(this)[0].getAttribute('id'))).val() !== '') {
           totalTalluAmountCalculation($('#'+($(this)[0].getAttribute('id')))[0])
        }
    });
});

function totalTalluAmountCalculation(totalTalluAmt) {
    var taluAmtAvg = parseInt(totalTalluAmt.value) / parseInt(totalTalluAmt.nextElementSibling.nextElementSibling.value);
    var currPlanId = totalTalluAmt.parentElement.parentElement.parentElement.nextElementSibling.children[0].children[1].getAttribute("id");
    $("#" + currPlanId).find(".monthlist").each(function (key) {
        if ($(this)[0].getAttribute('id') == 'monthlist-taluAmount_' + currPlanId.split("_")[1] + '_' + key) {
            $('#' + $(this)[0].getAttribute('id')).val(taluAmtAvg);
            toBePaidCalculation($('#' + $(this)[0].getAttribute('id'))[0]);
        }
    });
}

function toBePaidCalculation(thisobj) {
    var toBePaid = parseInt(thisobj.parentElement.parentElement.previousElementSibling.children[0].children[0].value) - parseInt(thisobj.value);
    thisobj.parentElement.parentElement.nextElementSibling.children[0].children[0].value = toBePaid;
}
