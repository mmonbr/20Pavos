@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form method="post" action="{{ route('admin.categories.update', [$category->id]) }}">

                    {{ csrf_field() }}

                    {{ method_field('patch') }}

                    <input type="hidden" name="id" value="{{ $category->id }}">

                    <div class="box-header">
                        <h3 class="box-title">Edit category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" value="{{ $category->name }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input name="slug" value="{{ $category->slug }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Children Of</label>
                            <select name="parent_id" class="form-control">
                                <option></option>
                                @foreach($categoriesDropdown as $node)
                                    {!! renderAdminNodes($node, $category) !!}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
@endsection