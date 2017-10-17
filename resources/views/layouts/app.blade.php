<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <title>Laravel Quickstart - Basic</title>

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="/js/custom.js"></script>
        <script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });

        </script>
        <style>
            /* Shrinking the sidebar from 250px to 80px and center aligining its content*/
            /*
                DEMO STYLE
            */
            @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


            body {
                font-family: 'Poppins', sans-serif;
                background: #fafafa;
            }

            p {
                font-family: 'Poppins', sans-serif;
                font-size: 1.1em;
                font-weight: 300;
                line-height: 1.7em;
                color: #999;
            }

            a, a:hover, a:focus {
                color: inherit;
                text-decoration: none;
                transition: all 0.3s;
            }

            .navbar {
                padding: 15px 10px;
                background: #fff;
                border: none;
                border-radius: 0;
                margin-bottom: 40px;
                box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            }

            .navbar-btn {
                box-shadow: none;
                outline: none !important;
                border: none;
            }

            .line {
                width: 100%;
                height: 1px;
                border-bottom: 1px dashed #ddd;
                margin: 40px 0;
            }

            /* ---------------------------------------------------
                SIDEBAR STYLE
            ----------------------------------------------------- */
            .wrapper {
                display: flex;
                align-items: stretch;
            }

            #sidebar {
                min-width: 250px;
                max-width: 250px;
                /*background: #7386D5;*/
                background: #E0FFFF;
                color: #fff;
                transition: all 0.3s;
            }

            #sidebar.active {
                margin-left: -250px;
            }

            #sidebar .sidebar-header {
                padding: 20px;
                background: #6d7fcc;
            }

            #sidebar ul.components {
                padding: 20px 0;
                /*border-bottom: 1px solid #47748b;*/
            }

            #sidebar ul p {
                color: #fff;
                padding: 10px;
            }

            #sidebar ul li a {
                padding: 10px;
                font-size: 1.1em;
                display: block;
            }
            #sidebar ul li a:hover {
                color: #7386D5;
                background: #fff;
            }

            #sidebar ul li.active > a, a[aria-expanded="true"] {
                color: #fff;
                background: #6d7fcc;
            }
            
            #sidebar ul .navbar-brand{
                color: black;
                /*background-color: black;*/
                width: 100%;
            }

            a[data-toggle="collapse"] {
                position: relative;
            }

            a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
                content: '\e259';
                display: block;
                position: absolute;
                right: 20px;
                font-family: 'Glyphicons Halflings';
                font-size: 0.6em;
            }
            a[aria-expanded="true"]::before {
                content: '\e260';
            }


            ul ul a {
                font-size: 0.9em !important;
                padding-left: 30px !important;
                background: #6d7fcc;
            }

            ul.CTAs {
                padding: 20px;
            }

            ul.CTAs a {
                text-align: center;
                font-size: 0.9em !important;
                display: block;
                border-radius: 5px;
                margin-bottom: 5px;
            }

            a.download {
                background: #fff;
                color: #7386D5;
            }

            a.article, a.article:hover {
                background: #6d7fcc !important;
                color: #fff !important;
            }
            /* ---------------------------------------------------
                CONTENT STYLE
            ----------------------------------------------------- */
            #content {
                padding: 20px;
                min-height: 100vh;
                transition: all 0.3s;
            }

            /* ---------------------------------------------------
                MEDIAQUERIES
            ----------------------------------------------------- */
            @media (max-width: 768px) {
                #sidebar {
                    margin-left: -250px;
                }
                #sidebar.active {
                    margin-left: 0;
                }
                #sidebarCollapse span {
                    display: none;
                }
            }
            .navbar-default {
                background-color: #008B8B;
            }
            .container {
                /*margin-top: 100px;*/
            }
            .inner-nav {
                -webkit-transform: skew(-30deg);
                -ms-transform: skew(-30deg);
                transform: skew(-30deg);
            }
        </style>
    </head>
    <body id="app-layout">
        <nav class="navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <!--<div class="inner-nav" style="background-color: red;width: 200px;height: 50px;float: left;">-->
<!--                        <div style="background-color: gray;width: 100px;height: 25px;float: left;"></div>
                        <div style="background-color: gray;border-left: solid #7386D5 10px;width: 110px;height: 25px;float: right;"></div>-->
                    <!--</div>-->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        User List
                    </a>
                    <!--<div class="inner-nav" style="background-color: red;width: 200px;height: 50px;float: left; margin-left: 10%; "></div>-->
                    <!--
                    <a class="navbar-brand" href="{{ url('/plandetail') }}">
                        Plan
                    </a>
                    <a class="navbar-brand" href="{{ url('/monthlylist') }}">
                        Monthly Entry
                    </a>
                    <a class="navbar-brand" href="{{ url('/monthlylistdetails') }}">
                        Month Details
                    </a>-->
                </div>
            </div>
        </nav>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <ul class="list-unstyled components">
                    <li>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            User List
                        </a>
                    </li>
                    <li>
                        <a class="navbar-brand" href="{{ url('/plandetail') }}">
                            Plan
                        </a>                         
                    </li>
                    <li>
                        <a class="navbar-brand" href="{{ url('/monthlylist') }}">
                            Monthly Entry
                        </a>
                    </li>
                    <li>
                        <a class="navbar-brand" href="{{ url('/monthlylistdetails') }}">
                            Month Details
                        </a>
                    </li>
                </ul>
            </nav>
        <span id="sidebarCollapse" style="font-size:30px;cursor:pointer">&#9776;</span>        
        <!--<div style="width: 500px; height: 50px; background-color: green;display: flex;"></div>-->
            <!-- Page Content Holder -->
            @yield('content')
        </div>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
