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
                    <h4 class="text-themecolor">Account Setting</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item active">Account Setting</li>
                           
                        </ol>

                        {{-- <a href="{{ route('create.userRole') }} ">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"
                                data-target="#responsive-modal"><i class="fa fa-plus-circle"></i> Create New</button>
                        </a> --}}

                  
                    </div>
                </div>
            </div>
            
            
        </div>
    @endsection

