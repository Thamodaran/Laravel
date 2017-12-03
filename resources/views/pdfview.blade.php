<?php $content = ''; ?>
<?php $content .='<html>
    <head>
        <style>
            .border-collapse {
                border-collapse: collapse;
            }
            .logo-div-style {
                width : 100px;
                height : 100px;
            }
            .overall-table{
                width : 690px;
                /*height : 100px;*/
                margin: auto;
            }
            .td-width-10per {
                width : 10%;
            }
            .td-width-20per {
                width : 20%;
            }
            .td-width-5per {
                width : 5%;
            }
            .td-width-30per {
                width : 30%;
            }
            .td-width-40per {
                width : 40%;
            }
            .td-width-50per {
                width : 50%;
            }
            .td-width-70per {
                width : 70%;
            }
            .td-width-100per {
                width : 100%;
            }
            .td-width-15per {
                width : 15%;
            }
            .border-top-none {
                border-top: none;
            }
            .border-bottom-none {
                border-bottom: none;
            }
            .product-list-table {
                text-align: center;
            }
            .text-align-right {
                text-align: right;
            }
            .text-align-center {
                text-align: center;
            }
            .table {
                display: table;
                width: 100%;
            }
            .row {
                display: table-row;
            }
            .col {
                display: table-cell;
                border: 1px solid black;
            }
            .pading-text-left-5 td{
                padding-left : 5px;
            }
            
        </style>
    </head>
    <body>';
    ?><!-- <img border: 1px solid black; src="/var/www/html/new-laravel/public/images/regnumbers.jpeg"> -->        
        <?php $content .='<div style="border: 1px solid black; height: 930px;">
            <div style="border-bottom: 1px solid black; width: 100%; height: 150px;">
                <table border="0" class="pading-text-left-5" >
                    <tr>
                        <td style="width: 70px;font-weight: bold;">&nbsp;&nbsp;GSTIN</td>
                        <td>:</td>
                        <td style="width: 150px;font-weight: bold;" class="text-align-right">33AXSPD8003C1ZM</td>
                        <td style="width: 465px;" class="text-align-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-align-center" style="text-decoration: underline;font-size: 14px;font-weight: bold;"> TAX INVOICE </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-align-center" style="font-size: 25px;font-weight: bold;">I - Fix Computers</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-align-center" style="font-size: 14px;font-weight: bold;">No.4/56, SEEVARAM 3rd STREET,</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-align-center" style="font-size: 14px;font-weight: bold;">PERUNGUDI, CHENNAI - 600096.</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-align-center" style="font-size: 12px;font-weight: bold;font-style: italic;">Tel : 04465554546 &nbsp;&nbsp;&nbsp;email : ifixcomputers14@gmail.com &nbsp;&nbsp;&nbsp;Website : ifixcomputers.co.in</td>
                    </tr>
                </table>

            </div>
            <div style="width: 100%; height: 100px;">
                <div style="width: 50%; height: inherit; float: left;">
                    <table border="0" class="pading-text-left-5">
                        <tr>
                            <td style="width: 130px;font-weight: bold;font-style: italic;">Party Details</td>
                            <td style="width: 10px;font-weight: bold;">:</td>
                            <td style="">Thamodaran</td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">&nbsp;</td>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">Party Mobile No</td>
                            <td style="">:</td>
                            <td style="">9566066795</td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">GSTIN</td>
                            <td style="">:</td>
                            <td style="">33AAFCC5cc7K1ZQ</td>
                        </tr>
                    </table>
                </div>
                <div style="width: 50%; height: inherit; float: left;">
                    <table border="0" class="pading-text-left-5">
                        <tr>
                            <td style="width: 130px;">Invoice No</td>
                            <td style="width: 10px;">:</td>
                            <td style="">259</td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">Dated</td>
                            <td style="width: 10px;">:</td>
                            <td style="">01-11-2017</td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">Place of supply</td>
                            <td style="width: 10px;">:</td>
                            <td style="">Tamilnadu</td>
                        </tr>
                        <tr>
                            <td style="width: 130px;">&nbsp;</td>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>';
        ?>
            <?php $content .= '<div style="width: 100%; height: 420px; border-bottom: 1px solid black;">
                <table id="product-sales-list"border="0" class="pading-text-left-5" style=" border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="width: 35px; font-size: 13px; border-top: 1px solid black; border-bottom: 1px solid black;">S.N.</th>
                            <th style="width: 180px; font-size: 13px; border: 1px solid black;">Description</th>
                            <th style="width: 60px; font-size: 13px; border: 1px solid black;">HSN/SAC<br> Code</th>
                            <th style="width: 30px; font-size: 13px; border: 1px solid black;">Qty.</th>
                            <th style="width: 75px; font-size: 13px; border: 1px solid black;">Price</th>
                            <th style="width: 60px; font-size: 13px; border: 1px solid black;">Discount</th>
                            <th style="width: 25px; font-size: 13px; border: 1px solid black;">CGST (%)</th>
                            <th style="width: 25px; font-size: 13px; border: 1px solid black;">CGST Amount</th>
                            <th style="width: 25px; font-size: 13px; border: 1px solid black;">SGST (%)</th>
                            <th style="width: 25px; font-size: 13px; border: 1px solid black;">SGST Amount</th>
                            <th style="width: 85px; font-size: 13px; border-top: 1px solid black;border-bottom: 1px solid black;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>';
            ?>
                        @if(count($salesentry) <= 0) 
                            @foreach ($salesentry as $sales)
                                <?php $content .= '<tr style="">
                                            <td style="font-size: 13px; border-right: 1px solid black;">1</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">Description</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">3891</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">5</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">1500</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                            <td style="font-size: 13px; border-right: 1px solid black;">18</td>
                                            <td style="font-size: 13px; border: 0px;">25000</td>
                                        </tr>';
                                        ?>
                            @endforeach                            
                        @endif
                        <?php $sino = 1;?>
                        @foreach ($salesentry  as $sno => $sales)
                            <?php $content .= '<tr style="">
                                <td style="font-size: 13px; border-right: 1px solid black;">'.$sino.'</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">Description</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">3891</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">5</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">1500</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">10</td>
                                <td style="font-size: 13px; border-right: 1px solid black;">18</td>
                                <td style="font-size: 13px; border: 0px;">25000</td>
                            </tr>';
                            $sino ++;
                            ?>
                        @endforeach
                        @if (count($salesentry) > 0)
                            @for ($rowCount = count($salesentry); $rowCount <= 21; $rowCount++)
                                <?php $content .= '<tr style="">
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                                        <td style="font-size: 13px; border: 0px;">&nbsp;</td>
                                    </tr>';?>
                            @endfor
                        @endif
    <?php $content .= '<tr style="">
                            <td colspan="10" style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                            <td style="width: 80px; font-size: 13px;">&nbsp;</td>                            
                        </tr>
                        <tr style="">
                            <td colspan="10" style="font-size: 13px; border-right: 1px solid black;">&nbsp;</td>
                            <td style="width: 80px; font-size: 13px;">&nbsp;</td>                            
                        </tr>
                        <tr style="">
                            <td colspan="10" style="font-size: 13px;" class="text-align-right">Grand Total Rs.&nbsp;&nbsp;</td>
                            <td style="width: 80px; font-size: 13px; border-left: 1px solid black;">1550000</td>                            
                        </tr>
                        <tr style="">
                            <td colspan="11" style="font-weight: bold; font-size: 14px; border-top: 1px solid black;" class="">&nbsp;</td>
                        </tr>
                        <tr style="">
                            <td colspan="11" style="font-weight: bold; font-size: 14px;" class="">Total Sale = 115000</td>
                        </tr>
                        <tr style="">
                            <td colspan="11" style="font-weight: bold; font-size: 14px;">Rupees One Lack Fifty Thousand</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-weight: bold; font-size: 14px; border-right: 1px solid black; border-top: 1px solid black;">&nbsp;</td>
                            <td colspan="8" style="font-weight: bold; font-size: 14px; border-top: 1px solid black;">&nbsp;</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-size: 14px; font-weight: bold; text-decoration: underline; border-right: 1px solid black;">Terms& Conditions</td>
                            <td colspan="8" style="font-size: 14px; font-weight: bold; border: 0px solid black;">Reciver\'s Signature :</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-size: 14px; border-right: 1px solid black;">&nbsp;</td>
                            <td colspan="8" style="font-size: 14px; border-bottom: 1px solid black;">&nbsp;</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-size: 14px; border-right: 1px solid black;">&nbsp;</td>
                            <td colspan="8" style="font-size: 14px; border: 0px solid black;">&nbsp;</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-size: 14px; border-right: 1px solid black;">&nbsp;</td>
                            <td colspan="8" class="text-align-right" style="font-size: 14px; font-weight: bold; padding-right:10px; border: 0px solid black;">for I - FIX COMPUTERS</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-size: 14px; border-right: 1px solid black;">&nbsp;</td>
                            <td colspan="8" style="font-size: 14px; border: 0px solid black;">&nbsp;</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-size: 14px; border-right: 1px solid black;">&nbsp;</td>
                            <td colspan="8" style="font-size: 14px; border: 0px solid black;">&nbsp;</td>
                        </tr>
                        <tr style="">
                            <td colspan="3" style="font-size: 14px; border-right: 1px solid black;">&nbsp;</td>
                            <td colspan="8" class="text-align-right" style="font-size: 14px; font-weight: bold; padding-right:10px; border: 0px solid black;">Authorised Signatory</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>    
    </body>
</html>'; 
    echo $content;
    ?>
