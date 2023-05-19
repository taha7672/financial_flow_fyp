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
                <h4 class="text-themecolor">Invoices </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item active">Invoices</li>
                    </ol>
                    @can('Create Invoices')
                    <a href="{{route('create.invoice')}} "   target="_blank">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                   </a>
                     @endCan

                </div>
            </div>
        </div>
       
    </div>
       <style>
        .inv-filter{
     display: flex;
        justify-content:flex-start;
        align-items: center;
        width: 100%;
        
        }
        .filter{
            width: 300px;
        }
        .filter-btn{
           
            float: right;
            margin-right: 15px;
        }
        .mar-lab{
            margin-left: 10px;
            /* bold font  */
            font-weight: 400;
        }
        .s-invoice{
            width: 180px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;

        }
        .filter-btn{
            margin-top: 20px;
        }
        .table{
            width: 100%;
        }
    
        </style>       


    <div class="card">
        <div class="card-body col-md-12 row">
          
            
          <div class="col-md-4 filter"> 
            <label class="control-label mar-lab">Filter by Client </label>
            <div class="col-md-5 ">
                <select class=" custom-select  js-client-example-ajax"
                name="client_id" id="sel_client">
            </select>
        </div>
        </div>
          <div class="col-md-4 filter"> 
            <label class="control-label mar-lab">Filter by Customer </label>
            <div class="col-md-5 align-self-center">
                <select class="form-control  js-customer-example-ajax"
                 name="customer_id" id="sel_customer">
            </select>
        </div>
    </div>
          <div class="col-md-3 filter"> 
            {{-- <label class="control-label mar-lab">Search Inv Number</label>
            <div class="col-md-5 align-self-center">
               <input type="text" class="form-control s-invoice" value="" id="searchInvoiceNumber" name="invoice_number">
            </select>
        </div> --}}
       
        </div>
        <div class="filter-btn">
      
            <button type="button" id="reset" class="btn waves-effect waves-light btn-danger">Reset</button>
        </div>

        </div>
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTableInvoice" style="width: 99%" >
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Customer</th>
                            <th>Invoice Number</th>
                            <th>Invoice Amount</th>
                            <th>Paid Status</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- hidden input --}}
<input type="hidden" id="client_id" value="{{ request()->query('client_id') }}">
{{-- status  --}}
<input type="hidden" id="inv_status" value="{{ request()->query('inv_status') }}">





<script src="{{asset('backend/dist/js/custom-pages/invoices.js')}} "></script> 


@endsection
