@extends('layouts.links')


<div class="row justify-content-center  mx-0 border-0 rounded-3 align-middle"
    style="height: 100% ; background-color: rgba(15,100,88,.07); height:100%;">

    <div class="col-md-8 text-center">
        <h5 class="display-4 color fw-bold font-display mt-5">Login</h5>


        <div class="form-result"></div>

        <form class="mb-0" id="register" action="{{ route('login') }}" method="POST">
            @csrf


            <div class="row">
              

                <div class="col-md-12 ">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 form-group mb-4 ">
                            <input type="email" id="email" name="email"
                                class="rounded-pill form-control required" placeholder="Email" />
                            @error('email')
                                <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                     {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-8 form-group mb-4 ">
                            <input type="password" id="password" name="password" value=""
                                class="rounded-pill form-control required" placeholder="Password" />
                                @error('password')
                                <div class="alert alert-danger rounded-pill sty-error" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                    </div>
                </div>
            </div>
            @if (Route::has('password.request'))
                <div class="col-12 form-group mb-4">
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </div>
            @endif
            <div class="col-12 form-group mb-4">

                <button class="button button-large rounded-pill bg-color px-4 py-2 h-op-09 op-ts m-0"
                    type="submit">Login</button>
            </div>
    </div>



    </form>

</div>
