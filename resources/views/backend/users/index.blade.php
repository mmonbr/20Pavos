@extends('backend.layouts.main')

@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th class="text-center">Options</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-success"><i
                                                class="fa fa-link"></i></a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <form method="POST"
                                          action="{{ route('admin.users.destroy', [$user->id]) }}"
                                          class="inline">
                                        {{ method_field('delete') }}

                                        {{ csrf_field() }}
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {{ $users->render() }}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection