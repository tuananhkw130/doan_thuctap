@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Số sản phẩm</h5>
                                    <span class="badge badge-primary">Hôm nay</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $totalProducts }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <p class="mb-0">Total Revenue</p>
                                    <span class="text-primary">65%</span>
                                </div>
                                <div class="iq-progress-bar bg-primary-light mt-2">
                                    <span class="bg-primary iq-progress progress-1" data-percent="65"
                                        style="transition: width 2s; width: 65%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Số đơn hàng</h5>
                                    <span class="badge badge-warning">Anual</span>
                                </div>
                                <h3><span class="counter" style="visibility: visible;">{{ $totalOrders }}</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <p class="mb-0">Total Revenue</p>
                                    <span class="text-warning">35%</span>
                                </div>
                                <div class="iq-progress-bar bg-warning-light mt-2">
                                    <span class="bg-warning iq-progress progress-1" data-percent="35"
                                        style="transition: width 2s; width: 35%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Cost</h5>
                                    <span class="badge badge-success">Today</span>
                                </div>
                                <h3>$<span class="counter" style="visibility: visible;">33000</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <p class="mb-0">Total Revenue</p>
                                    <span class="text-success">85%</span>
                                </div>
                                <div class="iq-progress-bar bg-success-light mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="85"
                                        style="transition: width 2s; width: 85%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Profit</h5>
                                    <span class="badge badge-info">Weekly</span>
                                </div>
                                <h3>$<span class="counter" style="visibility: visible;">2500</span></h3>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <p class="mb-0">Total Revenue</p>
                                    <span class="text-info">55%</span>
                                </div>
                                <div class="iq-progress-bar bg-info-light mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="55"
                                        style="transition: width 2s; width: 55%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="card border-bottom shadow-none mb-0">
                            <div class="card-body text-center inln-date flet-datepickr">
                                <input type="text"
                                    id="inline-date"class="date-input basicFlatpickr d-none flatpickr-input"
                                    readonly="readonly">
                                <div class="flatpickr-calendar animate inline" tabindex="-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
