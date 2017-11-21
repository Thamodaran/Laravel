@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- <div class="col-sm-12"> -->
      <div class="panel panel-default">
          <div class="panel-heading">
              Import
          </div>

          <div class="panel-body">
            <form action="{{ url('import')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <table border="1" style="width: 100%;" class="customer-table">
                    <tr>
                      <th colspan="3">Users</th>
                      <td><input type="file" name="user_file" id="user_file" class="" value=""></td>
                    </tr>
                    <tr>
                      <th colspan="3">Products</th>
                      <td><input type="file" name="product_file" id="product_file" class="" value=""></td>
                    </tr>
                    <tr>
                      <th colspan="3">Sales</th>
                      <td><input type="file" name="sales_file" id="sales_file" class="" value=""></td>
                    </tr>
                    <tr>
                      <th colspan="3">Purchase</th>
                      <td><input type="file" name="purchase_file" id="purchase_file" class="" value=""></td>
                    </tr>
                </table>
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
    </div>
    <!-- </div> -->
@endsection
