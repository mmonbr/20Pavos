@extends('backend.layouts.main')

@section('title', 'Editing a product')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form enctype='multipart/form-data' method="POST"
                      action="{{ route('admin.products.update', [$product->id]) }}"
                      role="form">

                    {{ method_field('patch') }}
                    {{ csrf_field() }}

                    <div class="box-header with-border">
                        <h3 class="box-title">Editing Product</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ old('name', $product->name) }}" class="form-control"
                                           name="name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    {!! app('App\Utilities\NestedSelect')->name('categories[]')->categories($categories_list)->selected($product->categoriesList())->multiple()->render() !!}
                                </div>

                                <div class="form-group">
                                    <label>Price (in cents)</label>
                                    <input type="text" value="{{ old('price', $product->price) }}"
                                           class="form-control"
                                           name="price">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="3" class="form-control"
                                              name="description">{{ old('description', $product->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Video URL</label>
                                    <input type="text" value="{{ old('video_url', $product->video_url) }}"
                                           class="form-control"
                                           name="video_url">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="file">
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <p>
                                                    <strong>Feature this product</strong>
                                                </p>
                                                <label>
                                                    <input type="checkbox"
                                                           @if(old('featured', $product->featured)) checked
                                                           @endif name="featured" value="1"> Check
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Current image</label>
                                        <img src="{{ cdn_file($product->image_path) }}" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>

            @include('backend.products.partials._provider', ['provider' => $product->provider, 'product' => $product])
            @include('backend.products.partials._attachments', ['attachments' => $product->attachments])
        </div>
    </div>
@endsection