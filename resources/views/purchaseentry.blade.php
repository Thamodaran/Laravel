@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="col-sm-12"> -->
      <div class="panel panel-default">
          <div class="panel-heading panelHeadingCustom">
              Purchase Entry
          </div>

          <div class="panel-body">
            <form action="{{ url('purchase')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

            <div class="col-sm-6">
              <label for="pwd">Product Code:</label>
              <input type="text" name="pe_product_code" id="pe_product_code" class="form-control" value="">
              <input type="hidden" name="pe_product_id" id="pe_product_id" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Product Name:</label>
              <input type="text" name="pe_product_name" id="pe_product_name" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Dealer:</label>
              <select name="pe_dealer" class="form-control">
                <option value="0">Select a Dealer</option>
                <option value=""></option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="pwd">Buy Price:</label>
              <input type="text" name="pe_buy_price" id="pe_buy_price" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Sale Price:</label>
              <input type="text" name="pe_sell_price" id="pe_sell_price" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Quantity:</label>
              <input type="text" name="pe_quantity" id="pe_quantity" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Tax (%):</label>
              <input type="text" name="pe_tax" id="pe_tax" class="form-control" value="">
            </div>
            <div class="col-sm-6">
              <label for="pwd">Comments:</label>
              <textarea class="form-control" name="pe_comments" rows="5" id="pe_comments"></textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Purchase
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
