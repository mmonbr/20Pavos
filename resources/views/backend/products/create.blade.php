@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form enctype='multipart/form-data' method="POST" action="{{ route('admin.products.store') }}"
                      role="form">

                    {{ csrf_field() }}

                    <div class="box-header with-border">
                        <h3 class="box-title">New Product</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select multiple class="form-control" name="categories[]">
                                @foreach($categories as $category)
                                    {!! renderAdminNodes($category) !!}
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Referral Link</label>
                            <input type="text" value="{{ old('referral_link') }}" class="form-control"
                                   name="referral_link">
                        </div>

                        <div class="form-group">
                            <label>Price (in cents)</label>
                            <input type="text" value="{{ old('current_price') }}" class="form-control"
                                   name="current_price">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="file">
                        </div>

                        <div class="form-group">
                            <label>Short description</label>
                            <textarea value="{{ old('short_description') }}" class="form-control" name="short_description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Long description</label>
                            <textarea value="{{ old('short_description') }}" class="form-control" name="long_description"></textarea>
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