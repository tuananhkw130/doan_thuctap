@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
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

            <div class="col-xl-4">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="card border-bottom pb-2 shadow-none">
                            <div class="card-body text-center inln-date flet-datepickr">
                                <input type="text" id="inline-date"
                                    class="date-input basicFlatpickr d-none flatpickr-input" readonly="readonly">
                                <div class="flatpickr-calendar animate inline" tabindex="-1">
                                    <div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                                                <g></g>
                                                <path
                                                    d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
                                                </path>
                                            </svg></span>
                                        <div class="flatpickr-month">
                                            <div class="flatpickr-current-month"><select
                                                    class="flatpickr-monthDropdown-months" aria-label="Month"
                                                    tabindex="-1">
                                                    <option class="flatpickr-monthDropdown-month" value="0"
                                                        tabindex="-1">January</option>
                                                    <option class="flatpickr-monthDropdown-month" value="1"
                                                        tabindex="-1">February</option>
                                                    <option class="flatpickr-monthDropdown-month" value="2"
                                                        tabindex="-1">March</option>
                                                    <option class="flatpickr-monthDropdown-month" value="3"
                                                        tabindex="-1">April</option>
                                                    <option class="flatpickr-monthDropdown-month" value="4"
                                                        tabindex="-1">May</option>
                                                    <option class="flatpickr-monthDropdown-month" value="5"
                                                        tabindex="-1">June</option>
                                                    <option class="flatpickr-monthDropdown-month" value="6"
                                                        tabindex="-1">July</option>
                                                    <option class="flatpickr-monthDropdown-month" value="7"
                                                        tabindex="-1">August</option>
                                                    <option class="flatpickr-monthDropdown-month" value="8"
                                                        tabindex="-1">September</option>
                                                    <option class="flatpickr-monthDropdown-month" value="9"
                                                        tabindex="-1">October</option>
                                                    <option class="flatpickr-monthDropdown-month" value="10"
                                                        tabindex="-1">November</option>
                                                    <option class="flatpickr-monthDropdown-month" value="11"
                                                        tabindex="-1">December</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Page end  -->
                </div>
            @endsection
