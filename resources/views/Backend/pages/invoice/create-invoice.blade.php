@extends('Backend.layouts.app')

@section('admin_content')
    <style>
        .select2.select2-container {
            width: 230px !important;
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

                    <h4 class="text-themecolor">Create Invoice</h4>


                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('invoices') }} ">Invoices</a></li>
                            <li class="breadcrumb-item active">Create Invoice</li>

                        </ol>

                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">

                            <form id="invoice_form'" action="{{ route('store.invoice') }} " method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="container">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Select Client <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control custom-select  js-client-example-ajax"
                                                            id="inv_client" aria-placeholder="Search for Client" required
                                                            name="client_id">
                                                        </select>
                                                    </div>

                                                </div>

                                                <!--/span-->
                                                <div class="col-md-8">
                                                    <div class="row date-sty">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Invoice Date <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control mydatepicker"
                                                                        name="invoice_date" placeholder="Invoice Date"
                                                                        data-validation-required-message="Invoice Date is required">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i
                                                                                class="icon-calender"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block ml-1 ">
                                                                    <ul role="alert"></ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group ">
                                                                <label class="control-label">Due Date <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control mydatepicker"
                                                                        name="due_date" placeholder="Due Date"
                                                                        data-validation-required-message="Due Date is required">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i
                                                                                class="icon-calender"></i></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--/span-->

                                                </div>
                                                <!--/row-->
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">

                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <div class="col-md-8">
                                                        <div class="row sty-format">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Invoice Number <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="invoice_number"
                                                                        placeholder="# INV-0001" value="INV-0001"
                                                                        class="form-control" required
                                                                        data-validation-required-message="Invoice Date is required">
                                                                    <div class="help-block ml-1 ">
                                                                        <ul role="alert"></ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Select Customer <span
                                                                            class="text-danger">*</span></label>
                                                                    <select
                                                                        class="form-control custom-select  js-customer-example-ajax"
                                                                        id="inv_customer"
                                                                        aria-placeholder="Search for customer" required
                                                                        name="customer_id">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->

                                                    </div>
                                                    <!--/row-->
                                                </div>

                                                <div class="row">
                                                    <table id="dynamic_form" style="width: 100%; margin-right: 45px;"
                                                        class="mar-top">
                                                        <thead>
                                                            <tr>

                                                                <th style="width: 30%" class="">Item</th>
                                                                <th style="width: 10%">Quantity</th>
                                                                <th style="width: 10%">Unit Cost</th>
                                                                <th style="width: 10%; margin-left:-8px;">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="item"><input type="text"
                                                                        name="product_name[] " class="form-control mx-2 "
                                                                        required
                                                                        data-validation-required-message="Item is required"
                                                                        placeholder="Enter product"><input type="textarea"
                                                                        name="short_description[]"
                                                                        class="form-control mx-2"
                                                                        placeholder="Short description"></td>
                                                                <td><input type="number" name="quantity[]"
                                                                        step="1" value="1" placeholder="1"
                                                                        class="form-control space-sty">
                                                                </td>
                                                                <td><input type="number" name="unit_cost[]"
                                                                        step='0.01' value='0.00' placeholder='0.00'
                                                                        class="form-control space-sty ">
                                                                </td>
                                                                <td><input type="number" readonly name="amount[]"
                                                                        class="form-control space-sty ">

                                                                    <span class="remove "> <i
                                                                            class="fa fa-trash icon-sty"></i></span>
                                                                </td>

                                                            </tr>




                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="add-btn">

                                                        <button type="button" name="add" id="add"
                                                            class="btn btn-block btn-lg btn-success mt-4">Add Item</button>
                                                    </div>
                                                </div>

                                                <div class="total-results">

                                                    <div class="col-md-4">
                                                        <div class=" total-sty">
                                                            <label class="control-label">SUB TOTAL</label>
                                                            <input type="number" readonly name="sub_total"
                                                                class="form-control input-sty">

                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-4">
                                                        <div class=" total-sty ">
                                                            <label class="control-label">DISCOUNT </label>
                                                            <input type="number" step='0.01' value='0.00'
                                                                placeholder='0.00' name="discount"
                                                                class="form-control input-sty">

                                                        </div>

                                                    </div> --}}
                                                    {{-- <div class="col-md-4">
                                                        <div class="total-sty ">
                                                            <label class="control-label">TAX %</label>
                                                            <input type="number" name="tax" step='0.01'
                                                                value='0.00' placeholder='0.00'
                                                                class="form-control input-sty">
                                                            <input type="hidden" name="totalAterTax">
                                                        </div>

                                                    </div> --}}

                                                    <div class="col-md-4">
                                                        <div class="total-sty ">
                                                            <label class="control-label">TOTAL AMOUNT</label>
                                                            <input type="number" readonly name="total_amount"
                                                                class="form-control input-sty">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions mt-3">
                                                <div class="col-lg-2 col-md-4">
                                                    <button type="submit" class="btn btn-block btn-lg btn-info"> <i
                                                            class="fa fa-check"></i> Save</button>
                                                </div>
                                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <script src="{{ asset('backend/dist/js/custom-pages/invoices.js') }} "></script>
        @endsection
