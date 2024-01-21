<!DOCTYPE html>
<html data-locale="{{app()->getLocale()}}" lang="{{app()->getLocale()}}">

@include('admin.layout.partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <x-admin-header-component />
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <x-admin-footer-component />

        @include('admin.layout.partials.foot')


</body>

</html>
