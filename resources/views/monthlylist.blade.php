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
            <table class="table table-striped task-table">
                <thead>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Talu amount</th>
                    <th>To be paid</th>
                    <th>Amount recived</th>
                    <th>Balance</th>
                    <th>Seet taken by</th>
                    <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($planUserList as $planUser)
                  <form action="{{ url('monthlylist')}}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                  <tr>
                    <td class="col-sm-2">{{$planUser->name}}
                        <input type="hidden" name="userId" id="monthlist-amount" class="form-control" value="{{$planUser->id}}">
                    </td>
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
              @endforeach
            </tbody>
          </table>

            <!-- Current Tasks -->
            @if (count($monthlylist) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Talu amount</th>
                                <th>To be paid</th>
                                <th>Amount recived</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($monthlylist as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <td class="table-text"><div>{{ $task->amount }}</div></td>
                                        <td class="table-text"><div>{{ $task->talu_amount }}</div></td>
                                        <td class="table-text"><div>{{ $task->to_be_paid }}</div></td>
                                        <td class="table-text"><div>{{ $task->amount_recived }}</div></td>
                                        <td class="table-text"><div>{{ $task->balance }}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('monthlylist/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
