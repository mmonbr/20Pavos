@extends('backend.layouts.main')

@section('title', 'Editing User')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form method="POST" action="{{ route('admin.users.update', [$user->id]) }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="box-header">
                        <h3 class="box-title">Editing {{ $user->username }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="{{ old('name', $user->username) }}" class="form-control"
                                   name="username">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{ old('name', $user->email) }}" class="form-control"
                                   name="email">
                        </div>

                        <div class="form-group">
                            <label>Password (update only)</label>
                            <input type="password" class="form-control"
                                   name="password">
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option @if($user->type == 'user') selected @endif value="user">User</option>
                                <option @if($user->type == 'admin') selected @endif value="admin">Admin</option>
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