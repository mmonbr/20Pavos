@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
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
                                                <select name="category_id" class="form-control">
                                                    <option value="root"></option>
                                                    @foreach($dropdown as $node)
                                                        {!! renderAdminNodes($node, $category) !!}
                                                    @endforeach
                                                </select>
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
                                    <a href="{{ route('products.show', $category->slug) }}" class="btn btn-success"><i
                                                class="fa fa-link"></i></a>
                                    <a href="{{ route('admin.products.edit', $category->id) }}" class="btn btn-primary"><i
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
        <div class="col-md-6"></div>
    </div>
@endsection