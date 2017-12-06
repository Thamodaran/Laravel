@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading panelHeadingCustom" style="">
            Sales Entry
        </div>

        <div class="panel-body">
             <form action="{{ url('sales')}}" method="POST" class="form-horizontal">
            <!--<form action="" method="" class="form-horizontal">-->
                {{csrf_field()}}
                <table border="1" style="width: 100%;" class="customer-table">
                    <tr><th colspan="3">Customer Details</th></tr>
                    <tr>
                        <th>Customer Name:</th>
                        <th>Customer Discount:</th>
                        <th>Address:</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" id="token" value="{{csrf_token()}}">
                            <select tabindex="1" style="width: 100%;" id="se_customer_user" class="se_customer_user" onchange="setUserDetails(this)" value="" name="se_customer_user"></select>
                        </td>
                        <td><input tabindex="2" type="text" name="se_user_discount" id="se_user_discount" class="" value=""></td>
                        <td><input tabindex="3" type="textarea" name="se_user_address" id="se_user_address" class="" value=""></td>
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
                    <tr id="new-row-0" class="newRow_0">
                        <td>1</td>
                        <td><select tabindex="4" style="width: 100%;" id="se_product_code_0" class="se_entry_0" value="" onchange="setProductDetails(this)" name="se_product_code_0"></select></td>
                        <td><input tabindex="5" type="text" name="se_product_name_0" id="se_product_name_0" class="se_entry_0" value=""></td>
                        <td><input tabindex="6" type="text" name="se_hsn_code_0" id="se_hsn_code_0" value="" class="se_entry_0"></td>
                        <td><input tabindex="7" type="text" name="se_quantity_0" onkeyup="calculateAmount(this)" id="se_quantity_0" class="se_entry_0" value=""></td>
                        <td><input tabindex="8" type="text" name="se_sell_price_0" id="se_sell_price_0" class="se_entry_0" value=""></td>
                        <td><input tabindex="9" type="text" name="se_discount_0" onkeyup="calculateAmount(this)" id="se_discount_0" value="" class="se_entry_0"></td>
                        <td><input tabindex="10" type="text" name="se_tax_cgst_0" onkeyup="calculateAmount(this)" id="se_tax_cgst_0" class="se_entry_0" value=""></td>
                        <td><input tabindex="11" type="text" name="se_tax_cgst_amt_0" id="se_tax_cgst_amt_0" class="se_entry_0" value=""></td>
                        <td><input tabindex="12" type="text" name="se_tax_sgst_0" onkeyup="calculateAmount(this)" id="se_tax_sgst_0" class="se_entry_0" value=""></td>
                        <td><input tabindex="13" type="text" name="se_tax_sgst_amt_0" id="se_tax_sgst_amt_0" class="se_entry_0" value=""></td>
                        <td><input tabindex="14" type="text" name="se_total_amt_0" id="se_total_amt_0" class="se_entry_0" value=""></td>
                        <td class="action">
                            <span  tabindex="15" id="add_more_3" style="color: green;display:none;" onclick="addRow(this)"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <span  tabindex="16" id="123" style="color: red;" onclick="deleteRow(this)"><i class="fa fa-times" aria-hidden="true"></i></span>
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
                <script type="text/javascript">
                    console.log();
                    var src = "/searchajax";
                    var name = $("#se_product_code_0").val();
                    $('#se_product_code_0').select2({
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
                <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-6">
                        <button type="" class="btn btn-default" id="">
                            <i class="fa fa-btn fa-plus"></i>Add Sales
                        </button>
                        <span class="btn btn-default" onclick="printBill()" id="">
                            <i class="fa fa-file-pdf-o"></i>Invoice
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>
        @if (count($salesEntryDetails) > 0)
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>HSN/SAC Code</th>
                <th>Quantity</th>
                <th>Sale Price</th>
                <th>Discount</th>
                <th>CGST (%)</th>
                <th>CGST Amt</th>
                <th>SGST (%)</th>
                <th>SGST Amt</th>
                <th>Amount</th>
                <th>Total Amount</th>
                </thead>
                <tbody>

                    @foreach ($salesEntryDetails as $salesEntry)
                    <tr>
                        <td class="table-text"><div>{{$salesEntry->p_product_code}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->p_product_name}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->p_hsn_sac_code}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->se_quantity}}</div></td>
                        <td class="table-text"><div>Sale Price</div></td>
                        <td class="table-text"><div>{{$salesEntry->u_discount}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->p_cgst_percentage}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->se_cgst_amount}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->p_sgst_percentage}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->se_sgst_amount}}</div></td>
                        <td class="table-text"><div>{{$salesEntry->se_total_amt}}</div></td>
                        <td class="table-text"><div>Order Amt</div></td>
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
