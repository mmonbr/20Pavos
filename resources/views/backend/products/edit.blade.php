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
                                    <input type="text" value="{{ old('name', $product->name) }}"
                                           class="form-control"
                                           name="name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    {!! app('App\Utilities\NestedSelect')->name('categories[]')->categories($categories_list)->selected($product->categoriesList())->multiple()->render() !!}
                                </div>

                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" value="{{ old('link', $product->getOriginal('link')) }}"
                                           class="form-control"
                                           name="link">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
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

            <div class="row">
                <div class="col-md-10">
                    @include('backend.products.partials._attachments', ['attachments' => $product->getMedia('attachments')])
                </div>
                <div class="col-md-2">
                    <div class="box box-">
                        <div class="box-header">
                            <h3 class="box-title">Product options</h3>
                        </div>
                        <div class="box-body">
                            @if($product->published())
                                <form method="POST"
                                      action="{{ route('admin.products.publish', [$product->id]) }}"
                                      class="inline">
                                    {{ method_field('patch') }}

                                    {{ csrf_field() }}
                                    <button class="btn btn-app"><i class="fa fa-play"></i> Publish</button>
                                </form>
                            @else
                                <form method="POST"
                                      action="{{ route('admin.products.unpublish', [$product->id]) }}"
                                      class="inline">
                                    {{ method_field('delete') }}

                                    {{ csrf_field() }}
                                    <button class="btn btn-app"><i class="fa fa-pause"></i> Unpublish</button>
                                </form>
                            @endif

                            <form method="POST"
                                  action="{{ route('admin.products.destroy', [$product->id]) }}"
                                  class="inline">
                                {{ method_field('delete') }}

                                {{ csrf_field() }}
                                <button class="btn btn-app"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection