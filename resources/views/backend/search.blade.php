@extends('backend.layouts.main')

@section('title', 'Global Search')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Products</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#ID</th>
                            <th>Name</th>
                            <th>Options</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', [$product->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-link"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Options</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-link"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection