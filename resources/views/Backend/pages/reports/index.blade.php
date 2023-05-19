@extends('Backend.layouts.app')



@section('admin_content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Reports</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                        {{-- <a href="{{route('create.transaction')}} ">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </a> --}}
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label>Start Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker"name="start_date" id="start_date" placeholder="Start Date" >
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                 
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <label>End Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker"name="end_date" id="end_date" placeholder="End Date" >
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Report Type</label>
                                <div class="controls">
                                    <select class="form-control select2 " name="report_type" id="report_type"
                                        style="width: 100%">
                                            <option value="ByClient">By Client</option>
                                            <option value="ByCustomer">By Customer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                            
                
                        <div class="row mt-3">
                            @can('Ledger Reports')
                                <div class="col-md-2">
                                    <button class="btn waves-effect waves-light btn-success"  onclick="PaymentLadger()" style="width: 170px;" >
                                        Payment Ledger 
                                    </button>
                                </div>
                                @endcan
                                @can('Discount Report')
                                <div class="col-md-2">
                                    <button class="btn waves-effect waves-light btn-success" onclick="DiscountLadger()" style="width: 170px;" >
                                        Discount Ledger 
                                    </button>
                                </div>
                                @endcan
                      
                        </div>



                    </div>
                </div>
            </div>
            <script src="{{ asset('backend/dist/js/custom-pages/reports.js') }} "></script>
        @endsection
