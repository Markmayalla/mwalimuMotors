<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Salem') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('images/admin.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/admin.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('js/lib/toaster.min.css') }}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  
    
    
    <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

        .action_done_by{
            font-size: 12px !important;
        }

        datalist { 
            display: none;
        }

        datalist > option > value {
            display: none;
        }

        .nowrap_table{
            white-space: nowrap
        }

        .notification{
            height: 20px !important;
            width: 20px !important;
            border-radius: 10px !important;
            padding: 1px !important;
            font-size: 12px !important;
        }
    </style>
</head>
<body style="overflow-x: hidden !important;">
    <!-- Left Panel -->
    @php
            function nav($key,$navigation){
                if(array_key_exists($key,$navigation)){
                    if($navigation[$key] == 1){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }

            function nav_array($keys,$navigation){
                foreach($keys as $key){
                    if(nav($key, $navigation)){
                        return true;
                    }
                }
                return false;
            }

            function active($key,$page_name){
                if($key == $page_name){
                    return "active";
                }
            }
    @endphp
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(nav('dashboard',$navigation) || 1)
                            <!-- /.dashboard  -->
                            <li class="{{ active('dashboard',$page_name) }}">
                                <a href="{{ route('home') }}">
                                    <i class="menu-icon fa fa-dashboard"></i>Dashboard 
                                </a>
                            </li>
                    @endif

                    @if(nav('car.index',$navigation) || 1)
                            <!-- /.dashboard  -->
                            <li class="{{ active('car.index',$page_name) }}">
                                <a href="{{ route('car.index') }}">
                                    <i class="menu-icon fa fa-dashboard"></i>Cars 
                                </a>
                            </li>
                    @endif

                    <?php if(nav_array(['user.index'],$navigation)){ ?>
                        <li class="menu-title">User</li><!-- /.menu-title -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Users</a>
                            <ul class="sub-menu children dropdown-menu">
                                <?php if(nav('user.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('user.index') }}">All users</a></li><?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    
                    <?php if(nav_array(['roles_settings','floor.index','brand.index'],$navigation)){ ?>
                        <li class="menu-title">Settings</li><!-- /.menu-title -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Settings</a>
                            <ul class="sub-menu children dropdown-menu">
                                <?php if(nav('driving_wheel.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('driving_wheel.index') }}"> Driving Wheels </a></li><?php } ?>
                                <?php if(nav('fuel.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('fuel.index') }}"> Fuels </a></li><?php } ?>
                                <?php if(nav('color.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('color.index') }}"> Colors </a></li><?php } ?>
                                <?php if(nav('transmission.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('transmission.index') }}"> Transmissions </a></li><?php } ?>
                                <?php if(nav('brand.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('brand.index') }}"> Brands </a></li><?php } ?>
                                <?php if(nav('model.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('model.index') }}"> Models </a></li><?php } ?>
                                <?php if(nav('body_type.index',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('body_type.index') }}"> Body Types </a></li><?php } ?>
                                <?php if(nav('roles_settings',$navigation)){ ?><li><i class="menu-icon fa fa-paper-plane"></i><a href="{{ route('roles_settings') }}"> Roles Settings</a></li><?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Profit & Loss') }}</a>
                    <a class="navbar-brand hidden" href="{{ route('home') }}">{{ config('app.name2', 'P&L') }}</a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <div id="notification_panel"></div>
                    </div>

                        @guest
                            
                        @else
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" src="{{ asset('img/team/nanji.png') }}" alt="User Avatar">
                                </a>

                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="#"><i class="fa fa- user"></i>{{ Auth::user()->name }}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content" style="overflow-x: hidden !important;max-width:1240px !important;">
            
             <?php
                if($authorization){
                    ?>
                        <div class="card col-md-12 text-center col-md-offset-2">
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        Error 401: Your not Authorized to Access This Page, Please contact System admin {{ $page_name }}
                                </div>
                            </div>
                        </div>
                    <?php
                }else{
                    ?>
                         @yield('content')
                    <?php
                }
             ?>

            <button type="button" style="display:none" class="btn btn-success mb-1" data-toggle="modal" data-target="#errorModel" id="errorModelButton"> Large </button>
            <div class="modal fade" id="errorModel" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><div id="largeModalLabel"></div></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="body_sms"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; {{date('Y')}}
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by Me
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('js/init/fullcalendar-init.js') }}"></script>

    <script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/chosen.js') }}"></script>
    <script src="{{ asset('js/lib/toaster.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/init/datatables-init.js') }}"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script>
        ////// SHOW MODEL FOR VEHICLE
        @php($ses = session()->get('service','s'));
        var service = "{{ $ses }}";
        if(service !== "s"){
            $("#"+service).click();
        }

        function removeA(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax= arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }
    </script>

    <div class="content">
             @yield('model_errors')
             <?php
                if($errors->has('sms')){
                    $call_model_sms($errors->first('heading'),$errors->first('sms'),$errors->first('type'));
                }
            ?>
    </div>
    <div class="content">
            <script>
                dt_lengthMenu = [ [10, 25, 50, -1], [10, 25, 50, "All"] ];
                dt_lengthMenu2 = [ [-1, 10, 25, 50], ["All", 10, 25, 50] ];
                dt_dom = "lB<'pull-right'f>rti<'pull-right'p>";
                dt_buttons = "";

                function get_models(model){
                    var car_make = $('#car_make').val();
                    if(car_make != ""){
                        var element;
                        var value;
                        var text;
                        var previous = $('#current_model').val();
                        $.ajax({
                            type : "GET",
                            url : "{{ route('show_model',['car_id' => '']) }}/"+car_make,
                            success : function(jsons){
                                    $("#car_model option").remove();
                                    $("#car_model").append("<option value='{{ NULL }}'>Select Car Model .. </option>");
                                    for($i = 0; $i < jsons.length; $i++){
                                        value = jsons[$i]['value'];
                                        text = jsons[$i]['text'];
                                        selected = value == previous ? "selected" : "";
                                        $("#car_model").append("<option "+ selected +" value="+value+">"+text+"</optionl>");
                                    }
                                    if(model !== ""){
                                        $("#car_model option:contains("+model+")").attr('selected', 'selected');
                                    }
                            }
                        });
                    }
                }
            </script>
             @yield('datatable_section')
    </div>
</body>
</html>
