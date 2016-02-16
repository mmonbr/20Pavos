<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">
        <li class="@if($provider->name() == 'standard') active @endif">
            <a href="#standard" aria-controls="#standard" role="tab" data-toggle="tab">Standard</a>
        </li>
        <li class="@if($provider->name() == 'amazon') active @endif">
            <a href="#amazon" aria-controls="#amazon" role="tab" data-toggle="tab"><i class="fa fa-amazon"></i></a>
        </li>
        <li class="pull-left header"><i class="fa fa-th"></i> Provider</li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane @if($provider->name() == 'standard') active @endif" id="standard">
            <form method="POST" role="form" action="{{ route('admin.products.provider.store', [$product->id]) }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Affiliate Link</label>
                            <input name="affiliate_link" type="text" class="form-control" value="{{ $provider->affiliate_link }}">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="provider" value="Standard">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane @if($provider->name() == 'amazon') active @endif" id="amazon">
            <form method="POST" role="form" action="{{ route('admin.products.provider.store', [$product->id]) }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ASIN</label>
                            <input name="ASIN" type="text" class="form-control" value="{{ $provider->ASIN }}">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="provider" value="Amazon">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>