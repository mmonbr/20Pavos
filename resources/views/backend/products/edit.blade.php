@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form enctype='multipart/form-data' method="POST" action="{{ route('admin.products.update', [$product->id]) }}"
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
                                    <input type="text" value="{{ old('name', $product->name) }}" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    {!! app('App\Utilities\NestedSelect')->name('categories[]')->categories($categories_list)->selected($product->categoriesList())->multiple()->render() !!}
                                </div>

                                <div class="form-group">
                                    <label>Referral Link</label>
                                    <input type="text" value="{{ old('referral_link', $product->referral_link) }}" class="form-control"
                                           name="referral_link">
                                </div>

                                <div class="form-group">
                                    <label>ASIN (Amazon only)</label>
                                    <input type="text" value="{{ old('ASIN', $product->ASIN) }}" class="form-control"
                                           name="ASIN">
                                </div>

                                <div class="form-group">
                                    <label>Price (in cents)</label>
                                    <input type="text" value="{{ old('current_price', $product->current_price) }}" class="form-control"
                                           name="current_price">
                                </div>

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
                                                    <input type="checkbox" @if(old('featured', $product->is_featured)) checked
                                                           @endif name="featured" value="1"> Check
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Current image</label>
                                        <img src="{{ cdn_file($product->image_url) }}" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Short description</label>
                                    <textarea class="form-control"
                                      name="short_description">{{ old('short_description', $product->short_description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Long description</label>
                                    <textarea class="form-control"
                                      name="long_description">{{ old('long_description', $product->long_description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection