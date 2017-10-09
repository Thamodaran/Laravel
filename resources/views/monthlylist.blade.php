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
        <!-- <form action="{{ url('monthlylist')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }} -->
        <!-- <div class="form-group col-sm-6">
          <label for="usr">Name:</label>
          <input type="text" name="name" id="monthlist-name" class="form-control" value="{{ old('task') }}">
        </div> -->
        <!-- <div class="form-group col-sm-6">
          <label for="pwd">User:</label>
          <select name="category" class="form-control">
            <option value="0">Select a Category</option>
            @foreach ($planUserList as $planUser)
            <option value="{{$planUser->id}}">{{$planUser->name}}</option>
            @endforeach
          </select>
        </div> -->
        <!--            @foreach ($planUserList as $planUser)
                        @if($planUser->id == 1)
                        <h1>Test</h1>
                        @endif
                    @endforeach-->
        @foreach ($plandetail as $plan)
        <div class="panel panel-default">
            <div class="panel-heading">
                <span style="display: inline-block;margin-right: 2%;"><b>Plan Name :</b> {{$plan->name}}</span>
                <span style="display: inline-block;margin-right: 2%;"><b>Amount :</b> {{$plan->amount}}</span>
                <span style="display: inline-block;margin-right: 2%;"><b>No Of Months :</b> {{$plan->no_of_months}}</span>
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
                    <tbody>
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
                                                <input type="text" name="amount" id="monthlist-amount" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">Talu amount:</label> -->
                                                <input type="text" name="talu_amount" id="monthlist-taluAmount" class="form-control" value="{{ old('task') }}">
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="form-group">
                                                <!-- <label for="pwd">To be paid:</label> -->
                                                <input type="text" name="to_be_paid" id="monthlist-toBePaid" class="form-control" value="{{ old('task') }}">
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
                                                <input type="text" name="balance" id="monthlist-balance" class="form-control" value="{{ old('task') }}">
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
