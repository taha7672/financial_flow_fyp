@extends('Backend.layouts.app')
@section('admin_content')
<style>
    .clear-all-btn{
        float: right;
        color: #007bff;
        padding: 5px;
        cursor: pointer;
        margin-left: 5px;
    }
    .filters{
        border: 1px solid #e0e0e0;
        padding: 10px;
        border-radius: 5px;
        background-color: rgb(237, 237, 237);
    }
    .filter-btn{
        margin-bottom: 10px;
        padding: 10px;
        float: right;

    }
</style>
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
                    <h4 class="text-themecolor">Receivables</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item active">Receivables</li>
                        </ol>
                        {{-- <a href="#">
                  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
              </a> --}}
                    </div>
                </div>
                
            </div>
            <div class="row">
        <div class="col-12">

            
            <div class="filter-btn-section mr-3">
                <button id="filter-btn" class="btn waves-effect waves-light btn-info filter-btn"><i class=" fas fa-filter"></i> Filter</button>

            </div>
        </div>
        </div>
            <div class="col-12 ">

                <div class="card">

                    <div class="filters ml-2 mt-2">
                        <span class="clear-all-btn" id="reset-filter">Clear All</span>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <div class="input-group">
                                    <input type="text" class="form-control mydatepicker"name="start_date" id="start_date" placeholder="Start Date" >
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <div class="input-group">
                                    <input type="text" class="form-control mydatepicker"name="end_date" id="end_date" placeholder="End Date" >
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="client">Select Client</label> <br>
                                    <select class="form-control custom-select js-client-example-ajax" id="client"  aria-placeholder="Search for Client" required name="client_id">   
                                     </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="customer">Select Customer</label> <br>
                                    <select class="form-control custom-select  js-customer-example-ajax" id="customer"
                                    aria-placeholder="Search for customer" required name="customer_id">
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="customer">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option selected value="-1">Select Status</option>
                                        <option value="PAID">PAID</option>
                                        <option value="UNPAID">UNPAID</option>
                                        {{-- <option value="PARPAID">PARTIALLY PAID</option> --}}
                                     
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button id="apply-filter" class="btn waves-effect waves-light btn-info filter-btn"><i class=" fas fa-filter"></i>Apply Filters</button>

                    </div>

                    <ul class="nav nav-tabs customtab mt-3" role="tablist">
                       
                        <li class="nav-item unpaid-tab" data-id="unpaid">
                            <a class="nav-link unpaid-a" data-toggle="tab" href="#unpaid" role="tab">
                              <span class="hidden-xs-down">UnPaid</span>
                            </a>
                          </li>
                          <li class="nav-item paid-tab" data-id="paid">
                            <a class="nav-link" data-toggle="tab" href="#paid" role="tab">
                              <span class="hidden-xs-down">Paid</span>
                            </a>
                          </li>
                          <li class="nav-item all-tab" data-id="all">
                            <a class="nav-link all-a" data-toggle="tab" href="#all" role="tab">
                              <span class="hidden-xs-down">All</span>
                            </a>
                          </li>

                    </ul>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="receivableTable" class="table" style="width: 99%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Customer</th>
                                        <th>Invoice Number</th>
                                        <th>Due Amount</th>     
                                        <th>Paid Status</th>
                                        <th>Invoice Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{ asset('backend/dist/js/custom-pages/receivable.js') }} "></script>
        @endsection
