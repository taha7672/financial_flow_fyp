

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
                    <h4 class="text-themecolor">Discount </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item active">Discount</li>
                        </ol>
                        @can('Apply Discount')
                        <a href="{{ route('create.discount') }} " target="_blank">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Create New</button>
                        </a>
                        @endCan
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- table-striped table-bordered --}}
                            <table  class="table"   id="dataTableDiscount"  style="width: 99%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Client Name</th>
                                        <th>Customer Name</th>
                                       <th>Invoice Number</th>
                                       <th>Invoice Amount</th>
                                       <th>Discount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body">
                                </tbody>
                            </table>
                        </div>
                        <div id="pagination"></div>
                    </div>
                </div>
            </div>
            <script src="{{asset('backend/dist/js/custom-pages/discount.js')}} "></script>

        @endsection


        