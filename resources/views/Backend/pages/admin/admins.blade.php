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
               
                <h4 class="text-themecolor">Admins </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item active">Admins</li>
                    </ol>
                    <a href="{{route('create.admin')}} " target="_blank">
                    <button type="button"  class="btn btn-info d-none d-lg-block m-l-15"   ><i class="fa fa-plus-circle"></i> Create New</button>
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
                            <th>Role Name</th>
                            <th>Phone</th>
                            <th>Email</th>  
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            
                  
                        <tr>
                            @if ($admin->image)
                            <td><img src="{{asset('storage/images/admin/'.$admin->image)}} " style="width: 80px; height:50px;" alt=""> </td>

                            @else
                            <td><img src="{{asset('backend/assets/images/admin-user-img.jpg')}} " style="width: 100px; height:60px;" alt=""> </td>
 
                            @endif
                            <td>{{$admin->name}} </td>
                            <td>{{$admin->role->name}} </td>
                            <td>{{$admin->phone}} </td>
                            <td>{{$admin->email}} </td>
                            <td><div class="btn-group">
                                <button type="button" class="btn btn-success">Action</button>
                                <button type="button"
                                    class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ URL::to('admin/admins/edit/' . $admin->id) }}">Edit</a>
                                    <a class="dropdown-item " data-id="{{ $admin->id }}"
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

@endsection
<script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>

<script>

    $(document).ready(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();        
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
            $.ajax({
               
                url: "admins/delete/" + id,
                type: 'GET',
                data: {
                    "id": id,
                    "_token": token,
                },
                response: 'Delete',
                success: function(response) {
                    console.log(response);
                    location.reload();
                }
                
            });
        });
    });



</script>
