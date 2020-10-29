<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>

        <title>Walton Assignment - System Login</title>

        <!--favicon-->
        <link rel="icon" href="{{URL::to('public/asset_client/images/favicon.png')}}" type="image/x-icon">
        <!-- Bootstrap core CSS-->
        <link href="{{URL::to('public/asset_client/css/bootstrap.min.css')}}" rel="stylesheet"/>
        <!-- animate CSS-->
        <link href="{{URL::to('public/asset_client/css/animate.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Icons CSS-->
        <link href="{{URL::to('public/asset_client/css/icons.css')}}" rel="stylesheet" type="text/css"/>
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
        @yield('client_login_content')

        <!-- Bootstrap core JavaScript-->
        <script src="{{URL::to('public/asset_client/js/jquery.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/js/popper.min.js')}}"></script>
        <script src="{{URL::to('public/asset_client/js/bootstrap.min.js')}}"></script>
        <!-- waves effect js -->
        <script src="{{URL::to('public/asset_client/js/waves.js')}}"></script>
        <!-- Custom scripts -->
        <script src="{{URL::to('public/asset_client/js/app-script.js')}}"></script>
    </body>
</html>