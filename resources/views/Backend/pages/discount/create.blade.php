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
                    @isset($discount)
                        <h4 class="text-themecolor">Edit Discount</h4>
                    @else
                        <h4 class="text-themecolor">Apply Discount</h4>
                    @endisset

                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }} ">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('discounts') }} ">Discount</a></li>
                            @isset($discount)
                                <li class="breadcrumb-item active">Edit Discount</li>
                            @else
                                <li class="breadcrumb-item active">Apply Discount</li>
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
                                    @isset($discount)
                                        action="{{ route('update.discount', $discount->id) }}"
                                    @else
                                     action="{{ route('store.discount') }}" 
                                    @endisset
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- payment discription textarea --}}
                                    <div
                                        class="form-group
                                @error('discount_discription')
                                    has-danger
                                @enderror">
                                        <label for="discount_discription" class="control-label mb-2">Discount Discription
                                            <span class="text-danger">*</span></label>
                                        <textarea class="form-control mb-3 @error('discount_discription') form-control-danger @enderror"
                                            name="discount_discription" id="discount_discription" rows="3"   placeholder="Enter Discount Discription">@isset($discount){!!$discount->description!!}@endisset</textarea>
                                        @error('discount_discription')
                                            <small class="form-control-feedback">{{ $message }}</small>
                                        @enderror

                                        {{-- payment a Amount  --}}
                                        <div
                                            class="form-group
                                        @error('discount_amount')
                                            has-danger
                                        @enderror">
                                            <label for="discount_amount" class="control-label mb-2 ">Discount Amount <span
                                                    class="text-danger">*</span> </label>
                                            <input type="number"
                                                class="form-control mb-3 @error('discount_amount') form-control-danger @enderror"
                                                name="discount_amount" id="discount_amount"
                                                placeholder="Enter Discount Amount" @isset($discount) value="{{$discount->amount}}" @endisset>
                                            @error('discount_amount')
                                                <small class="form-control-feedback">{{ $message }}</small>
                                            @enderror
                                            {{-- invoice Number  --}}
                                            <div
                                                class="form-group
                                            @error('invoice_number')
                                                has-danger
                                            @enderror">
                                                <label for="invoice_number" class="control-label mb-2">Invoice Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control mb-3 @error('invoice_number') form-control-danger @enderror"
                                                    name="invoice_number" id="invoice_number" @isset($discount) value="{{$discount->invoice_number}}" @endisset
                                                    placeholder="Enter Discount Number">
                                                @error('invoice_number')
                                                    <small class="form-control-feedback">{{ $message }}</small>
                                                @enderror
                                                {{-- date  --}}
                                                <div
                                                    class="form-group
                                    @error('discount_date')
                                        has-danger
                                    @enderror">
                                                    <label for="discount_date" class="control-label mb-2">Discount Date
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control " name="discount_date"
                                                            id="datepicker-autoclose" placeholder="mm/dd/yyyy"
                                                            @error('discount_date') form-control-danger @enderror  @isset($discount) value="{{$discount->discount_date}}" @endisset >
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="icon-calender"></i></span>
                                                        </div>
                                                        @error('discount_date')
                                                            <small class="form-control-feedback">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    {{-- Attachment  --}}
                                                    <div
                                                        class="form-group
                                                @error('attachment')
                                                    has-danger
                                                @enderror">
                                                        <label for="attachment" class="control-label mb-2 mt-2">Attachment
                                                            <span class="text-danger">*</span></label>
                                                        <input type="file"
                                                            class="form-control @error('attachment') form-control-danger @enderror"
                                                            name="attachment" id="attachment" placeholder="Enter Attachment"> 
                                                            @isset($discount)
                                                            <img src="{{asset('storage/images/discount/attach/'.$discount->attachment)}}" alt="img" srcset="" width="120px" height="120px">
                                                            @endisset
                                                        @error('attachment')
                                                            <small class="form-control-feedback">{{ $message }}</small>
                                                        @enderror
                                                        <style>
                                                            .dis-btn-sty {
                                                                float: right;
                                                                margin: 10px;
                                                            }
                                                        </style>
                                                     @isset($discount)
                                                     <input type="hidden" value="{{$discount->id}}">
                                                     @endisset

                                                <button type="submit" class="btn btn-primary mt-3 dis-btn-sty">Apply Discount</button>


                                </form>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        @endsection
        <script src="{{ asset('backend/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
