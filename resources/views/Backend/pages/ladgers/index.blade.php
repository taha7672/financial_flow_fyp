

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
              <h4 class="text-themecolor">Ladgers</h4>
          </div>
          <div class="col-md-7 align-self-center text-right">
              <div class="d-flex justify-content-end align-items-center">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                      <li class="breadcrumb-item active">Ladgers</li>
                  </ol>
               
              </div>
          </div>
      </div>

<div class="col-12 mt-5">

  <div class="card">
      
      <div class="card-body">
     
          <div class="table-responsive">
              <table id="myTable" class="table" style="width: 99%">
                  <thead>
                      <tr>
                          <th>Date</th>
                          <th>Client</th>
                          <th>Customer</th>
                          <th>Invoice Number</th>
                          <th>Type</th>
                          <th>Credit</th>
                          <th>Debit</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($ledgers as $ledger)
                    <tr>
                        <td>{{$ledger->created_at}}</td>
                        <td>{{$ledger->client->last_name}} </td>
                        <td>{{$ledger->customer->name}}</td>
                        <td>{{$ledger->invoice->invoice_number}}</td>
                        <td>{{$ledger->type}} </td>
                        <td>{{$ledger->credit}} </td>
                        <td>{{$ledger->debit}} </td>
                        <td>Action</td>


                    </tr>
                        
                    @endforeach


                     
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
<script src="{{asset('backend/dist/js/custom-pages/ledgers.js')}} "></script>

@endsection
