@extends('layout.admin_dashboard')

@section('style')

@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-primary-light rounded w-60 h-60">
                        <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Total Employee</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $employeeCount }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-warning-light rounded w-60 h-60">
                        <i class="fa fa-motorcycle me-3"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Total Active Products</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $ActiveProductsCount }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-info-light rounded w-60 h-60">
                        <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Pending Customer Services</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $approvedTasksCount }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-light rounded w-60 h-60">
                        <i class="text-white mr-0 font-size-24 mdi mdi-chart-line"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Total Service Done</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $doneTasksCount }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-primary-light rounded w-60 h-60">
                        <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Total Bookings</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $bookingsCount }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-warning-light rounded w-60 h-60">
                        <i class="fa fa-motorcycle me-3"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Total Deactive Products</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $DeactiveProductsCount }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-info-light rounded w-60 h-60">
                        <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Undone Customer Services</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $undoneTasksCount }} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-light rounded w-60 h-60">
                        <i class="text-white mr-0 font-size-24 mdi mdi-chart-line"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Total Available Services</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ $servicesCount }} </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-xl-6 col-12">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="box overflow-hidden">
                        <div class="box-body pb-0">
                            <div>
                                <h2 class="text-white mb-0 font-weight-500">{{ $userCount }}</h2>
                                <p class="text-mute mb-0 font-size-20">Total users</p>
                            </div>
                        </div>
                        <div class="box-body p-0">
                            <div id="revenue1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="box overflow-hidden">
                        <div class="box-body pb-0">
                            <div>
                                <h2 class="text-white mb-0 font-weight-500">{{ $earningsOfCurrentMonth }} tk</h2>
                                <p class="text-mute mb-0 font-size-20">Total Earnings From Servicing</p>
                            </div>
                        </div>
                        <div class="box-body p-0">
                            <div id="revenue2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box bg-info bg-img" style="background-image: url(/BackTheme/images/bg-1.png)">
                <div class="box-body text-center">
                    <img src="/BackTheme/images//trophy.png" class="mt-50" alt="" />
                    <div class="max-w-500 mx-auto">
                        <h2 class="text-white mb-20 font-weight-500">Best Employee {{ $bestEmployee->name }}.</h2>
                        <p class="text-white-50 mb-10 font-size-20">This employee has completed most tasks. Total completed {{ $bestEmployee->task_count }} tasks.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<script src="/BackTheme/assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="/BackTheme/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
<script src="/BackTheme/js/pages/dashboard.js"></script>
@endsection
