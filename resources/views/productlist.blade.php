@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading panelHeadingCustom" style="">
            Product List
        </div>

        <div class="panel-body">
             <form action="{{ url('sales')}}" method="POST" class="form-horizontal">
            <!--<form action="" method="" class="form-horizontal">-->
                {{csrf_field()}}
                <div style="height: 35px;width: 100%;"></div>
                <table id="detail-table" border="1"  style="width: 100%; border-bottom: 0px;" class="customer-table">
                    <tr>
                        <th class="width-5-per">S No</th>
                        <th class="width-10-per">Product Code</th>
                        <th class="width-20-per">Product Name</th>
                        <th class="width-20-per">Product Model</th>
                        <th class="width-5-per">HSN/SAC Code</th>
                        <th class="width-5-per">CGST (%)</th>
                        <th class="width-10-per">SGST (%)</th>
                        <th class="width-5-per">Action</th>
                    </tr>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td class="table-text">{{$key}}</td>
                        <td class="table-text"><div>{{$product->p_product_code}}</div></td>
                        <td class="table-text"><div>{{$product->p_product_name}}</div></td>
                        <td class="table-text"><div>{{$product->p_product_model}}</div></td>
                        <td class="table-text"><div>{{$product->p_hsn_sac_code}}</div></td>
                        <td class="table-text"><div>{{$product->p_cgst_percentage}}</div></td>
                        <td class="table-text"><div>{{$product->p_sgst_percentage}}</div></td>
                        <!-- <td class="table-text"><div></div></td> -->
                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{ url('planuser/') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <!-- <button type="submit" class="btn btn-danger"> -->
                                    <i class="fa fa-btn fa-trash"></i>
                                <!-- </button> -->
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div style="height: 35px;width: 100%;"></div>

            </form>
        </div>
    </div>
</div>
@endsection
