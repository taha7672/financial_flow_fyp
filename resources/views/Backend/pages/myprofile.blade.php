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
                <h4 class="text-themecolor">My Profile </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Row -->
  
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  
       
                    <div class="card-body">
                   
                        <form novalidate action="{{route('myprofile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                {{-- <h3 class="card-title">My Profile</h3> --}}
                                <hr>
                                <div class="container">
                                    <div class="image_display">
                                               <div class="profile-pic mb-4 mt-2 ml-2">
                                                <label for="">
                                                    @if ($admin->image)
                                                    <img src="{{asset('storage/images/admin/'.$admin->image)}}" class="imgmain" alt="" style="width: 170px; height:150px;">   
                                                    @else
                                                    <img src="{{asset('backend/assets/images/admin-user-img.jpg')}}" class="imgmain" alt="" style="width: 150px; height:150px;">   
                                                    @endif
                                                   {{-- <img src="{{asset('backend/assets/images/camera-icon.png')}}" class="imgcam" alt="" > --}}
                                                </label>
                                                  <input type="file" name="image" value="{{$admin->image }} ">
                                                </div>
                                           </div>
                               </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$admin->name}} " required data-validation-required-message="Name is required">
                                            <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                             </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Phone</label>
                                            <input type="phone"  name="phone" class="form-control" value="{{$admin->phone}} " required data-validation-required-message="Phone is required">
                                            <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                             </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="email"  name="email" class="form-control" value="{{$admin->email}} " required data-validation-required-message="Email is required">
                                            <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                             </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Password</label>
                                            <input type="password"  name="password" class="form-control" required data-validation-required-message="Password is required" >
                                            <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                             </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                              
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation"  class="form-control" required data-validation-required-message="Confirm Password is required" >
                                            <div class="help-block ml-1 "><ul role="alert"></ul></div>
                                             </div>
                             
                                    <!--/span-->
                                </div>
                                <!--/row-->
                          
                            
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <script src="{{asset('backend/dist/js/pages/validation.js')}} "></script>


        <script>
            ! function(window, document, $) {
                "use strict";
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            }(window, document, jQuery);
            </script>
        @endsection
        <script src="{{asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
        
          