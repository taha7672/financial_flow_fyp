
@extends('layouts.links')
<x-guest-layout>
<div class="row justify-content-center  mx-0 border-0 rounded-3 align-middle"
    style="height: 100% ; background-color: rgba(15,100,88,.07);">

    <div class="col-md-6 text-center">
        <h5 class="display-4 color fw-bold font-display mt-5">Forgot Password</h5>
        

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row d-flex justify-content-center">
                    <p class="col-md-8 form-group mb-4 ">Forgot your password? No problem. Just let us know your email
                        address and we will email you a password reset link that will allow you to choose a new one.</p>
                    <div class="col-md-8 form-group mb-4 ">
                        <input type="email" id="email" name="email" class="rounded-pill form-control required"
                            placeholder="Email" />
                    </div>
                </div>
                <div class="col-12 form-group mb-4">

                    <button class="button button-large rounded-pill bg-color px-4 py-2 h-op-09 op-ts m-0"
                        type="submit">Password Reset</button>
                </div>
            </form>
   
    </div>
</x-guest-layout>