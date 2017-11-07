<html>
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
  </style>
</head>
<body><!-- <img src="/var/www/html/new-laravel/public/images/regnumbers.jpeg"> -->
    <div style="border: 1px solid black;">
      <div>
        <!-- {{$salesentry}} -->
      </div>
        <table border="1" class="border-collapse overall-table">
          <tbody>
            <tr>
              <td colspan="2">From :</td>
              <td></td>
              <td></td>
              <td colspan="2">To :</td>
            </tr>
            <tr>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td>Name :</td>
              <td>Thamu</td>
              <td></td>
              <td></td>
              <td>Name :</td>
              <td>Thamu</td>
            </tr>
            <tr>
              <td>Address :</td>
              <td>1/597, Vinayaga nager,</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>5th street</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td>Chennai</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <table border="1" class="border-collapse overall-table product-list-table">
          <tbody>
            <tr>
              <td class="border-bottom-none td-width-5per"> S.No. </td>
              <td class="border-bottom-none td-width-30per">DESCRIPTION</td>
              <td class="border-bottom-none td-width-5per">HSN/</td>
              <td class="border-bottom-none td-width-5per">GST</td>
              <td class="border-bottom-none td-width-5per">QTY</td>
              <td class="border-bottom-none td-width-5per">RATE</td>
              <td colspan="2" class="td-width-10per">AMOUNT</td>
              <!-- <td></td> -->
            </tr>
            <tr>
              <td class="border-top-none"></td>
              <td class="border-top-none"></td>
              <td class="border-top-none">SAC</td>
              <td class="border-top-none">RATE</td>
              <td class="border-top-none"></td>
              <td class="border-top-none"></td>
              <td>Rs.</td>
              <td>P</td>
            </tr>
            @foreach ($salesentry as $task)
            <tr>
              <td>1</td>
              <td>Monitor</td>
              <td>10</td>
              <td>18</td>
              <td>2</td>
              <td>2500</td>
              <td>5000</td>
              <td>00</td>
            </tr>
            @endforeach

            <tr>
              <td colspan="5" class="text-align-right">TOTAL AMOUNT</td>
              <td colspan="2"></td>
              <td></td>
            </tr>
            <tr>
              <td class="text-align-right" style="border-bottom: 2px dotted black;">Rupees</td>
              <td colspan="7" style="border-bottom: 2px dotted black;"></td>
            </tr>
            <tr>
              <td colspan="8" style="border-top: 2px dotted black;">&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </div>
  </body>
</html>