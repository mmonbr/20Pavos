@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
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
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Children Of</label>
                            <select name="category_id" class="form-control">
                                <option value="root"></option>
                                @foreach($categories_dropdown as $node)
                                    {!! renderAdminNodes($node) !!}
                                @endforeach
                            </select>
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