<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/favicon.png') }}">
    <title>FinancialFlow Admin</title>

    <!-- toast CSS -->
    <link href="{{ asset('backend/assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Form page CSS -->
    <link href="{{ asset('backend/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" type="text/css" />
          
    <!-- Daterange picker plugins css -->
    <link href="{{asset('backend/assets/node_modules/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/node_modules/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/node_modules/bootstrap-select/bootstrap-select.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/node_modules/multiselect/css/multi-select.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/dist/css/pages/other-pages.css') }} " rel="stylesheet">

    <!-- chartist CSS -->
    <link href="{{ asset('backend/assets/node_modules/morrisjs/morris.css') }} " rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('backend/assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('backend/dist/css/simplify-invoice.css')}} ">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('backend/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <link href=" {{ asset('backend/dist/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <!-- data table CSS -->
    <link href="{{ asset('backend/assets/node_modules/datatables/media/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
        <link href="{{asset('backend/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{asset('backend/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('backend/assets/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('backend/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('backend/assets/node_modules/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    {{-- select2 --}}
    <link href="{{ asset('backend/assets/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet"
        type="text/css" />
     <link rel="stylesheet" href="{{asset('backend/bootstrap-toggle-master/css/bootstrap2-toggle.css')}} ">
     <script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>

  
</head>

<body class="skin-green fixed-layout">
  
              @if (Auth::guard('admin')->check() || Auth::guard('web')->check())

        @php
            $admin = Auth::guard('admin')->user();
        @endphp

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">FinancialFlow admin</p>
            </div>
        </div>



        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ route('dashboard') }} ">
                            <!-- Logo icon --><b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('backend/assets/images/logo-icon.png') }}" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('backend/assets/images/logo-light-icon.png') }}" alt="homepage"
                                    class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                                <!-- dark Logo text -->
                                <img src="{{ asset('backend/assets/images/logo-text.png') }}" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{ asset('backend/assets/images/logo-light-text.png') }}" class="light-logo"
                                    alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item"> <a
                                    class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                    href="#"><i class="ti-menu"></i></a> </li>
                            <li class="nav-item"> <a
                                    class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                                    href="#"><i class="icon-menu"></i></a> </li>

                        </ul>
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown u-pro">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if ($admin->image)
                                        <img src="{{ asset('storage/images/admin/' . $admin->image) }} " alt="user"
                                            style="width: 50px; height:45px;">
                                    @else
                                        <img src="{{ asset('backend/assets/images/admin-user-img.jpg') }}"
                                            alt="user" style="width: 50px; height:45px;">
                                    @endif
                                    <span class="hidden-md-down"> {{ $admin->name }} &nbsp;<i
                                            class="fa fa-angle-down"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                    <!-- text-->
                                    <a href="{{ route('myprofile') }}" class="dropdown-item"><i class="ti-user"></i>
                                        My Profile</a>
                                    <!-- text-->
                                    <div class="dropdown-divider"></div>
                                    <!-- text-->
                                    <a href="{{route('account.setting')}}" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                    <!-- text-->
                                    <div class="dropdown-divider"></div>
                                    <!-- text-->

                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        
                                            <a href="{{ route('admin.logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                            this.closest('form').submit();"> <i class="fa fa-power-off"></i> Logout</a>
                                        
                                    </form>
                                    <!-- text-->

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="#"
                                    aria-expanded="false">
                                    @if ($admin->image)
                                        <img src="{{ asset('storage/images/admin/' . $admin->image) }}" alt="user-img"
                                            style="width: 50px; height:40px;">
                                    @else
                                        <img src="{{ asset('backend/assets/images/admin-user-img.jpg') }}"
                                            alt="user-img" style="width: 50px; height:40px;">
                                    @endif
                                    <span class="hide-menu">{{ $admin->name }} &nbsp;</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('myprofile') }} "><i class="ti-user"></i> My Profile</a>
                                    </li>
                                    <li><a href="{{route('account.setting')}}"><i class="ti-settings"></i> Account Setting</a></li>
                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <li>
                                            <a href="{{ route('admin.logout') }} " onclick="event.preventDefault();
                                            this.closest('form').submit();"> <i class="fa fa-power-off"></i> Logout</a>
                                        </li>
                             
                                    </form>
                                </ul>
                            </li>
                            {{-- active aclass for current route --}}
                            @php
                            $current_page = Route::currentRouteName();
                            $active_invoice = $current_page == 'create.invoice'|| $current_page == 'inv.details' ? 'active' : '' ;
                            $active_customer = $current_page == 'create.customer' || $current_page == 'edit.customer' ? 'active' : '';
                            $active_client = $current_page == 'create.client' || $current_page == 'edit.client' || $current_page == 'customers' || $current_page == 'create.customer' || $current_page == 'edit.customer' ? 'active' : '';
                            $active_plan = $current_page == 'create.plan' || $current_page == 'edit.plan' ? 'active' : '';
                            $active_adminUser = $current_page == 'create.admin' || $current_page == 'edit.admin' ? 'active' : '';
                            $active_userRoles = $current_page == 'create.userRole' || $current_page == 'edit.userRole' ? 'active' : '';
                            $active_discount = $current_page == 'create.discount' || $current_page == 'edit.discount' ? 'active' : '';
                            $active_transaction = $current_page == 'create.transaction' || $current_page == 'edit.transaction' ? 'active' : '';
                            // $active_receivable= $current_page == 'receivable'
                              
                        @endphp
                        @can('Dashboard')
                            <li> <a class="" href="{{ route('dashboard') }} " aria-expanded="false"><i
                                class="icon-speedometer"></i><span> Dashboard </span></a> </li>
                        @endcan
                        @can('Plans')
                      <li> <a class=" {{ $active_plan }} " href="{{ route('plans') }} "
                            aria-expanded="false"><i class="ti-wallet"></i><span> Plans</span></a></li>
                            @endcan
                            @can('Clients')
                    <li> <a class=" {{ $active_client  }}" href="{{ route('clients') }}"
                            aria-expanded="false"><i class="ti-user"></i><span> Clients</span></a></li>
                            @endcan
                            {{-- @if(auth('admin')->user()->can('Customers')) --}}
                    {{-- <li> <a class=" {{ $active_customer }} " href="{{ route('customers') }}"
                            aria-expanded="false"><i class="ti-user"></i><span> Customers</span></a></li> --}}
                            {{-- @endif --}}
                            @can('Invoices')
                    <li> <a class=" {{ $active_invoice }}" href="{{ route('invoices') }}"
                            aria-expanded="false"><i class="ti-email"></i><span> Invoices</span></a> </li>
                            @endcan
                            @can('Payments')
                    <li> <a class="{{$active_transaction }}" href="{{ route('transactions') }}" aria-expanded="false"><i
                                class="icon-wallet"></i><span> Payments</span></a> </li>
                            @endcan
                            @can('Discounts')
                    <li> <a class="{{$active_discount}}" href="{{ route('discounts') }}" aria-expanded="false"><i
                                class="ti-wallet"></i><span> Discounts</span></a> </li>
                            @endcan
                            @can('Receivables')
                    <li> <a class="" href="{{ route('receivables') }}" aria-expanded="false"><i
                                class="ti-wallet"></i><span> Receivables</span></a> </li>
                            @endcan
                            {{-- @if(auth('admin')->user()->can('Transactions'))  --}}
                    {{-- <li> <a class="" href="{{ route('ladgers') }}" aria-expanded="false"><i
                                class="ti-wallet"></i><span> Ladgers</span></a> </li> --}}
                            {{-- @endif --}}

                            @can('Reports')
                    <li> <a class="" href="{{ route('reports')}}" aria-expanded="false"><i
                                class=" icon-book-open"></i><span> Reports</span></a> </li>
                            @endcan
                            @can('Admin Users')
                    <li> <a class=" {{ $active_adminUser }}" href="{{ route('admins') }}" aria-expanded="false"><i
                                class=" fas fa-users"></i><span> Admin Users</span></a> </li>
                            @endcan
                            @can('Role Manager')
                    <li> <a class="{{$active_userRoles}} " href="{{ route('userRoles') }}" aria-expanded="false"><i
                                class="fas fa-user-plus"></i><span> Role Manager</span></a> </li>
                            @endcan
                      


                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
        </div>
        <script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>

    <!-- Dashboard
     ============================================================== -->
    @yield('admin_content')
    <!--End Dashboard
   ============================================================== -->
  @else
  @endif

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('backend/assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('backend/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <script src="{{ asset('backend/assets/node_modules/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('backend/assets/node_modules/bootstrap-select/bootstrap-select.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('backend/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('backend/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('backend/assets/node_modules/dff/dff.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/node_modules/multiselect/js/jquery.multi-select.js') }}">
    </script>
    
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('backend/assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('backend/assets/node_modules/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('backend/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Popup message jquery -->
    <script src="{{ asset('backend/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('backend/dist/js/dashboard1.js') }}"></script>
    <script src="{{ asset('backend/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    <!--stickey kit -->
    <script src=" {{ asset('backend/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src=" {{ asset('backend/assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->

    <script src="{{ asset('backend/dist/js/pages/toastr.js') }} "></script>
    <script src="{{ asset('backend/dist/js/pages/validation.js') }} "></script>
    <script src="{{asset('backend/dist/js/pages/jquery.PrintArea.js')}} "type="text/JavaScript"></script>
    <!-- Custom Theme JavaScript -->
    <!-- Plugin JavaScript -->
    <script src="{{asset('backend/assets/node_modules/moment/moment.js')}} "></script>
    <script src="{{asset('backend/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
        <!-- Clock Plugin JavaScript -->
        <script src="{{asset('backend/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
        <!-- Color Picker Plugin JavaScript -->
        <script src="{{asset('backend/assets/node_modules/jquery-asColor/dist/jquery-asColor.js')}}"></script>
        <script src="{{asset('backend/assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
        <script src="{{asset('backend/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
      <!-- Date Picker Plugin JavaScript -->
      <script src="{{asset('backend/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
      <!-- Date range Plugin JavaScript -->
      <script src="{{asset('backend/assets/node_modules/timepicker/bootstrap-timepicker.min.js')}} "></script>
      <script src="{{asset('backend/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}} "></script>
    {{-- data table --}}
    <script src="{{ asset('backend/assets/node_modules/datatables/datatables.min.js') }}"></script>
    {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
    <script src="{{ asset('backend/bootstrap-toggle-master/js/bootstrap-toggle.min.js') }}"></script>
       {{-- custom js --}}
    <script src="{{asset('backend/dist/js/custom-pages/simplify-invoice.js')}} "></script>
 <!-- Plugins for this page -->
   
</body>

</html>



<script>
    // show $.toast message when session has message key from controller 
    @if(Session::has('message'))
    $.toast({
        heading: 'Success',
        text: "{{ session('message') }}",
        position: 'top-right',
        loaderBg:'#94a19f',
        icon: 'success',
        hideAfter: 3500, 
        
    });
    @endif
    // show $.toast message when session has error key from controller
    @if(Session::has('error'))
    $.toast({
        heading: 'Error',
        text: "{{ session('error') }}",
        position: 'top-right',
        loaderBg:'#94a19f',
        icon: 'error',
        hideAfter: 3500, 
        
    });
    @endif
    // show $.toast message when session has warning key from controller
    @if(Session::has('warning'))
    $.toast({
        heading: 'Warning',
        text: "{{ session('warning') }}",
        position: 'top-right',
        loaderBg:'#94a19f',
        icon: 'warning',
        hideAfter: 3500, 
        
    });
    @endif
    // show $.toast message when session has info key from controller
    @if(Session::has('info'))
    $.toast({
        heading: 'Info',
        text: "{{ session('info') }}",
        position: 'top-right',
        loaderBg:'#94a19f',
        icon: 'info',
        hideAfter: 3500, 
        
    });
    @endif


</script>