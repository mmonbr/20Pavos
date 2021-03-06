@extends('backend.layouts.main')

@section('title', 'New product')

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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    {!! app('App\Utilities\NestedSelect')->name('categories[]')->categories($categories_list)->selected(old('categories', []))->multiple()->render() !!}
                                </div>

                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" value="{{ old('link') }}"
                                           class="form-control"
                                           name="link">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" value="{{ old('price') }}" class="form-control"
                                           name="price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"
                                              name="description">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Video URL</label>
                                    <input type="text" value="{{ old('video_url') }}"
                                           class="form-control"
                                           name="video_url">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <p>
                                                    <strong>Feature this product</strong>
                                                </p>
                                                <label>
                                                    <input type="checkbox" @if(old('featured')) checked
                                                           @endif name="featured"> Check
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection