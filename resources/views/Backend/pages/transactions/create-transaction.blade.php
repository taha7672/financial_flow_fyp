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
                    @isset($tran)
                    <h4 class="text-themecolor">Edit Transaction</h4>    
                    @else
                    <h4 class="text-themecolor">Create Transaction</h4>
                    @endisset
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('transactions') }} ">Transactions</a></li>
                            @isset($tran)
                            <li class="breadcrumb-item active">Edit Transaction</li>
                            @else
                            <li class="breadcrumb-item active">Create Transaction</li>
                            @endisset

                        </ol>

                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-4">
                            <div class="container" style="width: 60%">
                            <form 
                            @isset($tran)
                            action="{{route('update.transaction',$tran->id)}}"
                            @else
                            action="{{route('store.transaction')}}"
                            @endisset
                            method="post" enctype="multipart/form-data">
                            @csrf
                                {{-- payment discription textarea --}}
                                <div class="form-group
                                @error('payment_description')
                                    has-danger
                                @enderror">
                                    <label for="payment_description"  class="control-label mb-2">Payment Discription  <span class="text-danger">*</span></label>
                                    <textarea class="form-control mb-3 @error('payment_description') form-control-danger @enderror" name="payment_description"
                                        id="payment_description" rows="3" placeholder="Enter Payment Discription"> @isset($tran){!!$tran->description!!}@endisset</textarea>
                                    @error('payment_description')
                                        <small class="form-control-feedback">{{ $message }}</small>
                                    @enderror
                                    {{-- date  --}}
                                    <div class="form-group
                                    @error('payment_date')
                                        has-danger
                                    @enderror">
                                        <label for="payment_date" class="control-label mb-2">Payment Date  <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"  name="payment_date"  id="datepicker-autoclose" placeholder="mm/dd/yyyy" @isset($tran) value="{{$tran->payment_date}}" @endisset  @error('payment_date') form-control-danger @enderror >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="icon-calender"></i></span>
                                            </div>
                                            @error('payment_date')
                                            <small class="form-control-feedback">{{ $message }}</small>
                                           @enderror
                                        </div>
                                        {{-- payment a Amount  --}}
                                        <div class="form-group 
                                        @error('payment_amount')
                                            has-danger
                                        @enderror">
                                            <label for="payment_amount" class="control-label mb-2 mt-2 ">Payment Amount  <span class="text-danger">*</span> </label>
                                            <input type="number"
                                                class="form-control mb-3 @error('payment_amount') form-control-danger @enderror"
                                                name="payment_amount" id="payment_amount" placeholder="Enter Payment Amount" @isset($tran)value="{{$tran->total_amount}}" @endisset>
                                            @error('payment_amount')
                                                <small class="form-control-feedback">{{ $message }}</small>
                                            @enderror
                                            {{-- invoice Number  --}}
                                            <div class="form-group
                                            @error('invoice_number')
                                                has-danger
                                            @enderror">
                                                <label for="invoice_number" class="control-label mb-2">Invoice Number  <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control mb-3 @error('invoice_number') form-control-danger @enderror"
                                                    name="invoice_number" id="invoice_number"
                                                    placeholder="Enter Invoice Number" @isset($tran) value="{{$tran->invoice_number}}" @endisset >
                                                @error('invoice_number')
                                                    <small class="form-control-feedback">{{ $message }}</small>
                                                @enderror
                                                {{-- Attachment  --}}
                                                <div class="form-group
                                                @error('attachment')
                                                    has-danger
                                                @enderror">
                                                    <label for="attachment" class="control-label mb-2">Attachment  <span class="text-danger">*</span></label>
                                                    <input type="file"
                                                        class="form-control @error('attachment') form-control-danger @enderror"
                                                        name="attachment" id="attachment" placeholder="Enter Attachment">
                                                    @isset($tran)
                                                        <img src="{{asset('storage/images/transaction/attach/'.$tran->attachment)}}" alt="img" srcset="" width="120px" height="120px">
                                                    @endisset
                                                        @error('attachment')
                                                        <small class="form-control-feedback">{{ $message }}</small>
                                                    @enderror



                                                    {{-- submit button --}}
                                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>


                            </form>
                        </div>


                        </div>


                    </div>
                </div>
            </div>
        @endsection
        <script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    