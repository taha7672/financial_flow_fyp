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
             
                <h4 class="text-themecolor">Create Client </h4>
              
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('clients')}} ">Clients</a></li>
                        <li class="breadcrumb-item active">Create Client</li>
                     
                    </ol>
                   
                </div>
            </div>
        </div>
  <!-- Row -->
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-body">
                <form novalidate  id="form"  action="{{route('store.client')}} " method="POST"  >
                    @csrf
                    <div class="form-body control-group">
                    
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group"> 
                                    <label class="control-label">Select Client <span class="text-danger">*</span></label> <br>
                                    <select class="form-control custom-select  js-data-client-ajax"
                                    aria-placeholder="Search for Client" required name="client_id">
                                </select>
                                    
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                {{-- <div class="form-group ">
                                    <label class="control-label">Display Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="display_name" class="form-control " required data-validation-required-message="Display name is required" >
                                    <div class="help-block  mt-1"><ul role="alert"> </ul></div>
                                        
                                   
                                    </div> --}}
                            </div>
                           
                            <!--/span-->
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" required data-validation-required-message="Title is required" class="form-control"  >
                                    <div class="help-block  mt-1"><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Display Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="display_name" class="form-control " required data-validation-required-message="Display name is required" >
                                    <div class="help-block  mt-1"><ul role="alert"> </ul></div>
                                        
                                   
                                    </div>
                            </div>
                           
                            <!--/span-->
                        </div>
                    
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group"> 
                                    <label class="control-label">Short Description<span class="text-danger">*</span></label>
                                    <input type="textarea" id="description"  name="short_description" class="form-control" required data-validation-required-message="Short Description is required" > 
                                    <div class="help-block  mt-1"><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Sales Tax %<span class="text-danger">*</span></label>
                                    <input type="number" id="number" name="sales_tax" class="form-control " required data-validation-required-message="Sales Tax is required"  >
                                    <div class="help-block  mt-1"><ul role="alert"></ul></div>
                                
                                    </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row ">
                             <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Invoice Number Format <span class="text-danger">*</span></label> <br>
                                    <select name="invoice_number_format" id="invoice_number_format" class="form-control">
                                        <option value="1">abc</option>
                                        <option value="2">xyz</option>
                                        <option value="3">bnm</option>
                                    </select>
                                    
                              
                                    </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Date Format <span class="text-danger">*</span></label>
                                    <select name="date_format" id="date_format" class="form-control">
                                        <option value="1">abc</option>
                                        <option value="2">xyz</option>
                                        <option value="3">bnm</option>
                                    </select>
                                
                              
                                    </div>
                            </div>
                            <!--/span-->
                          
                        </div>
                        <div class="row ">
                             <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Logo <span class="text-danger">*</span></label> <br>
                                    <input type="file" name="logo" class="form-control" required data-validation-required-message="Client Busssiness Logo is required"  >
                                    </div>
                            </div>
                             
                            </div>
                            <!--/span-->
                          
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                        <div class="row ">
                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <label class="control-label">Notifications</label> 
                                    <input type="checkbox"  class="js-switch" value="1" name="push_notifications" data-color="#00c292" data-size="small"  />
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                              
                                    <div class="form-group">
                                        <label class="control-label">Email Notifications</label> 
                                        <input type="checkbox"  class="js-switch" value="1" name="email_notifications" data-color="#00c292" data-size="small"  />
                                         </div>
                            <!--/span-->
                        </div>
                            <div class="col-md-3">
                              
                                    <div class="form-group">
                                        <label class="control-label">Auto Apply Sales Tax</label> 
                                        <input type="checkbox"  class="js-switch" value="1" name="auto_apply_sales_tax" data-color="#00c292" data-size="small"  />
                    
    
                                         </div>
                            <!--/span-->
                        </div>
                            <div class="col-md-3">
                              
                                    <div class="form-group">
                                        <label class="control-label">Auto Generated inv.No</label> 
                                        <input type="checkbox"  class="js-switch" value="1" name="uto_gen_invoice_num" data-color="#00c292" data-size="small" />
    
                                         </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        </div>
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


<script src="{{asset('backend/dist/js/pages/validation.js')}} "></script>

<script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection
<script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{asset('backend/dist/js/custom-pages/clients.js')}} "></script>

  

    

