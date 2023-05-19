 @extends('Backend.layouts.app')


 @section('admin_content')
     <!-- ============================================================== -->
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
                     <h4 class="text-themecolor">Dashboard</h4>
                 </div>
                 <div class="col-md-7 align-self-center text-right">
                     <div class="d-flex justify-content-end align-items-center">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                             <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>
                 </div>
             </div>
             <!-- ============================================================== -->
             <!-- End Bread crumb and right sidebar toggle -->
             <!-- ============================================================== -->
             <!-- ============================================================== -->
             <!-- Info box -->
             <!-- ============================================================== -->
             <div class="card-group">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-screen-desktop"></i></h3>
                                         <p class="text-muted">TOTAL CLIENTS</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-primary">{{ $total_clients }} </h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-primary" role="progressbar"
                                         style="width:100%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-screen-desktop"></i></h3>
                                         <p class="text-muted">ACTIVE CLIENTS</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-cyan">{{ $total_clients }}</h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-cyan" role="progressbar"
                                         style="width:{{ $active_clients_percentage }}%; height: 6px;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-doc"></i></h3>
                                         <p class="text-muted">TOTAL INVOICES</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-purple">{{ $total_invoices }} </h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-purple" role="progressbar" style="width:100%; height: 6px;"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-doc"></i></h3>
                                         <p class="text-muted">PAID INVOICES</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-success">{{ $total_paid_invoices }}</h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-success" role="progressbar"
                                         style="width:{{ $paid_invoices_percentage }}%; height: 6px;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="card-group">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-doc"></i></h3>
                                         <p class="text-muted">UNPAID INVOICES</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-primary">{{ $total_unpaid_invoices }}</h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-primary" role="progressbar"
                                         style="width:{{ $unpaid_invoices_percentage }}%; height: 6px;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-note"></i></h3>
                                         <p class="text-muted">TOTAL DISCOUNTS</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-cyan">${{ $total_discounts }} </h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-cyan" role="progressbar"
                                         style="width:{{ $discount_percentage }}%; height: 6px;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-doc"></i></h3>
                                         <p class="text-muted">RECENT INVOICES</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-purple">{{ $recent_invoices }}</h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-purple" role="progressbar"
                                         style="width:{{ $recent_invoices_percentage }}%; height: 6px;"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Column -->
                 <!-- Column -->
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="d-flex no-block align-items-center">
                                     <div>
                                         <h3><i class="icon-bag"></i></h3>
                                         <p class="text-muted"> TOTAL TRANSACTION</p>
                                     </div>
                                     <div class="ml-auto">
                                         <h2 class="counter text-success">${{ $total_transactions }} </h2>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="progress">
                                     <div class="progress-bar bg-success" role="progressbar"
                                         style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             {{-- TOP TWO COLOUMS END --}}

             <!-- ============================================================== -->
             <!-- End Info box -->
             <!-- ============================================================== -->

             <div class="row">
                 <!-- Column -->
                 <div class="col-lg-8 col-md-12">
                     <div class="card">
                         <div class="card-body">
                             <div class="d-flex m-b-40 align-items-center no-block">
                                 <h5 class="card-title ">YEARLY SALES</h5>
                                 <div class="ml-auto">
                                     <ul class="list-inline font-12">
                                         <li><i class="fa fa-circle text-cyan"></i> Invoices</li>
                                         <li><i class="fa fa-circle text-primary"></i> Discount</li>
                                         <li><i class="fa fa-circle text-purple"></i> Payments</li>
                                     </ul>
                                 </div>
                             </div>
                             <div id="morris-area-chart" style="height: 340px;"></div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="card">
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="d-flex no-block align-items-center">
                                         <div>
                                             <h3><i class="icon-bag"></i></h3>
                                             <p class="text-muted">RECENT TRANSACTIONS</p>
                                         </div>
                                         <div class="ml-auto">
                                             <h2 class="counter text-primary">00</h2>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="progress">
                                         <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: 1%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card">
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="d-flex no-block align-items-center">
                                         <div>
                                             <h3><i class="icon-bag"></i></h3>
                                             <p class="text-muted">TOTAL REVENUE</p>
                                         </div>
                                         <div class="ml-auto">
                                             <h2 class="counter text-primary">00</h2>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="progress">
                                         <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: 1%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
                 <!-- Column -->

             </div>
             <!-- ============================================================== -->
             <!-- Comment - table -->
             <!-- ============================================================== -->
             <div class="row">
                 <!-- ============================================================== -->
                 <!-- Table -->
                 <!-- ============================================================== -->
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-body">
                             <div class="d-flex">
                                 <div>
                                     <h5 class="card-title">Revenue List</h5>
                                     <h6 class="card-subtitle">Check the monthly sales </h6>
                                 </div>
                                 <div class="ml-auto">
                                     <select class="form-control b-0 " id="selected_month">
                                        <option value="1" <?php if(date('n') == 1) echo 'selected'; ?>>January</option>
                                        <option value="2" <?php if(date('n') == 2) echo 'selected'; ?>>February</option>
                                        <option value="3" <?php if(date('n') == 3) echo 'selected'; ?>>March</option>
                                        <option value="4" <?php if(date('n') == 4) echo 'selected'; ?>>April</option>
                                        <option value="5" <?php if(date('n') == 5) echo 'selected'; ?>>May</option>
                                        <option value="6" <?php if(date('n') == 6) echo 'selected'; ?>>June</option>
                                        <option value="7" <?php if(date('n') == 7) echo 'selected'; ?>>July</option>
                                        <option value="8" <?php if(date('n') == 8) echo 'selected'; ?>>August</option>
                                        <option value="9" <?php if(date('n') == 9) echo 'selected'; ?>>September</option>
                                        <option value="10" <?php if(date('n') == 10) echo 'selected'; ?>>October</option>
                                        <option value="11" <?php if(date('n') == 11) echo 'selected'; ?>>November</option>
                                        <option value="12" <?php if(date('n') == 12) echo 'selected'; ?>>December</option>

                                          

                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="card-body bg-light">
                             <div class="row">
                                 <div class="col-6">
                                     <h3 id="active_month">  </h3>
                                     <h5 class="font-light m-t-0">Report for this month</h5>
                                 </div>
                                 <div class="col-6 align-self-center display-6 text-right">
                                     <h2 class="text-success" id="active_month_sum">$</h2>
                                 </div>
                             </div>
                         </div>
                         <div class="card-body">
                            <div class="table-responsive">
                                <table  class="table table-hover no-wrap"   id="dataTablePayments" style="width: 99%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>CLIENT NAME</th>
                                            <th>CUSTOMER NAME</th>
                                            <th>INVOICE NUMBER</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                    </tbody>
                                </table>
                            </div>
                            <div id="pagination"></div>
                        </div>
                 </div>
             </div>
             <!-- ============================================================== -->
             <!-- End Comment - chats -->
             <!-- ============================================================== -->
         </div>
         <!-- ============================================================== -->
         <!-- End Container fluid  -->
         <!-- ============================================================== -->
     </div>
     <!-- ============================================================== -->
     <!-- End Page wrapper  -->
     <!-- ============================================================== -->
     <script src="{{ asset('backend/dist/js/custom-pages/dashboard.js') }}"></script>
 @endsection
