<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Walton Assignment - Dashboard</title>

        <!--favicon-->
        <link rel="icon" href="{{URL::to('public/asset_client/images/favicon.png')}}" type="image/x-icon">
        <!--Lightbox Css-->
        <link href="{{URL::to('public/asset_client/plugins/fancybox/css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css"/>
        <!-- sweetalert -->
        <script src="{{URL::to('public/asset_client/js/sweetalert2.min.js')}}" type="text/javascript"></script>
        <!-- notifications css -->
        <link rel="stylesheet" href="{{URL::to('public/asset_client/plugins/notifications/css/lobibox.min.css')}}"/>
        <!-- Vector CSS -->
        <link href="{{URL::to('public/asset_client/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
        <!-- simplebar CSS-->
        <link href="{{URL::to('public/asset_client/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
        <!-- Bootstrap core CSS-->
        <link href="{{URL::to('public/asset_client/css/bootstrap.min.css')}}" rel="stylesheet"/>
        <!--Data Tables -->
        <link href="{{URL::to('public/asset_client/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::to('public/asset_client/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        <!--Bootstrap Datepicker-->
        <link href="{{URL::to('public/asset_client/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <!-- animate CSS-->
        <link href="{{URL::to('public/asset_client/css/animate.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Icons CSS-->
        <link href="{{URL::to('public/asset_client/css/icons.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Sidebar CSS-->
        <link href="{{URL::to('public/asset_client/css/sidebar-menu.css')}}" rel="stylesheet"/>
        <!-- Custom Style-->
        <link href="{{URL::to('public/asset_client/css/app-style.css')}}" rel="stylesheet"/>

        <!--Disable Browser Back-->
        <script type="text/javascript">
window.history.forward();
function noBack() {
    window.history.forward();
}
        </script>

        <!--Disable Mouse Right Click-->
        <script type="text/javascript">
            if (document.layers) {
                //Capture the MouseDown event.
                document.captureEvents(Event.MOUSEDOWN);

                //Disable the OnMouseDown event handler.
                document.onmousedown = function () {
                    return false;
                };
            } else {
                //Disable the OnMouseUp event handler.
                document.onmouseup = function (e) {
                    if (e != null && e.type == "mouseup") {
                        //Check the Mouse Button which is clicked.
                        if (e.which == 2 || e.which == 3) {
                            //If the Button is middle or right then disable.
                            return false;
                        }
                    }
                };
            }

            //Disable the Context Menu event.
            document.oncontextmenu = function () {
                return false;
            };
        </script>
    </head>

    <body>
        <!-- Start wrapper-->
        <div id="wrapper">
            <!--Start sidebar-wrapper-->
            <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
                <div class="brand-logo">
                    <a href="{{URL::to('/')}}"><h5 class="logo-text"> Assignment</h5></a>
                </div>
                <ul class="sidebar-menu do-nicescrol">
                    <li><a href="{{URL::to('/')}}" class="waves-effect"><i class="icon-home"></i> <span>Dashboard</span></a></li>
                    <li class="sidebar-header">CLIENT NAVIGATION</li>
                    <li>
                        <a href="javaScript:void();" class="waves-effect"><i class="fa fa-cog"></i> <span>Settings</span><i class="fa fa-angle-left float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{URL::to('/filesize')}}"><i class="fa fa-circle-o"></i> File Size</a></li>
                            <li><a href="{{URL::to('/filetype')}}"><i class="fa fa-circle-o"></i> File Extension</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();" class="waves-effect"><i class="fa fa-heartbeat"></i> <span>Directory</span><i class="fa fa-angle-left float-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{URL::to('/cre-ren-del')}}"><i class="fa fa-circle-o"></i> Create, Rename, Delete, Copy & Move File & Directory</a></li>
                            <li><a href="{{URL::to('/file-tree')}}"><i class="fa fa-circle-o"></i> Directory Tree</a></li>
                            <li><a href="{{URL::to('/dir-back')}}"><i class="fa fa-circle-o"></i> Directory go back and forward</a></li>
                        </ul>
                    </li>
                    <li><a href="{{URL::to('/up-down-pre')}}" class="waves-effect"><i class="fa fa-upload"></i> <span>Upload, Download, Preview</span></a></li>
                    <li><a href="{{URL::to('/various-need')}}" class="waves-effect"><i class="icon-lock"></i> <span>Pagination, Searching, Sorting, Refresh</span></a></li>
                    <li><a href="{{URL::to('/users')}}" class="waves-effect"><i class="icon-user"></i> <span>Users</span></a></li>
                </ul>
            </div>
            <!--End sidebar-wrapper-->

            <!--Start topbar header-->
            <header class="topbar-nav">
                <nav class="navbar navbar-expand fixed-top gradient-ibiza">
                    <ul class="navbar-nav mr-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link toggle-menu" href="javascript:void();">
                                <i class="icon-menu menu-icon"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav align-items-center right-nav-link">
                        <li class="nav-item">
                            @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @else
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="{{URL::to('images/user_images/noimage.jpg')}}" class="img-circle" alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right animated fadeIn">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="{{URL::to('images/user_images/noimage.jpg')}}" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                                            <p class="user-subtitle">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-power mr-2"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                        @endguest
                        </li>
                    </ul>
                </nav>
            </header>
            <!--End topbar header-->

            <div class="clearfix"></div>

            <div class="content-wrapper">
                <div class="container-fluid">
                    @yield('client_content')
                </div>
                <!-- End container-fluid-->
            </div>
            <!--End content-wrapper-->
            <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            <!--End Back To Top Button-->

            <!--Start footer-->
            <footer class="footer">
                <div class="container">
                    <div class="text-center">
                        Copyright © 2020 Walton Assignment
                    </div>
                </div>
            </footer>
            <!--End footer-->
        </div>
        <!--End wrapper-->

        <!-- Bootstrap core JavaScript-->
        <script src="{{URL::to('public/asset_client/js/jquery.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/js/popper.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/js/bootstrap.min.js')}}"></script>

        <!-- simplebar js -->
        <script src="{{URL::to('public/asset_client/plugins/simplebar/js/simplebar.js')}}"></script>
        <!-- waves effect js -->
        <script src="{{URL::to('public/asset_client/js/waves.js')}}"></script>
        <!-- sidebar-menu js -->
        <script src="{{URL::to('public/asset_client/js/sidebar-menu.js')}}"></script>
        <!-- Custom scripts -->
        <script src="{{URL::to('public/asset_client/js/app-script.js')}}"></script>

        <!--Form Validatin Script-->
        <script src="{{URL::to('public/asset_client/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
        <script>
            $().ready(function () {
                $("#filesize-info").validate();
                $("#filetype-info").validate();
                $("#create_dir").validate();
                $("#rename_dir").validate();
                $("#delete_dir").validate();
                $("#copy_dir").validate();
                $("#move_dir").validate();
            });
        </script>

        <!--Data Tables js-->
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/jszip.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>

        <script>
            $(document).ready(function () {
                //Default data table
                $('#common-datatable').DataTable();
                $('#common2-datatable').DataTable();
                $('#common3-datatable').DataTable();
            });
        </script>

        <!--Bootstrap Datepicker Js-->
        <script src="{{URL::to('public/asset_client/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script>
            $('#default-datepicker').datepicker({
                todayHighlight: true
            });
            $('#autoclose-datepicker').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            $('#autoclose-datepicker2').datepicker({
                autoclose: true,
                todayHighlight: true
            });

            $('#inline-datepicker').datepicker({
                todayHighlight: true
            });

            $('#dateragne-picker .input-daterange').datepicker({
            });
        </script>

        <!--notification js -->
        <script src="{{URL::to('public/asset_client/plugins/notifications/js/notifications.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/notifications/js/notification-custom-script.js')}}"></script>

        <!-- Vector map JavaScript -->
        <script src="{{URL::to('public/asset_client/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- Sparkline JS -->
        <script src="{{URL::to('public/asset_client/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
        <!-- Chart js -->
        <script src="{{URL::to('public/asset_client/plugins/Chart.js/Chart.min.js')}}"></script>
        <!--Lightbox-->
        <script src="{{URL::to('public/asset_client/plugins/fancybox/js/jquery.fancybox.min.js')}}"></script>
    </body>
</html>