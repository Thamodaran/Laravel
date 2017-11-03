@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="col-sm-12"> -->
      <div class="panel panel-default">
          <div class="panel-heading">
              Sales Entry
          </div>

          <div class="panel-body">
            <form action="{{ url('sales')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

            <div class="col-sm-6">
              <label for="pwd">Product Code:</label>
              <input type="text" name="se_product_code" id="se_product_code" class="form-control" value="">
              <input type="hidden" name="se_product_id" id="se_product_id" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Product Name:</label>
              <input type="text" name="se_product_name" id="se_product_name" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Customer Name:</label>
              <input type="text" name="se_customer_user" id="se_customer_user" class="form-control" value="">
              <input type="hidden" name="se_user_id" id="se_user_id" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Sale Price:</label>
              <input type="text" name="se_sell_price" id="se_sell_price" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Quantity:</label>
              <input type="text" name="se_quantity" id="se_quantity" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Total Amount:</label>
              <input type="text" name="se_total_amt" id="se_total_amt" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Amount Given:</label>
              <input type="text" name="se_amt_given" id="se_amt_given" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Balance:</label>
              <input type="text" name="se_balance" id="se_balance" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Customer Discount:</label>
              <input type="text" name="se_user_discount" id="se_user_discount" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Tax (%):</label>
              <input type="text" name="se_tax" id="se_tax" class="form-control" value="">
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
