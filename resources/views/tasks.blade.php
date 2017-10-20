@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <!-- <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div> -->

                <!-- <div class="panel-body"> -->
                    <!-- Display Validation Errors -->
                    <!-- @include('common.errors') -->

                    <!-- New Task Form -->
                    <!-- <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }} -->

                        <!-- Task Name -->
                        <!-- <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div> -->

                        <!-- Add Task Button -->
                         <!-- <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
            <form action="{{ url('planuser')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
            <div class="form-group col-sm-6">
              <label for="usr">Name:</label>
              <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
            </div>
            <div class="form-group col-sm-6">
              <label for="pwd">Mobile:</label>
              <input type="text" name="mobile" id="task-name" class="form-control" value="{{ old('task') }}">
            </div>
            <div class="form-group col-sm-6">
              <label for="pwd">Phone:</label>
              <input type="text" name="phone" id="task-name" class="form-control" value="{{ old('task') }}">
            </div>
            <div class="form-group col-sm-6">
            <!--<h1>{{$planDetail[0]->id}}</h1>-->
              <label for="pwd">Plan type:</label>
              <select name="plantype" class="form-control">
                <option value="0">Select a Plan</option>
                @foreach ($planDetail as $plan)
                <option value="{{$plan->id}}">{{$plan->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-sm-6">
              <label for="pwd">Address:</label>
              <textarea class="form-control" name="address" rows="5" id="address"></textarea>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-12">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add User
                    </button>
                </div>
            </div>
          </form>
        </div>
      </div>
            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>Mobile Number</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Plan</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <td class="table-text"><div>{{ $task->mobile_number }}</div></td>
                                        <td class="table-text"><div>{{ $task->ph_number }}</div></td>
                                        <td class="table-text"><div>{{ $task->address }}</div></td>
                                        <td class="table-text"><div>{{ $task->plan_id }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('planuser/'.$task->id) }}" method="POST">
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
