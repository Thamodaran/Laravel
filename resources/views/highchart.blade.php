@extends('layouts.app')

@section('content')
<style>
    .header {
        background-color: black !important;
        height: 10%;
    }
    .outer-header {
        width: 45%;
        height: 50%;
        border: 1px solid black;
        margin-left: 20px; 
        float: left;
        border: 1px solid #ddd;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
</style>
<div style="width: 100%;">
    <div class="outer-header">
        <div class="main-menu panel-heading"></div>
        <div id="productContainer" style="width: 100%; float: left; height: 410px; margin: 0 auto;"></div>
    </div>
    <div class="outer-header">
        <div class="main-menu panel-heading"></div>
        <div id="customerContainer" style="width: 100%;float: left; height: 410px; margin: 0 auto;"></div>
    </div>
    <div class="outer-header">
        <div class="main-menu panel-heading"></div>
        <div id="expenseContainer" style="width: 100%; height: 410px; margin: 0 auto;"></div>
    </div>
    
    
</div>
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
          { name: 'IOB Bank', y: 56.33 },
          {
              name: 'Indian Bank',
              y: 24.03,
              sliced: true,
              selected: true
          },
          { name: 'Kiruba', y: 10.38 },
          { name: 'Axis Bank', y: 4.77 },
          { name: 'IIT Institute', y: 0.91 },
          { name: 'Anna University', y: 0.2 }
      ]
  }]
});

Highcharts.chart('expenseContainer', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Browser market shares at a specific website, 2014'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [
            ['Firefox', 45.0],
            ['IE', 26.8],
            {
                name: 'Chrome',
                y: 12.8,
                sliced: true,
                selected: true
            },
            ['Safari', 8.5],
            ['Opera', 6.2],
            ['Others', 0.7]
        ]
    }]
    });
</script>

@endsection
