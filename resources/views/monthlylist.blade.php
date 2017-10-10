@extends('layouts.app')

@section('content')

<div class="container">
    <!-- <div class="panel panel-default">
        <div class="panel-heading">
            Details
        </div>

        <div class="panel-body">
          <table class="table table-striped task-table">
            <tbody>
              <tr>
                <th>Seet type : </th> <td>1 Lack</td>
                <th>Total talu amount : </th> <td>15000</td>
                <th>Seet taken by : </th> <td>Kumar</td>
              </tr>
              <tr>
                <th>Month number : </th> <td>Jan -- 1</td>
                <th>To be pay : </th> <td>205000</td>
                <th>No of users : </th> <td>20</td>
              </tr>
            </tbody>
          </table>
    </div>
  </div> --> 
   <div class="col-sm-12">
        @foreach ($plandetail as $key => $plan)
        <div class="panel panel-default" id="planType_{{$key}}">
            <div class="panel-heading">
                <span style="display: inline-block;margin-right: 2%;"><b>Plan Name :</b> {{$plan->name}}</span>
                <span style="display: inline-block;margin-right: 2%;"><b>Total Amount :</b> {{$plan->amount}}</span>
                <span style="display: inline-block;margin-right: 2%;"><b>Avg Amount :</b> {{$amount = $plan->amount/$plan->no_of_months}}</span>
                <span style="display: inline-block;margin-right: 2%;"><b>No Of Months :</b> {{$plan->no_of_months}}</span>
                <span style="display: inline-block;margin-right: 2%;"><b>No Of Users :</b> {{$plan->no_of_users}}</span>
                <span style="display: inline-block; width: 150px;"><b>Total Tallu Amount :</b> </span>
                <span style="display: inline-block; width: 8%;">
                    <form action="{{ url('monthamount')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="text" name="total_tallu_amt" onkeyup="totalTalluAmountCalculation(this)" id="total_tallu_amt_{{$key}}" class="form-control" value="">
                        <input type="hidden" name="plan_id" id="plan_id" class="form-control" value="{{$plan->id}}">
                        <input type="hidden" name="no_of_months" id="no_of_months_{{$key}}" class="form-control" value="{{$plan->no_of_months}}">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>
                        </button>
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
                    <tbody class="plan-type-tbody" id="plan-type-tbody_{{$key}}">
                        @foreach ($planUserList as $planUser)
                            @if ($plan->name == $planUser->planname)
                                <form action="{{ url('monthlylist')}}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td class="col-sm-2">{{$planUser->planusername}}
                                            <input type="hidden" name="userId" id="monthlist-amount" class="form-control" value="{{$planUser->planusers_id}}">
                                        </td>
                                        <td>{{$planUser->planname}}</td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">Amount:</label> -->
                                                <input type="text" name="amount" readonly id="monthlist-amount" class="form-control" value="{{$amount}}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">Talu amount:</label> -->
                                                <input type="text" onchange="toBePaidCalculation(this)" name="talu_amount" id="monthlist-taluAmount" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">To be paid:</label> -->
                                                <input type="text" name="to_be_paid" readonly id="monthlist-toBePaid" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">Amount recived:</label> -->
                                                <input type="text" name="amount_recived" id="monthlist-amountRecived" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">Balance:</label> -->
                                                <input type="text" name="balance" disabled="disabled" id="monthlist-balance" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">Balance:</label> -->
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
