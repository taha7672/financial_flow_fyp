@extends('Backend.layouts.app')

@section('admin_content')
<div class="page-wrapper"> 
    <div class="container mt-4" style="width: 60%;">

<form action="{{route('payout')}} " method="post">
    @csrf
    <div class="form-group">
        <label for="amount">Payout Amount</label>
        <input type="text" name="payout_amount" id="amount" class="form-control">
    </div>
  
    <div class="form-group">
        <label for="destination">Stripe Account ID </label> <small> acct_1Lmy20Q65KdZNlzJ </small>
        <input type="text" name="account" id="destination" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Payout</button>
    </div>
</form>
       
</div>


</div>
@endsection