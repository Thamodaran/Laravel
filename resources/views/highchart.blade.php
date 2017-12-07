@extends('layouts.app')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="productContainer" style="min-width: 510px; height: 410px; max-width: 600px; margin: 0 auto;border: 1px solid gray;"></div>
<div id="customerContainer" style="min-width: 510px; height: 410px; max-width: 600px; margin: 0 auto;border: 1px solid gray;"></div>

<script type="text/javascript">


// Radialize the colors
Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
      return {
          radialGradient: {
              cx: 0.5,
              cy: 0.3,
              r: 0.7
          },
          stops: [
              [0, color],
              [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
          ]
      };
  })
});

// Build the chart
Highcharts.chart('productContainer', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: 'Product Sales. January, 2015 to May, 2015'
  },
  tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %',
              style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              },
              connectorColor: 'silver'
          }
      }
  },
  series: [{
      name: 'Brands',
      data: [
          { name: 'Monitor', y: 56.33 },
          {
              name: 'KeyBoard',
              y: 24.03,
              sliced: true,
              selected: true
          },
          { name: 'Laptop', y: 10.38 },
          { name: 'PenDrive', y: 4.77 },
          { name: 'Printer', y: 0.91 },
          { name: 'Mouse', y: 0.2 }
      ]
  }]
});

// Build the chart
Highcharts.chart('customerContainer', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: 'Customer Sales. January, 2015 to May, 2015'
  },
  tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %',
              style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              },
              connectorColor: 'silver'
          }
      }
  },
  series: [{
      name: 'Brands',
      data: [
          { name: 'Monitor', y: 56.33 },
          {
              name: 'KeyBoard',
              y: 24.03,
              sliced: true,
              selected: true
          },
          { name: 'Laptop', y: 10.38 },
          { name: 'PenDrive', y: 4.77 },
          { name: 'Printer', y: 0.91 },
          { name: 'Mouse', y: 0.2 }
      ]
  }]
});

</script>

@endsection
