@extends('layouts.links')

<style>
    form{
    width:50%;
    margin:auto;
    margin-top: 20px;
}

.title{
    text-align:center;
    margin-bottom:20px;
    width:50%;
    margin:auto;
    margin-top: 20px;
    padding: 10px;
}

</style>
<body>
<div class="col-lg-12 mt-4">
    <div class="row gutter-40 col-mb-80 ">
        <div class="col-lg-12">
            <h3 class="title">Reset Password </h3>
       
                <form action="{{route('reset.password.post')}}" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
          

        </div>
    </div>
</div>


</body>
