@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <form action="{{ url('plandetail')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
            <div class="form-group col-sm-6">
              <label for="usr">Name:</label>
              <input type="text" name="name" id="plandetail-name" class="form-control" value="{{ old('task') }}">
            </div>
            <div class="form-group col-sm-6">
              <label for="pwd">Amount:</label>
              <input type="text" name="amount" id="plandetail-amount" class="form-control" value="{{ old('task') }}">
            </div>
            <div class="form-group col-sm-6">
              <label for="pwd">Number of months:</label>
              <input type="text" name="numberofmonths" id="plandetail-numberofmonths" class="form-control" value="{{ old('task') }}">
            </div>
            <div class="form-group col-sm-6">
              <label for="pwd">Number of users:</label>
              <input type="text" name="numberofusers" id="plandetail-numberofusers" class="form-control" value="{{ old('task') }}">
            </div>
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-12">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Task
                    </button>
                </div>
            </div>
          </form>
            <!-- Current Tasks -->
            @if (count($plandetail) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Number of months</th>
                                <th>Number of users</th>
                            </thead>
                            <tbody>
                                @foreach ($plandetail as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <td class="table-text"><div>{{ $task->amount }}</div></td>
                                        <td class="table-text"><div>{{ $task->no_of_months }}</div></td>
                                        <td class="table-text"><div>{{ $task->no_of_users }}</div></td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('plandetail/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
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
