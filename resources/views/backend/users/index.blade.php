@extends('backend.layouts.main')

@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right"><i class="fa fa-user"></i> Add User</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'width' => '100%']) !!}
                </div>
                <!-- /.box-body -->
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush