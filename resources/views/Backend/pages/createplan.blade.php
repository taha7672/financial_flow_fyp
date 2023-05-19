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
                @isset($plan)
                <h4 class="text-themecolor">Edit Plan </h4>
                @else
                <h4 class="text-themecolor">Create Plan </h4>
                @endisset
              
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}} ">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('plans')}} ">Plans</a></li>
                        @isset($plan)
                        <li class="breadcrumb-item active">Edit Plan</li>
                        @else
                        <li class="breadcrumb-item active">Create Plan</li>
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
                <form novalidate  id="form" @if (isset($plan)) action="{{route('update.plan',$plan->id)}}" @else action="{{route('store.plan')}} "  @endif method="POST"  >
                    
           
                    @csrf
                    <div class="form-body control-group">
                    
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" required data-validation-required-message="Plan Title is required" class="form-control" @isset($plan) value="{{$plan->title}}" @endisset >
                                    <div class="help-block  mt-1"><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Price <span class="text-danger">*</span></label>
                                    <input type="number" id="price" name="price" class="form-control " required data-validation-required-message="Plan Price is required" @isset($plan) value="{{$plan->price}}" @endisset>
                                    <div class="help-block  mt-1"><ul role="alert"> </ul></div>
                                        
                                   
                                    </div>
                            </div>
                           
                            <!--/span-->
                        </div>
                    
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group"> 
                                    <label class="control-label">Number of Invoices <span class="text-danger">*</span></label>
                                    <input type="number" id="number"  name="number_of_invoices" class="form-control" required data-validation-required-message="Plan's Number of Invoices is required" @isset($plan) value="{{$plan->number_of_invoices}}" @endisset > 
                                    <div class="help-block  mt-1"><ul role="alert"></ul></div>
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Max Allowed Coustomers <span class="text-danger">*</span></label>
                                    <input type="number" id="number" name="max_allowed_coustomers" class="form-control " required data-validation-required-message="Plan's Max Allowed Coustomers is required"  @isset($plan) value="{{$plan->max_allowed_coustomers}}" @endisset >
                                    <div class="help-block  mt-1"><ul role="alert"></ul></div>
                                
                                    </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row ">
                             <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Duration Days <span class="text-danger">*</span></label>
                                    <input type="number" id="days" name="duration_days" class="form-control " required data-validation-required-message="Plan's Duration is required"  @isset($plan) value="{{$plan->duration_days}}" @endisset >
                                    <div class="help-block ml-1 "><ul role="alert"></ul></div>
                              
                                    </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="row">
                                <div class="form-group mx-3"> <br> <br>
                                    <label class="control-label mx-3">Charge per Transaction</label> 
                                    <input type="checkbox"  class="js-switch" value="1" name="charge_per_transaction" data-color="#00c292" data-size="small" @isset($plan) @if ($plan->charge_per_transaction == 1) checked @endif @endisset />

                                     </div>
                                     <div class="form-group "> <br> <br>
                                        <label class="control-label mx-3">Charge per Alert</label> 
                                        <input type="checkbox"  class="js-switch" value="1" name="charge_per_alert" data-color="#00c292" data-size="small" @isset($plan) @if ($plan->charge_per_alert == 1) checked @endif @endisset />
    
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
                                    <label class="control-label mx-3">Send Postal Invoice</label> 
                                    <input type="checkbox"  class="js-switch" value="1" name="send_postal" data-color="#00c292" data-size="small" @isset($plan) @if($plan->send_postal == 1) checked @endif @endisset />
                                     </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                              
                                    <div class="form-group">
                                        <label class="control-label mx-3">Send SMS</label> 
                                        <input type="checkbox"  class="js-switch" value="1" name="sms" data-color="#00c292" data-size="small" @isset($plan) @if($plan->sms == 1) checked @endif @endisset />
                                         </div>
                            <!--/span-->
                        </div>
                            <div class="col-md-3">
                                
                              
                                    <div class="form-group">
                                        <label class="control-label mx-3">Send Email</label> 
                                        <input type="checkbox"  class="js-switch" value="1" name="email" data-color="#00c292" data-size="small" @isset($plan) @if ($plan->email == 1) checked @endif @endisset />
                    
    
                                         </div>
                            <!--/span-->
                        </div>
                            <div class="col-md-3">
                              
                                    <div class="form-group">
                                        <label class="control-label mx-3">Plan Status</label> 
                                        <input type="checkbox"  class="js-switch" value="1" name="status" data-color="#00c292" data-size="small" @isset($plan) @if ($plan->status == 1) checked @endif @endisset />
    
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


<script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }(window, document, jQuery);
    </script>
@endsection
<script src="{{asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('backend/dist/js/pages/validation.js')}} "></script>

  

    

