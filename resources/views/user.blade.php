@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="col-sm-12"> -->
      <div class="panel panel-default">
          <div class="panel-heading panelHeadingCustom">
              User Entry
          </div>

          <div class="panel-body">
            <form action="{{ url('user')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

            <div class="col-sm-6">
              <label for="pwd">Name:</label>
              <input type="text" name="u_name" id="u_name" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Mobile Number:</label>
              <input type="text" name="u_mob_number" id="u_mob_number" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Ph Number:</label>
              <input type="text" name="u_ph_number" id="u_ph_number" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">E-mail:</label>
              <input type="text" name="u_e_mail" id="u_e_mail" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">User Type:</label>
              <select name="u_type" class="form-control">
                <option value="0">Select User Type</option>
                <option value="1">Customer</option>
                <option value="2">Dealer</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="pwd">Discount:</label>
              <input type="text" name="u_discount" id="u_discount" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="usr">Address:</label>
              <textarea class="form-control" name="u_address" rows="3" id="u_address"></textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add User
                    </button>
                </div>
            </div>
          </form>
        </div>
      </div>
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
                          <tr>
                              <td class="table-text"><div>name</div></td>
                              <td class="table-text"><div>mobile number</div></td>
                              <td class="table-text"><div>ph number</div></td>
                              <td class="table-text"><div>address</div></td>
                              <td class="table-text"><div>plan</div></td>

                              <!-- Task Delete Button -->
                              <td>
                                  <form action="{{ url('planuser/') }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}

                                      <button type="submit" class="btn btn-danger">
                                          <i class="fa fa-btn fa-trash"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
    <!-- </div> -->
@endsection
