@extends('Backend.layouts.app')

@section('admin_content')
    <!-- Page wrapper  -->
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

                    <h4 class="text-themecolor">Create Invoice</h4>


                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('invoices') }} ">Invoices</a></li>
                            <li class="breadcrumb-item active">Invoice Details</li>

                        </ol>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body printableArea">
                        <h3><b>INVOICE</b> <span class="pull-right">#{{ $invoice->invoice_number }} </span></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <address>
                                        <h3> &nbsp;<b class="text-danger">SimplifyInvoice</b></h3>
                                        {{-- <p class="text-muted m-l-5">E 104, Dharti-2,
                                                <br/> Nr' Viswakarma Temple,
                                                <br/> Talaja Road,
                                                <br/> Bhavnagar - 364002</p> --}}
                                    </address>
                                </div>
                                <div class="pull-left text-left">
                                    <address>
                                        <h3>To,</h3>
                                        <h4 class="font-bold">{{ $invoice->customer->name }} </h4>
                                        <p class="text-muted m-l-30">{{ $invoice->customer->address }} ,
                                            {{-- <br/> Nr' Viswakarma Temple,
                                                <br/> Talaja Road,
                                                <br/> Bhavnagar - 364002</p> --}}
                                        <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i>
                                            {{dateFormat($invoice->invoice_date)}}
                                        </p>
                                        <p><b>Due Date :</b> <i class="fa fa-calendar"></i>
                                            {{dateFormat($invoice->due_date)}}
                                        </p>
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive m-t-40" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoice->invoice_body as $inv)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $inv->product_name }}</td>
                                                    <td>{{ $inv->short_description }}</td>
                                                    <td>{{ $inv->quantity }} </td>
                                                    <td> ${{ $inv->unit_cost }}</td>
                                                    <td> ${{ $inv->total }} </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right m-t-30 text-right mr-4">
                                    <p>Sub - Total amount: $ {{ $invoice->sub_total }}</p>
                                    <p>Discount : ${{ $invoice->invoice_discount }} </p>
                                    <p>Tax : %{{ $invoice->tax_amount }} </p>
                                    <hr>
                                    <h3><b>Total :</b> ${{ $invoice->inv_total_amount }} </h3>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="text-right">
                                    {{-- if paid status of that invoice is 1 then show alerady paid  --}}
                                    @if ($invoice->paid_status == 1)
                                    <button class="btn btn-success" >Already Paid </button> 

                                    @else
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#responsive-modal">Proceed to payment </button>
                                    
                                    @endif
                                    {{-- <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="col-md-4">
        <div class="card">
            <!-- sample modal content -->
            {{-- <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Payment Info</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                    
                            <form role="form" action="{{route('invoice.payment')}}" method="post" class="validation" 
                            data-cc-on-file="false"
                           data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                           id="payment-form"> 
                           @csrf
                                <div class="form-group form-group required">
                                    <label for="recipient-name" class="control-label">Name on Card:</label>
                                    <input size='4' name="name" type='text' class="form-control" >
                                </div>
                                <div class="form-group form-group required  card required">
                                    <label for="recipient-name" class="control-label">Card Number :</label>
                                    <input autocomplete='off' class='form-control card-num' size='20' type='text' class="form-control">
                                </div>
                         
                                   <div class="details-row-sty">
                                <div class="form-group form-group required  cvc required">
                                    <label for="recipient-name" class="control-label ">CVC :</label>
                                    <input  autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4' type='text' >
                                </div>
                                <div class="form-group form-group required  expiration required'">
                                    <label for="recipient-name" class="control-label">Expiration Month :</label>
                                    <input   class='form-control card-expiry-month' placeholder='MM' size='2' type="text">
                                </div>
                                <div class="form-group form-group required  expiration required'">
                                    <label for="recipient-name" class="control-label">Expiration Year :</label>
                                    <input    class='form-control card-expiry-year' placeholder='YYYY' size='4' type="text">
                                </div>
                                <input type="hidden" name="account" value="{{$invoice->stripe_client->stripe_account_id}} ">
                                <input type="hidden" name="amount" value="{{$invoice->inv_total_amount}}">
                                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">

                            </div>
                                <div class='form-row row'>
                                    <div class='col-md-12 hide error form-group'>
                                        <div class='alert-danger alert'>Fix the errors before you begin.</div>
                                    </div>
                               
                               
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Pay ${{$invoice->inv_total_amount}}</button>
                        </div>
                    </form>
                    </div>
                </div>

            </div> --}}
        </div>
    </div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }
  
  });
  
  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
@endsection
