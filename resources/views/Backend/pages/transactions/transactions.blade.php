

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
                <h4 class="text-themecolor">Transactions </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item active">Transaction</li>
                    </ol>
                    <a href="{{route('create.transaction')}} ">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </a>
                </div>
            </div>
        </div>

<div class="col-12 mt-5">
  <a href="{{route('payout.page')}} "> <button type="button" class="btn btn-info d-none d-lg-block m-l-15 mb-4">Payout to Bank</button> </a> 

    <div class="card">
        
        <div class="card-body">
       
            <div class="table-responsive">
                <table id="myTable" class="table" style="width: 99%;">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Customer</th>
                            <th>Invoice Number</th>
                            <th>Invoice Amount</th>
                            <th>Paid Amount</th>
                            <th>Paid Status</th>
                            <th>Invoice Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $transaction)
                  
                        <tr>
                            <td><span class="text-muted"><i class="fa fa-clock-o"></i>{{dateformat($transaction->payment_date)}} </span> </td>
                            <td>{{$transaction->invoice->client->first_name??''}} </td>
                            <td>{{$transaction->invoice->customer->name??''}} </td>
                            <td><a href="{{route('inv.details', ['inv_uinque_key'=> $transaction->invoice->inv_uinque_key])}}" target="_blank" class="text-center"> {{$transaction->invoice_number??''}} </a></td>
                            <td>{{$transaction->invoice->inv_total_amount??''}} </td>
                            <td>{{$transaction->total_amount??''}} </td>
                            <td>
                                @if ($transaction->invoice->paid_status ??'' == 1)
                                <span class="label label-table label-success">Paid</span>
                                    
                                @else
                                <span class="label label-table label-danger">Unpaid</span>
                                    
                                @endif
                               
                            </td>
                            <td>
                                @if ($transaction->invoice->status ??'' == 1)
                                <span class="label label-table label-success">Active</span>
                                    
                                @else
                                <span class="label label-table label-danger">Inactive</span>
                                    
                                @endif
                            </td>
                           
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Action</button>
                                    <button type="button"
                                    class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only"></span>
                                </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item "    href="{{ URL::to('admin/transaction/edit/' . $transaction->id) }}" 
                                            id="edit" style="cursor: pointer;">Edit</a>
                                        <a class="dropdown-item " data-id="{{ $transaction->id }}"
                                            id="delete" style="cursor: pointer;">Delete</a>

                                    </div>
                                    </button>
                                    
                                </div>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('backend/dist/js/custom-pages/transaction.js')}} "></script>

@endsection
