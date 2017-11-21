<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Quickstart - Basic</title>
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <!-- Styles -->
        <link href="/css/bootstrap3.3.6.min.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <script src="/js/jquery2.1.4.min.js"></script>
        <script src="/js/select2.min.js"></script>
        <link href="/css/select2-4.0.4.min.css" rel="stylesheet" />
        <script src="/js/custom.js"></script>
        <script src="/js/bootstrap-3.3.7.min.js"></script>
        <script>
        $(document).ready(function () {
            $("select").focus(function(){
                $("#se_product_code").trigger('select2:open');
            });
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        </script>
    </head>
    <body id="app-layout">
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top">  -->
         <nav class="navbar-default">
            <div class="container-fluid" style="margin-left: 0px;padding: 20px 0 0 0;">
                <div class="navbar-header">
                     <a class="navbar-brand" href="{{ url('/') }}">
                        
                    </a>
                </div>
                <!--<marquee><span>This is billing software by Thamodaran K..!</span></marquee>-->
            </div>
        </nav>
        <div style="height: 35px; width:100%;"></div>
        <div style="height: 400px; width:150px; border: 1px solid #ddd; box-shadow: 0 1px 1px rgba(0,0,0,.05); float: left;">
            <div class="main-menu panel-heading" style="width:100%; color: white; font-weight: bold; font-size: 20px;">
                Main Menu
            </div>
            <div>
                <ul class="list-unstyled components">
                    <li>
                        <a class="" href="{{ url('/user') }}">
                            Add User
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('/product') }}">
                            Add Products
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('/sales') }}">
                            Add Sales
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ url('/purchase') }}">
                            Add Purchase
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="wrapper">
<!--             <nav id="sidebar">
-->                <!--
            </nav>-->
        <!--<span id="sidebarCollapse" style="font-size:30px;cursor:pointer">&#9776;</span>-->
            @yield('content')
        </div>
        <!-- jQuery CDN -->
        <!--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>-->
        <!-- Bootstrap Js CDN -->

        <!-- JavaScripts -->
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
