@extends('layouts.links')


<body style=" background-color: rgba(15,100,88,.07); height:100%;">



    <div class="row justify-content-center  mx-0 border-0 rounded-3">

        <div class="col-md-8 text-center">
            <h5 class="display-4 color fw-bold font-display mt-4">Signup</h5>



            <div class="form-result"></div>

            <form class="mb-0" id="Signup" action="{{ route('signup') }}" method="POST">
                @csrf

                <div class="form-process">
                    <div class="css3-spinner">
                        <div class="css3-spinner-scaler"></div>
                    </div>
                </div>

                <div class="row">
                    <h4 class="display-6 color fw-bold font-display mt-4"> Personal Information</h4>
                    <div class="col-md-6">
                        <div class="row">



                            <div class="col-12 mb-3 ">
                                <label for="phone" class="reg-label">First Name <small>*</small></label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                    class="input-sty  required" placeholder="" />
                                @error('first_name')
                                    <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone" class="reg-label">Phone <small>*</small></label>
                                <input type="phone" name="phone" value="12015550123" class="input-sty required" />
                                @error('phone')
                                    <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="password" class="reg-label">Password <small>*</small></label>
                                <input type="password" id="password" name="password" value=""
                                    class="input-sty required" placeholder="" />
                                @error('password')
                                    <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12 mb-3 ">
                                <label for="last-name" class="reg-label">Last Name <small>*</small></label>
                                <input type="text" id="last_name" name="last_name" value=""
                                    class="input-sty required" placeholder="" />
                                @error('last_name')
                                    <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="email" class="reg-label">Email <small>*</small></label>
                                <input type="email" id="email" name="email" value=""
                                    class="required email input-sty" placeholder="" />
                                @error('email')
                                    <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3 ">
                                <label for="cPassword" class="reg-label">Confirm Password <small>*</small></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    value="" class="input-sty required" placeholder="" />
                                @error('password_confirmation')
                                    <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                        </div>


                    </div>


                </div>
         
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">



                            <div class="col-12 mb-3 ">
                                <label for="dob" class="reg-label">Date of birth <small>*</small></label>
                                <input type="date" name="dob" class="input-sty" name="last_name">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="dob" class="reg-label">Address Line 1 <small>*</small></label>
                                <input type="text" name="address_line1" value="127 South State Street"
                                    class="input-sty">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="postalCode" class="reg-label">Postal Code <small>*</small></label>
                                <input type="number" name="postal_code" value="03301" class="input-sty"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="profileURL" class="reg-label">Profile URL <small>*</small></label>
                                <input type="text" name="profile_url" placeholder="https://www.example.com"
                                    class="input-sty">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12 mb-3 ">
                                <label for="SSN" class="reg-label">Social security number
                                    <small>*</small></label>
                                <input type="number" name="ssn" value="123456789" class="input-sty">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="city" class="reg-label">City <small>*</small></label>
                                <input type="text" class="input-sty" name="city" value="Concord">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="state" class="reg-label">State <small>*</small></label>
                                <input type="text" value="NH" name="state" class="input-sty">
                            </div>
                        </div>
                        <div class="col-12 mb-3 ">
                            <div class="mb-3">
                                <label for="describition" class="reg-label">Product Description
                                    <small>*</small></label>
                                <input type="textarea" name="p_description" class="input-sty">
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="display-6 color fw-bold font-display mt-4"> Bank Information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">



                            <div class="col-12 mb-3 ">
                                <label for="dob" class="reg-label">Account Holder Name <small>*</small></label>
                                <input type="text" name="" class="input-sty" name="">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="dob" class="reg-label">Country <small>*</small></label>
                                <input type="text" name="" value="US" class="input-sty">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="postalCode" class="reg-label">Routing Number<small>*</small></label>
                                <input type="number" name="" value="123456789" class="input-sty"
                                    aria-describedby="emailHelp">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12 mb-3 ">
                                <label for="SSN" class="reg-label">Account Type<small>*</small></label>
                                <input type="text" name="" value="individual" class="input-sty">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="city" class="reg-label">Currency <small>*</small></label>
                                <input type="text" class="input-sty" name="" value="USD">
                            </div>
                            <div class="col-12 mb-3 ">
                                <label for="state" class="reg-label">Account Number <small>*</small></label>
                                <input type="number" value="110000000" name="" class="input-sty">
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-12 mb-3 row reg-label">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="privacy_policy" value="1"
                            id="flexCheckDefault" required>
                        <label class="form-check-label " for="flexCheckDefault" style="float: left">
                            I agree with the <a href="#" class="" style="color: rgb(76, 76, 226)">Privacy
                                policy</a>.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms_of_services" value="1"
                            id="flexCheckDefault" required>
                        <label class="form-check-label " for="flexCheckDefault" style="float: left">
                            I agree with the <a href="#" class="" style="color: rgb(76, 76, 226)">Terms
                                of services</a>.
                        </label>
                    </div>

                </div>

                <div class="col-12 form-group ">
                    <a href="{{ route('login') }}">Already Signup?</a>
                </div>
                <div class="col-12 form-group ">

                    <button class="button button-large rounded-pill bg-color px-4 py-2 h-op-09 op-ts m-0"
                        type="submit">Signup</button>
                </div>
        </div>



        </form>

    </div>
    </div>
</body>
