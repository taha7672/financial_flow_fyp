

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
                    <h4 class="text-themecolor">Plans </h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item active">Plans</li>
                        </ol>
                                      {{-- @if(auth('admin')->user()->can('Create Plans')) --}}
                        <a href="{{ route('create.plan') }} ">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Create New</button>
                        </a>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- table-striped table-bordered --}}
                            <table id="myTable" class="table ">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th><span  class="hovertext" data-hover="Price USD" >Price</span></th>
                                        <th><span  class="hovertext" data-hover="Duration Days" >Dur</span></th>
                                        <th><span  class="hovertext" data-hover="No.of Invoices" >Inv.count</span></th>
                                        <th><span  class="hovertext" data-hover="Charge per Transaction" >Per Trans</span></th>
                                        <th><span  class="hovertext" data-hover="Charge per Alert" >Per Alert</span></th>
                                        <th><span  class="hovertext" data-hover="Plan Subscribers" >Plan Subs</span></th>
                                        <th><span  class="hovertext" data-hover="Send Postal Invoices" >Postal</span></th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <td style="width: 17%;" >{{ $plan->title }} </td>
                                            <td>${{ $plan->price }}</td>
                                            <td><span class="text-muted"><i
                                                        class="fa fa-clock-o"></i>{{ $plan->duration_days }} </span> </td>
                                            <td>{{ $plan->number_of_invoices }}</td>
                                            <td>
                                                @if ($plan->charge_per_transaction == 1)
                                                    <div class="label label-table label-success">Yes</div>
                                                @else
                                                    <div class="label label-table label-danger">No</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($plan->charge_per_alert == 1)
                                                    <div class="label label-table label-success">Yes</div>
                                                @else
                                                    <div class="label label-table label-danger">No</div>
                                                @endif
                                            </td>
                                            <td> <a href="#">5</a> </td>
                                            <td>
                                                @if ($plan->send_postal == 1)
                                                    <div class="label label-table label-success">Yes</div>
                                                @else
                                                    <div class="label label-table label-danger">No</div>
                                                @endif
                                            </td>
                                          
                                       
                                                <td class="toggle_warp"> <input type="checkbox" name="status" class="toggle-class" data-id="{{ $plan->id }}" data-toggle="toggle" data-offstyle="btn btn-danger" data-onstyle="btn btn-success" data-on="Active" data-off="Inactive" {{ $plan->status == true ? 'checked' : ''}}></td>

                                        
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
                                                            href="{{ URL::to('admin/edit-plan/' . $plan->id) }}">Edit</a>
                                                        <a class="dropdown-item " data-id="{{ $plan->id }}"
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
        <script src="{{asset('backend/dist/js/custom-pages/plan.js')}} "></script>
<script>
$(document).ready(function(){
    setTimeout(function(){
        $('.toggle_warp .toggle').css('height', '35.6335px');
        $('.toggle_warp .toggle').css('width', '98px');
    }, 500);
});
</script>
        @endsection


        