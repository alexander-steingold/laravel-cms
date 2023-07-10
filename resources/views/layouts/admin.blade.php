<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body data-topbar="dark">
<!-- Begin page -->
<div id="layout-wrapper">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')
    <div class="main-content">
        <!-- Start Page Content -->
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page Heading -->
                @if (isset($header))
                    <header>
                        {{ $header }}
                    </header>
                @endif
                {{ $slot }}
            </div>
        </div>
        <!-- End Page Content -->
        @include('admin.partials.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>

<script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>


<!-- Required datatable js -->
<script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('backend/assets/js/app.js')}}"></script>
</body>

</html>
