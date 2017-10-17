@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12" id="monthlylist">
       <div class="panel panel-default" id="filter">
            <div class="panel-heading">
                <select name="plantype" class="form-control">
                    <option value="0">Select a Plan</option>
                    @foreach ($plandetail as $plan)
                    <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                </select>
            </div>
       </div>

        <script>
            $(document).ready(function(){
                var plantypes = $("#monthlylist .panel").find("#planType_");
                // console.log(plantypes.prevObject);
                $("select").change(function(){
                    $( "select option:selected").each(function(){
                        var selected = $(this);
                        $(plantypes.prevObject).each(function(){
                            // console.log($(this)[0].getAttribute('id'));
                            // console.log('planType_'+selected.attr("value"));
                            if($(this)[0].getAttribute('id') !== 'filter') {
                              if(selected.attr("value") != 0) {
                                if('planType_'+selected.attr("value")==$(this)[0].getAttribute('id')){
                                    $("#"+$(this)[0].getAttribute('id')).show();
                                } else {
                                    $("#"+$(this)[0].getAttribute('id')).hide();
                                }
                              } else {
                                $("#"+$(this)[0].getAttribute('id')).show();
                              }
                            }
                        });

                    });
                })//.change();
            });
        </script>
        @foreach ($plandetail as $key => $plan)
        <div class="panel panel-default" id="planType_{{$plan->id}}">
            <div class="panel-heading">
                <span style="display: inline-block;margin-right: 1%;"><b>Plan Name :</b> {{$plan->name}}</span>
                <span style="display: inline-block;margin-right: 1%;"><b>Total Amount :</b> {{$plan->amount}}</span>
                <span style="display: inline-block;margin-right: 1%;"><b>Avg Amount :</b> {{$amount = $plan->amount/$plan->no_of_months}}</span>
                <span style="display: inline-block;margin-right: 1%;"><b>No Of Months :</b> {{$plan->no_of_months}}</span>
                <span style="display: inline-block;margin-right: 1%;"><b>No Of Users :</b> {{$plan->no_of_users}}</span>
                <span style="display: inline-block; width: 150px;"><b>Total Tallu Amount :</b> </span>
                <span style="display: inline-block; width: 10%;">
                    <form action="{{ url('monthamount')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}                        
                        <input type="text" name="total_tallu_amt" onchange="this.form.submit()" onkeyup="totalTalluAmountCalculation(this)" 
                               id="total_tallu_amt_{{$plan->id}}" class="form-control" value="{{$plan->monthlyamount_tot_tallu_amt}}">
                        <input type="hidden" name="plan_id" id="plan_id" class="form-control" value="{{$plan->id}}">
                        <input type="hidden" name="no_of_months" id="plan->no_of_months" class="form-control" value="{{$plan->no_of_months}}">
                        <input type="hidden" name="monthlyamount_id" id="monthlyamount_id" class="form-control" value="{{$plan->monthlyamount_id}}">
                    </form>
                </span>
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!--<thead>-->
                    <tr>
                        <th>Name</th>
                        <th>Plan name</th>
                        <th>Amount</th>
                        <th>Talu amount</th>
                        <th>To be paid</th>
                        <th>Amount recived</th>
                        <th>Balance</th>
                        <th>Seet taken by</th>
                        <th>Action</th>
                    </tr>
                    <!--</thead>-->
                    <tbody class="plan-type-tbody" id="plan-type-tbody_{{$plan->id}}">
                      <input type="hidden" value = {{$usercount = 0}}>
                        @foreach ($planUserList as $userkey => $planUser)

                            @if ($plan->name == $planUser->planname)


                                <form action="{{ url('monthlylist')}}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td class="col-sm-2">{{$planUser->planusername}}
                                            <input type="hidden" name="userId" id="monthlist-amount" class="form-control" value="{{$planUser->planusers_id}}">
                                            <input type="hidden" name="planId" id="monthlist-amount" class="form-control" value="{{$plan->id}}">
                                        </td>
                                        <td>{{$planUser->planname}}</td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="amount" readonly id="monthlist-amount" class="form-control" value="{{$amount}}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="talu_amount" readonly id="monthlist-taluAmount_{{$plan->id}}_{{$usercount}}" class="form-control monthlist" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="to_be_paid" readonly id="monthlist-toBePaid_{{$plan->id}}_{{$usercount}}" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="amount_recived" id="monthlist-amountRecived" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="balance" readonly id="monthlist-balance" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <input type="checkbox" name="seet_taken_by" id="monthlist-balance" class="">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fa fa-btn fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                                <input type="hidden" value = {{ ++$usercount }}>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
