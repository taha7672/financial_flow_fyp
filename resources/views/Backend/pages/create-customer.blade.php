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
                @isset($customer)
                <h4 class="text-themecolor">Edit Customer</h4>
                @else
                <h4 class="text-themecolor">Create Customer</h4>
                @endisset
              
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('customers')}} ">Customers</a></li>
                        @isset($customer)
                        <li class="breadcrumb-item active">Edit Customer</li>
                        @else
                        <li class="breadcrumb-item active">Create Customer</li>
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
                @isset($customer)
                <form novalidate action="{{route('update.customer', $customer->id)}}" method="POST" enctype="multipart/form-data">

                @else
                <form novalidate action="{{route('store.customer')}}" method="POST" enctype="multipart/form-data">
                @endisset
                    @csrf
                    <div class="form-body">
                     
                        <div class="container">
                            
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control"  required data-validation-required-message="Name is required"  @isset($customer) value="{{$customer->name}}" @endisset >
                                    <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Profile Pic <span class="text-danger">*</span></label>
                                    <input type="file"  name="profile_image" class="form-control" required data-validation-required-message="Profile Image is required"   @isset($customer) value="{{$customer->profile_image}}" @endisset  > 
                                    <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                     </div>
                                    


                               
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input type="email"  name="email" class="form-control" required data-validation-required-message="Email is required"  @isset($customer) value="{{$customer->email}}" @endisset>
                                    <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Phone <span class="text-danger">*</span></label>
                                    <input type="phone"  name="phone" class="form-control" required data-validation-required-message="Phone is required"  @isset($customer) value="{{$customer->phone}}" @endisset>
                                    <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Address <span class="text-danger">*</span></label>
                                    <input type="textarea"  name="address" class="form-control" required data-validation-required-message="Address is required"  @isset($customer) value="{{$customer->address}}" @endisset>
                                    <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group " style="margin-top: 40px;">
                                    <label class="control-label mx-3">Customer Status </label> 
                                    <input type="checkbox"  class="js-switch" value="1" name="status" data-color="#00c292" data-size="small"  @isset($plan) @if ($customer->status == 1) checked @endif @endisset  />

                                     </div>
                                
                            </div>
                            <!--/span-->
                        </div>
                       
                       
                  
                    
                    </div>
                   
                    <div class="form-actions mt-3">
                        <div class="col-lg-2 col-md-4">
                        <button type="submit" class="btn btn-block btn-lg btn-info"> <i class="fa fa-check"></i> Save</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Row -->


<script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection
<script src="{{asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('backend/dist/js/pages/validation.js')}} "></script>

  

    

