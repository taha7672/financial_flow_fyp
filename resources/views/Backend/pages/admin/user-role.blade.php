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
                    <h4 class="text-themecolor">User Roles </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item active">User Role</li>

                        </ol>

                        <a href="{{ route('create.userRole') }} ">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"
                                data-target="#responsive-modal"><i class="fa fa-plus-circle"></i> Create New</button>
                        </a>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Role Name</th>
                                            <th>Permissions</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($role as $key => $value)
                                            <tr>
                                                <td>{{ $value->name }}</td>
                                                <td style="width: 70%;">
                                                    @foreach ($value->permissions as $permission)
                                                        <span class="badge badge-success mt-1">{{ $permission->name }}
                                                        </span>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success">Action</button>
                                                        <button type="button"
                                                            class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="sr-only"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ URL::to('admin/user-role/edit/' . $value->id) }}">Edit</a>
                                                            <a class="dropdown-item " data-id="{{ $value->id }} "
                                                                id="delete" style="cursor: pointer;">Delete</a>

                                                        </div>
                                                    </div>




                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    @endsection
    <script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            var url = "{{ route('delete.userRole', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    message = response.message;
                    location.reload();
                }
            });

        });
    </script>
