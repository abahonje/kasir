<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OKKIStore | {{ $title }}</title>
        <link href="/vendor/datatables/dataTables.bootstrap5.css" rel="stylesheet" />
        <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" />
        <link href="/vendor/sbadmin/css/styles.css" rel="stylesheet" />
        <script src="/vendor/fontawesome/js/all.js"></script>
        <style>
            .sb-nav-link-icon{
                width: 20px !important;
            }
            .card-icon{
                top: 25px;
                right: 25px;
                font-size: 60px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 d-flex align-items-center" href="/dashboard">
                <img src="/img/logo1.png" alt="" class="me-2" style="height: 45px">
                <h3 class="p-0 m-0">OKKI<span class="text-danger">Store</span></h3>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/user.png" height="30px" class="rounded-circle me-1" alt=""> {{ auth()->user()->username }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                    </ul>
                </li>
            </ul>
            <a href="/logout" class="btn btn-danger ms-auto ms-md-0 me-3 me-lg-4 px-4 rounded-0">Logout</a>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('layouts.navbar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4 mb-5">{{ $title }}</h2>
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Created with <i class="fas fa-heart text-danger"></i> by Anung</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="/vendor/bootstrap/js/jquery-3.7.1.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/vendor/sbadmin/js/scripts.js"></script>
        <script src="/vendor/sbadmin/js/Chart.min.js"></script>
        <script src="/vendor/datatables/datatables.js"></script>
        <script src="/vendor/datatables/dataTables.bootstrap5.js"></script>
        <script src="/vendor/datatables/buttons.html5.min.js"></script>
        <script src="/vendor/datatables/buttons.print.min.js"></script>
        <script src="/vendor/datatables/buttons.dataTables.js"></script>
        <script src="/vendor/datatables/pdfmake.min.js"></script>
        <script src="/vendor/datatables/jszip.min.js"></script>
        <script src="/vendor/select2/js/select2.min.js"></script>
        @yield('script')
    </body>
</html>
