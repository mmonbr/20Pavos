@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form enctype='multipart/form-data' method="POST" action="{{ route('admin.products.store') }}" role="form">

                    {{ csrf_field() }}

                    <div class="box-header with-border">
                        <h3 class="box-title">New Product</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option>Categoría</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Provider</label>
                            <select class="form-control" name="category_id">
                                <option>Amazon</option>
                                <option>Etsy</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Referral Link</label>
                            <input type="text" class="form-control" value="{{ old('referral_link') }}" name="referral_link">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label>Short description</label>
                            <textarea class="form-control" name="short_description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Long description</label>
                            <textarea class="form-control" name="long_description"></textarea>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection