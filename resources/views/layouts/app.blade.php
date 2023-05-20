<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="santoshmills" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('public/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />


</head>


<body data-sidebar="dark" data-layout-mode="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar" style="display:none">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{asset('public/assets/images/logo.svg')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('public/assets/images/logo-dark.png')}}" alt="" height="17">
                            </span>
                        </a>

                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{asset('public/assets/images/logo-light.svg')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('public/assets/images/logo-light.png')}}" alt="" height="19">
                            </span>
                        </a>
                    </div>

                </div>

                <div class="d-flex">

                    <div class="d-flex">
                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Search input">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>s
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user"
                                    src="{{asset('public/assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">
                                    {{ Auth::user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                        class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                        key="t-logout">Logout</span></a>
                            </div>
                        </div>
                        <!--
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="bx bx-cog bx-spin"></i>
                        </button>
                    </div> -->

                    </div>
                </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                    role="button">
                                    <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Admin</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                    <a href="{{route('seller.details')}}" class="dropdown-item"
                                        key="t-Seller">Seller</a>


                                    <a href="{{route('group.master')}}" class="dropdown-item" key="t-saas">Group
                                        Master</a>
                                    <a href="{{route('sub.group')}}" class="dropdown-item" key="t-sub-group">Sub Group
                                        Master</a>
                                    <a href="{{route('size.master')}}" class="dropdown-item" key="t-size">Size</a>
                                    <a href="{{route('unit.master')}}" class="dropdown-item" key="t-unit">Unit</a>
                                    <a href="{{route('machine_master')}}" class="dropdown-item"
                                        key="t-machine-master">Machine Master</a>
                                    <a href="{{route('item.master')}}" class="dropdown-item" key="t-category">Item
                                        Details</a>
                                    <a href="{{route('mc.category')}}" class="dropdown-item" key="t-category">M/c
                                        Category</a>

                                    <a href="{{route('quality.master')}}" class="dropdown-item" key="t-quality">Quality
                                        Master</a>
                                    <a href="{{route('dyeing.status')}}" class="dropdown-item" key="t-dyeing">Dyeing
                                        Status</a>
                                    <a href="{{route('owc.issue')}}" class="dropdown-item" key="t-dyeing">Owc Issue
                                        Master</a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout"
                                    role="button">
                                    <i class="bx bx-layout me-2"></i><span key="t-dashboards">Entry Module</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-layout">

                                    <a href="{{route('purchase.index')}}" class="dropdown-item" key="t-Seller">Purchase
                                        Entry</a>
                                    <a href="{{route('owc.entry')}}" class="dropdown-item" key="t-saas">OWC Entry</a>
                                    <a href="{{route('physical.master')}}" class="dropdown-item" key="t-saas">Physical
                                        Stockentry</a>
                                    <a href="{{route('stentner.master')}}" class="dropdown-item" key="t-saas">Stentner
                                        Master</a>

                                    {{--
                                    <a href="{{route('sub.group')}}" class="dropdown-item" key="t-sub-group">Sub Group
                                        Master</a>
                                    <a href="{{route('size.master')}}" class="dropdown-item" key="t-size">Size</a>
                                    <a href="{{route('unit.master')}}" class="dropdown-item" key="t-unit">Unit</a>
                                    <a href="{{route('machine_master')}}" class="dropdown-item"
                                        key="t-machine-master">Machine Master</a>
                                    <a href="{{route('mc.category')}}" class="dropdown-item" key="t-category">M/c
                                        Category</a>
                                    <a href="{{route('quality.master')}}" class="dropdown-item" key="t-quality">Quality
                                        Master</a>
                                    <a href="{{route('dyeing.status')}}" class="dropdown-item" key="t-dyeing">Dyeing
                                        Status</a> --}}
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout"
                                    role="button">
                                    <i class="bx bx-layout me-2"></i><span key="t-dashboards">Report Module</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-layout">

                                    <a href="{{route('party.index')}}" class="dropdown-item" key="t-Seller">Party Wise
                                        Purchase Report</a>

                                       {{--  <a href="{{route('group.index')}}" class="dropdown-item" key="t-Seller">Group Wise
                                            Purchase Report</a>  --}}


                                    {{-- <a href="{{route('owc.index')}}" class="dropdown-item" key="t-saas">OWC
                                        Entry</a>
                                    <a href="{{route('sub.group')}}" class="dropdown-item" key="t-sub-group">Sub Group
                                        Master</a>
                                    <a href="{{route('size.master')}}" class="dropdown-item" key="t-size">Size</a>
                                    <a href="{{route('unit.master')}}" class="dropdown-item" key="t-unit">Unit</a>
                                    <a href="{{route('machine_master')}}" class="dropdown-item"
                                        key="t-machine-master">Machine Master</a>
                                    <a href="{{route('mc.category')}}" class="dropdown-item" key="t-category">M/c
                                        Category</a>
                                    <a href="{{route('quality.master')}}" class="dropdown-item" key="t-quality">Quality
                                        Master</a>
                                    <a href="{{route('dyeing.status')}}" class="dropdown-item" key="t-dyeing">Dyeing
                                        Status</a> --}}
                                </div>
                            </li>

                    </div>

                    <div class="d-flex">

                        <div class="d-flex">
                            <div class="dropdown d-inline-block d-lg-none ms-2">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-search-dropdown">
                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..."
                                                    aria-label="Search input">
                                                <button class="btn btn-primary" type="submit"><i
                                                        class="mdi mdi-magnify"></i></button>s
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect"
                                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{asset('public/assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">
                                        {{ Auth::user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                        <span key="t-logout">Logout</span></a>
                                </div>
                            </div>
                            </li>

                            </ul>
                        </div>

                </nav>


            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Santoshmills.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Develop by WebRoidSolution
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->




    <!-- JAVASCRIPT -->
    <script src="{{asset('public/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- apexcharts -->


    <script src="{{asset('public/assets/js/app.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield('script')


</body>

</html>
