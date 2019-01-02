<!DOCTYPE html>
<html dir="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon_1.ico')}}">
    <title>car</title>
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
    <link href=" {{asset('assets/plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
    <link href=" {{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/new-style.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    @yield('styles')
</head>
<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="" class="logo">ca<i class="icon-c-logo"></i><span><i class="md md-a">r</i></span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
                <!--full screen button-->
                <li class="list-inline-item notification-list">
                    <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                        <i class="dripicons-expand noti-icon"></i>
                    </a>
                </li>
                <!--logout dropdown button-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('admin_assets/images/users/avatar-1.jpg')}}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- admins name-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>Welcome {{Auth::user()->name}}</small> </h5>
                        </div>
                        <!-- logout-->
                        <a class="dropdown-item notify-item" href="{{ url('/user/logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-power"></i> <span>Logout</span>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> information </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('dashboard.index')}}">dashboard</a></li>
                                    <li><a href="{{route('contact_us.index')}}">contact_us</a></li>
                                </ul>
                            </li>


                            <li><a href="{{route('category.index')}}">categories</a></li>
                            <li><a href="{{route('car.index')}}">products</a></li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-location-pin"></i><span> Maps </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="map-google.html"> Google Map</a></li>
                                    <li><a href="map-vector.html"> Vector Map</a></li>
                                </ul>
                            </li>







                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
            <!--left sidebar toggle-->
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div> <!-- container -->
        </div> <!-- content -->
        <footer class="footer text-right">
          car &copy; 2018 All rights reserved.
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->
<script>
    var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script><!-- Popper for Bootstrap -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/fastclick.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>
<!-- jQuery  -->
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
<!-- chatjs  -->
<script src="{{asset('assets/pages/jquery.chat.js')}}"></script>
<script src="{{asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/js/jquery.app.js')}}"></script>
<script src="{{asset('assets/pages/jquery.dashboard_2.js')}}"></script>
<script src="{{asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/plugins/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script src="{{asset('assets/pages/jquery.dashboard.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/pages/jquery.dashboard_3.js')}}"></script>





<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
        $(".knob").knob();
    });
</script>
@yield('scripts')
</body>
</html>
