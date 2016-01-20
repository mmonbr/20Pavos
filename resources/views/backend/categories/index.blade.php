@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Up / Down</th>
                            <th>Children of</th>
                            <th class="text-center">Options</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ depthSymbol($category->depth) }} {{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->productsCount }}</td>
                                <td>
                                    <form method="POST" action="{{ route('categories.up', [$category->id]) }}"
                                          class="inline">
                                        {{ method_field('patch') }}

                                        {{ csrf_field() }}
                                        <button class="btn btn-default" type="submit"><i
                                                    class="fa fa-arrow-up"></i>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('categories.down', [$category->id]) }}"
                                          class="inline">
                                        {{ method_field('patch') }}

                                        {{ csrf_field() }}
                                        <button class="btn btn-default" type="submit"><i
                                                    class="fa fa-arrow-down"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST"
                                          action="{{ route('categories.makeChildrenOf', [$category->id]) }}"
                                    >
                                        {{ method_field('patch') }}

                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-8">
                                                {!! app('App\Utilities\NestedSelect')->name('parent_id')->categories($categories_list)->selected($category)->render() !!}
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-default" type="submit"><i
                                                            class="fa fa-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-success"><i
                                                class="fa fa-link"></i></a>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary"><i
                                                class="fa fa-edit"></i></a>
                                    <form method="POST"
                                          action="{{ route('admin.categories.destroy', [$category->id]) }}"
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
            </div>
        </div>
        <div class="col-md-3">
            <div class="box">
                <form method="post" action="{{ route('admin.categories.store') }}">

                    {{ csrf_field() }}

                    <div class="box-header">
                        <h3 class="box-title">Add a new category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            {!! app('App\Utilities\NestedSelect')->name('category_id')->categories($categories_list)->selected(old('category_id', []))->render() !!}
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection