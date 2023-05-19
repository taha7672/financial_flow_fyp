@extends('Backend.layouts.app')
@section('admin_content')
    <style>
        .form-sty {
            width: 95%;
            margin: auto;

        }

        .checkbox-sty {
            width: 65%;
            display: flex;
            justify-content: space-between;
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
                    @isset($role)
                        <h4 class="text-themecolor">Edit User Role </h4>
                    @else
                        <h4 class="text-themecolor">Create User Roles</h4>
                    @endisset






                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admins') }} ">User Roles</a></li>
                            @isset($role)
                                <li class="breadcrumb-item active">Edit User Role</li>
                            @else
                                <li class="breadcrumb-item active">Create User Roles</li>
                            @endisset




                        </ol>
                    </div>
                </div>
            </div>
            <!-- Row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-sty">
                                @isset($role)
                                    <form novalidate action="{{ route('update.userRole', $role->id) }} " method="POST">
                                    @else
                                        <form novalidate action="{{ route('store.userRole') }}" method="POST">
                                        @endisset
                                        @csrf

                                        <div class="row ">
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="control-label">Role Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="role_name" class="form-control" required
                                                        data-validation-required-message="Role Name is required"
                                                        @isset($role)
                                                        value="{{ $role->name }}" @endisset>
                                                    <div class="help-block ml-1 ">
                                                        <ul role="alert"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Permissions</h4>
  {{-- ### NOTE: TO ADD NEW PERMISSION YOU HAVE TO ADD PERMISSION IN DATABASE PERMISSION TABLE AND THEN ASSIN THAT PERMISSION TO A ADMIN USER ## --}}

                                                <div class="row">
                                                @foreach ($permissions_name as $item)
                                                    <div class="col-md-4">
                                                        <div class="form-group checkbox-sty checkbox-sty">
                                                            <label class="control-label mx-3">{{ $item }} </label>
                                                            <input type="checkbox" class="js-switch"
                                                                value="{{ $item }}" name="{{ $item }}"
                                                                data-color="#00c292" data-size="small"
                                                                id="{{ $item }}"
                                                                @isset($role)
                                                          @if ($role->hasPermissionTo($item))
                                                            checked
                                                          @endif
                                                        @endisset />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            </div>

                                            <div class="col-md-1 mt-4 ml-2">
                                                <button type="submit" class="btn btn-block btn-lg btn-info"> <i
                                                        class="fa fa-check"></i> Save</button>
                                            </div>

                                    </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
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
