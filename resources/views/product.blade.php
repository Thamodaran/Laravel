@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="col-sm-12"> -->
      <div class="panel panel-default">
          <div class="panel-heading">
              Product Entry
          </div>

          <div class="panel-body">
            <form action="{{ url('product')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

            <div class="col-sm-6">
              <label for="pwd">Product Name:</label>
              <input type="text" name="p_product_name" id="p_product_name" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="usr">Product Code:</label>
              <input type="text" name="p_product_code" id="p_product_code" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Model:</label>
              <input type="text" name="p_product_model" id="p_product_model" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Tax:</label>
              <input type="text" name="p_tax" id="p_tax" class="form-control" value="">
            </div>
            <!-- <div class="col-sm-6">
              <label for="pwd">Image:</label>
              <input type="file" name="p_file" id="p_file" class="form-control" value="">
            </div> -->
            <div class="col-sm-6">
              <label for="pwd">Comments:</label>
              <textarea class="form-control" name="p_comments" rows="5" id="p_comments"></textarea>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Product
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
