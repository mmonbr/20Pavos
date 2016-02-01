@extends('backend.layouts.main')

@section('title', 'Creating an User')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    {{ csrf_field() }}
                    <div class="box-header">
                        <h3 class="box-title">Creating an User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="{{ old('username') }}" class="form-control"
                                   name="username">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{ old('email') }}" class="form-control"
                                   name="email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control"
                                   name="password">
                        </div>

                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" class="form-control"
                                   name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option selected value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <button class="btn btn-primary btn-block">Update <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection