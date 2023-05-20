<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="mrfresh Admin & Dashboard Template" name="description" />
    <meta content="mrfresh" name="mrfresh" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('public/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />

    <!-- toastr css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
</head>
@yield('body')
@yield('section')
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                document.write(new Date().getFullYear())
                </script>© Santoshmill.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by WebroidSolutions
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="rightbar-overlay"></div>
<!-- JAVASCRIPT -->
<script src="{{asset('public/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('public/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('public/assets/js/app.js')}}"></script>
</body>

</html>