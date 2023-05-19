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
                    @isset($admin)
                        <h4 class="text-themecolor">Edit Admin User</h4>
                    @else
                        <h4 class="text-themecolor">Create Admin User</h4>
                    @endisset

                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admins') }} ">Admin User</a></li>
                            @isset($admin)
                                <li class="breadcrumb-item active">Edit Admin User</li>
                            @else
                                <li class="breadcrumb-item active">Create Admin User</li>
                            @endisset



                        </ol>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <style>

            </style>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @isset($admin)
                                <form novalidate action="{{ route('update.admin', $admin->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                @else
                                    <form novalidate action="{{ route('store.admin') }}" method="POST"
                                        enctype="multipart/form-data">
                                    @endisset
                                    @csrf

                                    <div class="form-body ">
                                        <div class="container">


                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control" required
                                                            data-validation-required-message="Name is required"
                                                            @isset($admin) value="{{ $admin->name }}" @endisset>
                                                        <div class="help-block ml-1 ">
                                                            <ul role="alert"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label">Profile Pic <span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" name="image" class="form-control"
                                                            @isset($admin)
                                                           value="{{ $admin->image }}"
                                                              @else
                                                              required
                                                              data-validation-required-message="Profile Pic is required"
                                                           @endisset>
                                                        <div class="help-block ml-1 ">
                                                            <ul role="alert"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone <span
                                                                class="text-danger">*</span></label>
                                                        <input type="phone" name="phone" class="form-control" required
                                                            data-validation-required-message="Phone is required"
                                                            @isset($admin) value="{{ $admin->phone }}" @endisset>
                                                        <div class="help-block ml-1 ">
                                                            <ul role="alert"></ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control" required
                                                            data-validation-required-message="Email is required"
                                                            @isset($admin) value="{{ $admin->email }}" @endisset>
                                                        <div class="help-block ml-1 ">
                                                            <ul role="alert"></ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                               
                                               
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Password <span
                                                                class="text-danger">*</span></label>
                                                        <input type="password" name="password" class="form-control"
                                                            @isset($admin)
                                                          @else
                                                          required data-validation-required-message="Password is required"
                                                          @endisset>
                                                        <div class="help-block ml-1 ">
                                                            <ul role="alert"></ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label">Confirm Password <span
                                                                class="text-danger">*</span></label>
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control"
                                                            @isset($admin)
                                                             @else
                                                             required   data-validation-required-message="Confirm Password is required"
                                                             @endisset>
                                                        <div class="help-block ml-1 ">
                                                            <ul role="alert"></ul>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-2 ">
                                                            <label class="control-label">Role Name <span
                                                                    class="text-danger">*</span></label>
                                                            <span class="role-sty">
                                                                <select
                                                                    class="form-control custom-select  js-data-role-ajax"
                                                                    aria-placeholder="Search for Role" required
                                                                    data-validation-required-message="Role Name is required"
                                                                    name="role_id">
                                                                    @isset($admin)
                                                                        <option selected value="{{ $admin->role_id }}">
                                                                            {{ $admin->role->name }}</option>
                                                                    @endisset
                                                                </select>
                                                            </span>
                                                            <div class="help-block ml-1 ">
                                                                <ul role="alert"></ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--/row-->

                                            <div class="form-actions mt-3">
                                                <div class="col-lg-2 col-md-4">
                                                    <button type="submit" class="btn btn-block btn-lg btn-info"> <i
                                                            class="fa fa-check"></i> Save</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                </form>

                        </div>
                    </div>
                </div>
                <!-- Row -->

                <script src="{{ asset('backend/dist/js/pages/validation.js') }} "></script>
                <script>
                    ! function(window, document, $) {
                        "use strict";
                        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
                    }(window, document, jQuery);
                </script>
            @endsection
            <script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>

            <script>
                $(function() {
                    // init select2 
                    var token = $("meta[name='csrf-token']").attr("content");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.js-data-role-ajax').select2({
                        placeholder: 'Search for Role',
                        ajax: {
                            method: 'POST',

                            url: '/admin/user-role/search',
                            dataType: 'json',
                        },

                    });


                });
            </script>
