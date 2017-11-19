@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: rgba(0, 139, 139, 0.9); color: white; font-weight: bold; font-size: 20px;">
            Sales Entry
        </div>

        <div class="panel-body">
            <form action="{{ url('sales')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <table border="1" style="width: 100%;" class="customer-table">
                    <tr><th colspan="3">Customer Details</th></tr>
                    <tr>
                        <th>Customer Name:</th>
                        <th>Customer Discount:</th>
                        <th>Address:</th>
                    </tr>
                    <tr>
                       <td>
                            <select style="width: 100%;" id="se_customer_user" class="se_customer_user" value="" name="se_customer_user"></select>
                        </td>
                        <td><input type="text" name="se_user_discount" id="se_user_discount" class="" value=""></td>                        
                        <td><input type="textarea" name="se_user_discount" id="se_user_discount" class="" value=""></td>                        
                    </tr>                    
                </table>
                <div style="height: 35px;width: 100%;"></div>
                <table id="detail-table" border="1"  style="width: 100%; border-bottom: 0px;" class="customer-table">
                    <tr><th colspan="13">Product Entry</th></tr>
                    <tr>
                        <th class="width-5-per">S No</th>
                        <th class="width-10-per">Product Code</th>
                        <th class="width-20-per">Product Name</th>
                        <th class="width-5-per">HSN/SAC Code</th>
                        <th class="width-5-per">Quantity</th>                        
                        <th class="width-10-per">Sale Price</th>
                        <th class="width-10-per">Discount(%)</th>                        
                        <th class="width-5-per">CGST (%)</th>
                        <th class="width-5-per">CGST Amt</th>
                        <th class="width-5-per">SGST (%)</th>
                        <th class="width-5-per">SGST Amt</th>                        
                        <th class="width-10-per">Amount</th>
                        <th class="width-5-per">Action</th>
                    </tr>
                    <tr id="new-row-3">
                        <td>1</td>
                        <td><select style="width: 100%;" id="se_product_code" class="se_product_code" value="" onchange="setProductDetails()" name="se_product_code"></select></td>
                        <td><input type="text" name="se_product_name" id="se_product_name" class="" value=""></td>
                        <td><input type="text" value="" class=""></td>
                        <td><input type="text" name="se_quantity" id="se_quantity" class="" value=""></td>
                        <td><input type="text" name="se_sell_price" id="se_sell_price" class="" value=""></td>
                        <td><input type="text" value="" class=""></td>
                        <td><input type="text" name="se_tax_cgst" id="se_tax" class="" value=""></td>
                        <td><input type="text" name="se_tax_cgst_amt" id="se_tax" class="" value=""></td>
                        <td><input type="text" name="se_tax_sgst" id="se_tax" class="" value=""></td>
                        <td><input type="text" name="se_tax_sgst_amt" id="se_tax" class="" value=""></td>                        
                        <td><input type="text" name="se_total_amt" id="se_total_amt" class="" value=""></td>
                        <td class="action">
                            <span id="add_more_3" style="color: green;" onclick="addRow(this)"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <span id="123" style="color: red;" onclick="deleteRow(this)"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </td>
                    </tr>
                    </table>
                    <table  border="1"  style="width: 100%; border-top: 0px;" class="customer-table">
                    <tr>
                        <td class="width-5-per">&nbsp;</td>
                        <td class="width-10-per">&nbsp;</td>
                        <td class="width-20-per">&nbsp;</td>
                        <td class="width-5-per">&nbsp;</td>
                        <td class="width-5-per">&nbsp;</td>
                        <td class="width-10-per">&nbsp;</td>
                        <td class="width-10-per">&nbsp;</td>
                        <td class="width-5-per">&nbsp;</td>
                        <td class="width-5-per">&nbsp;</td>
                        <td class="width-5-per">&nbsp;</td>
                        <th class="width-5-per" style="text-align: right;">Total</th>
                        <td class="width-10-per">15222</td>
                        <td class="width-5-per"></td>

                    </tr>
                    <tr>
                        <th colspan="11" style="text-align: right;">Total Tax (%)</th>
                        <td>20</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th colspan="11" style="text-align: right;">Amount Given</th>
                        <td><input type="text" name="se_amt_given" id="se_amt_given" class="" value=""></td>
                        <td></td>
                    </tr>
                    <tr><td colspan="13">&nbsp;</td></tr>
                    <tr>
                        <th colspan="11" style="text-align: right;">Balance</th>
                        <td>15222</td>
                        <td></td>
                    </tr>
                </table>
                <div style="height: 35px;width: 100%;"></div>
                <table>

                </table>
<!--                <div class="form-group row">
                    <label for="pwd" class="col-sm-2 col-form-label">Product Code:</label>
                    <div class="col-sm-4">
                        <select id="se_product_code" class="se_product_code form-control" value="" onchange="setProductDetails()" name="se_product_code"></select>
                    </div>
                    <label for="pwd" class="col-sm-2 col-form-label">Product Name:</label>
                    <div class="col-sm-4">
                        <input type="text" name="se_product_name" id="se_product_name" class="form-control" value="">
                    </div>
                </div>-->
                <script type="text/javascript">
                    console.log();
                    var src = "/searchajax";
                    var name = $("#se_product_code").val();
                    $('#se_product_code').select2({
                        placeholder: 'Select an item',
                        ajax: {
                            url: src,
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    });
                </script>
<!--                <div class="form-group row">
                    <label for="pwd" class="col-sm-2 col-form-label">Customer Name:</label>
                    <div class="col-sm-4">
                        <select id="se_customer_user" class="se_customer_user form-control" value="" name="se_customer_user"></select>
                    </div>
                    <label for="pwd" class="col-sm-2 col-form-label">Sale Price:</label>
                    <div class="col-sm-4">
                        <input type="text" name="se_sell_price" id="se_sell_price" class="form-control" value="">
                    </div>
                </div>-->
                <script type="text/javascript">
                    var src = "/searchcustomer";
                    var name = $("#se_customer_user").val();
                    $('#se_customer_user').select2({
                        placeholder: 'Select an item',
                        ajax: {
                            url: src,
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    });
                </script>
<!--                <div class="form-group row">
                    <label for="pwd" class="col-sm-2 col-form-label">Amount Given:</label>
                    <div class="col-sm-4">
                        <input type="text" name="se_amt_given" id="se_amt_given" class="form-control" value="">
                    </div>
                    <label for="pwd" class="col-sm-2 col-form-label">Balance:</label>
                    <div class="col-sm-4">
                        <input type="text" name="se_balance" id="se_balance" class="form-control" value="">
                    </div>
                </div>-->
<!--                <div class="form-group row">

                    <label for="pwd" class="col-sm-2 col-form-label">Tax (%):</label>
                    <div class="col-sm-4">
                        <input type="text" name="se_tax" id="se_tax" class="form-control" value="">
                    </div>
                </div>-->
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
@endsection
