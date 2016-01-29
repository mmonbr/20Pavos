<!DOCTYPE html>
<html>
<head>
    @include('backend.layouts.partials._head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('backend.layouts.partials._header')

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    @include('backend.layouts.partials._sidebar')

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="#">Dashboard</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('backend.layouts.partials._errors')

            @yield('content')
        <!-- /.content -->
        </section>
    </div>
    <!-- /.content-wrapper -->

    @include('backend.layouts.partials._footer')

    <!-- Control Sidebar -->
    @include('backend.layouts.partials._control_sidebar')

</div>
<!-- ./wrapper -->

@include('backend.layouts.partials._scripts')
@include('sweet::alert')

</body>
</html>