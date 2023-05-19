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
                <h4 class="text-themecolor">Customers </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                    <a href="{{route('create.customer')}} ">
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                </a>
                </div>
            </div>
        </div>

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
  
            <div class="table-responsive">
                <table  id="myTable" class="table">
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td> <img src="{{asset('storage/images/customers/'.$customer->profile_image)}}"  alt="customer profile" style="width: 60px; height:60px;"></td>
                            <td style="width: 14%;">{{$customer->name}} </td>
                            <td>{{$customer->phone}} </td>
                            <td>{{$customer->email}} </td>
                            <td>{{$customer->address}} </td>
                            <td class="toggle_warp"> <input type="checkbox" name="status" class="toggle-class" data-id="{{ $customer->id }}" data-toggle="toggle" data-offstyle="btn btn-danger" data-onstyle="btn btn-success" data-on="Active" data-off="Inactive" {{ $customer->status == true ? 'checked' : ''}}></td>

                          
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Action</button>
                                    <button type="button"
                                        class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ URL::to('admin/edit-customer/' . $customer->id) }}">Edit</a>
                                        <a class="dropdown-item " data-id="{{ $customer->id }}"
                                            id="delete" style="cursor: pointer;">Delete</a> 

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
<script src="{{asset('backend/dist/js/custom-pages/customers.js')}} "></script> 

@endsection
