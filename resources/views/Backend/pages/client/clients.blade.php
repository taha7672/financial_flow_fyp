@extends('Backend.layouts.app')



  @section('admin_content')
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">  
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Clients </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item active">Clients</li>
                    </ol>
                    @can('Create Clients')
                    <a href="{{route('create.client')}} " target="_blank">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </a>
                @endCan
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
                            <th>Name</th>
                            <th>Coustomers</th>  <!-- click to show list  -->
                            <th>Total Invoices</th> <!-- click to show list  -->
                            <th>Completed Invoices</th> <!-- click to show list  -->
                            <th>Pending Invoices</th> <!-- click to show list  -->
                            <th><span class="hovertext" data-hover="Plan Title / Expire Date">Exp Date</span></th>
                            {{-- <th>Status</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        @foreach ($clients as $client)
                        <tr>
                            <td style="width: 17%;">{{$client->first_name}} </td>
                            <td><a href="{{route('customers', ['client_id' => $client->id])}}" target="_blank" class="text-center">{{$client->customers->count()}} </a></td>
                            <td><a href="{{route('invoices', ['client_id'=>$client->id , 'inv_status'=> 'all' ])}}" target="_blank" class="text-center">{{$client->invoices->count()}} </a></td>
                            <td><a href="{{route('invoices', ['client_id'=>$client->id , 'inv_status'=> 'paid' ])}}"target="_blank" class="text-center">{{$client->invoices->where('paid_status',1)->count()}} </a></td>
                            <td><a href="{{route('invoices', ['client_id'=>$client->id , 'inv_status'=> 'unpaid' ])}}" target="_blank" class="text-center">{{$client->invoices->where('paid_status', 0)->count()}}</a></td>
                            <td>14 Oct</td>
                            {{-- <td> <input type="checkbox" name="status" class="toggle-class" data-id="{{ $client->id }}" data-toggle="toggle" data-offstyle="btn btn-danger" data-onstyle="btn btn-success" data-on="Active" data-off="Inactive" {{ $client->status == true ? 'checked' : ''}}></td> --}}

                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Action</button>
                                    <button type="button"
                                        class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        @can('Edit Clients')
                                        <a class="dropdown-item"
                                            href="{{ URL::to('admin/edit-plan/' . $client->id) }}">Edit</a>
                                        @endCan
                                        @can('Delete Clients')
                                        <a class="dropdown-item " data-id="{{ $client->id }}"
                                            id="delete" style="cursor: pointer;">Delete</a>
                                        @endCan
                                    </div>
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
  <script src="{{asset('backend/dist/js/custom-pages/clients.js')}} "></script>
@endsection


