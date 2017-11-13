@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="col-sm-12"> -->
            <table class="table table-condensed table-striped table-hover">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Zip Code</th>
                    <th>County</th>
                </thead>
                <tbody>
                <tr>
                    <td> $resource->Name</td>
                    <td> $resource->Description</td>
                    <td> $location->Address</td>
                    <td> $location->City</td>
                    <td> $location->Zip_Code</td>
                    <td> location->County</td>
                </tr>
                </tbody>
            </table>
      <div class="panel panel-default">
          <div class="panel-heading">
              Sales Entry
          </div>

          <div class="panel-body">
            <form action="{{ url('sales')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

            <div class="form-group row">
              <label for="pwd" class="col-sm-2 col-form-label">Product Code:</label>
              <div class="col-sm-4">
                <input type="text" name="se_product_code" id="se_product_code" class="form-control" value="">
                <input type="hidden" name="se_product_id" id="se_product_id" class="form-control" value="">
              </div>
              <label for="pwd" class="col-sm-2 col-form-label">Product Name:</label>
              <div class="col-sm-4">
                <input type="text" name="se_product_name" id="se_product_name" class="form-control" value="">
              </div>
            </div>
            <!-- <div class="form-group row">
              <label for="pwd" class="col-sm-2 col-form-label">Product Name:</label>
              <div class="col-sm-4">
                <input type="text" name="se_product_name" id="se_product_name" class="form-control" value="">
              </div>
            </div> -->
            <div class="form-group row">
              <label for="pwd" class="col-sm-2 col-form-label">Customer Name:</label>
              <div class="col-sm-4">
                <input type="text" name="se_customer_user" id="se_customer_user" class="form-control" value="">
                <input type="hidden" name="se_user_id" id="se_user_id" class="form-control" value="">
              </div>
              <label for="pwd" class="col-sm-2 col-form-label">Sale Price:</label>
              <div class="col-sm-4">
                <input type="text" name="se_sell_price" id="se_sell_price" class="form-control" value="">
              </div>
            </div>
            <!-- <div class="col-sm-6">
              <label for="pwd">Sale Price:</label>
              <input type="text" name="se_sell_price" id="se_sell_price" class="form-control" value="">
            </div> -->
            <div class="form-group row">
              <label for="pwd" class="col-sm-2 col-form-label">Quantity:</label>
              <div class="col-sm-4">
                <input type="text" name="se_quantity" id="se_quantity" class="form-control" value="">
              </div>
              <label for="pwd" class="col-sm-2 col-form-label">Total Amount:</label>
              <div class="col-sm-4">
                <input type="text" name="se_total_amt" id="se_total_amt" class="form-control" value="">
              </div>
            </div>
            <!-- <div class="col-sm-6">
              <label for="pwd">Total Amount:</label>
              <input type="text" name="se_total_amt" id="se_total_amt" class="form-control" value="">
            </div> -->
            <div class="form-group row">
              <label for="pwd" class="col-sm-2 col-form-label">Amount Given:</label>
              <div class="col-sm-4">
                <input type="text" name="se_amt_given" id="se_amt_given" class="form-control" value="">
              </div>
              <label for="pwd" class="col-sm-2 col-form-label">Balance:</label>
              <div class="col-sm-4">
                <input type="text" name="se_balance" id="se_balance" class="form-control" value="">
              </div>
            </div>
            <!-- <div class="col-sm-6">
              <label for="pwd">Balance:</label>
              <input type="text" name="se_balance" id="se_balance" class="form-control" value="">
            </div> -->
            <div class="form-group row">
              <label for="pwd" class="col-sm-2 col-form-label">Customer Discount:</label>
              <div class="col-sm-4">
                <input type="text" name="se_user_discount" id="se_user_discount" class="form-control" value="">
              </div>
              <label for="pwd" class="col-sm-2 col-form-label">Tax (%):</label>
              <div class="col-sm-4">
                <input type="text" name="se_tax" id="se_tax" class="form-control" value="">
              </div>
            </div>
            <!-- <div class="col-sm-6">
              <label for="pwd">Tax (%):</label>
              <input type="text" name="se_tax" id="se_tax" class="form-control" value="">
            </div> -->
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Sales
                    </button>
                </div>
            </div>
          </form>
        </div>
      </div>
      <div class="panel panel-default">
          <div class="panel-heading">
              Current Tasks
              {{$salesEntryDetails}}
          </div>
          @if (count($salesEntryDetails) > 0)
          <div class="panel-body">
              <table class="table table-striped task-table">
                  <thead>
                      <th>Product Code</th>
                      <th>Mobile Number</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th>Plan</th>
                      <th>Action</th>
                  </thead>
                  <tbody>

                    @foreach ($salesEntryDetails as $salesEntry)
                          <tr>
                              <td class="table-text"><div>{{$salesEntry->se_product_id}}</div></td>
                              <td class="table-text"><div>{{$salesEntry->se_user_id}}</div></td>
                              <td class="table-text"><div>{{$salesEntry->se_quantity}}</div></td>
                              <td class="table-text"><div>{{$salesEntry->se_total_amt}}</div></td>
                              <td class="table-text"><div>{{$salesEntry->se_amt_given}}</div></td>

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
                      @endforeach

                  </tbody>
              </table>
          </div>
          @endif
      </div>
    </div>
    <!-- </div> -->
@endsection
