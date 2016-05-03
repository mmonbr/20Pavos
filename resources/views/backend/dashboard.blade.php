@extends('backend.layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $productsCount }}</h3>

                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $subscribersCount }}</h3>

                    <p>Subscribers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-email"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>

                    <p>Registered Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $visitors }}</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-line-chart"></i>
                Unique Users VS Page Views
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <dashboard-graph
                        :keys="{{ $dashboardGraph->keys() }}"
                        :visitors="{{ $dashboardGraph->pluck('visitors') }}"
                        :pageviews="{{ $dashboardGraph->pluck('pageViews') }}"
                >
                </dashboard-graph>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection

@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endpush