<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Stripe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7\Response;
use App\Models\Backend\StripeClient;
use Illuminate\Support\Carbon;
use App\Models\Backend\Invoice;
use App\Models\Backend\StripeReceipt;






class StripeController extends Controller
{
  //   strip secret key from .env file as a constructor
  public function __construct()
  {

    $this->stripeSecretKey = env('STRIPE_SECRET');
    $this->stripePublishableKey = env('STRIPE_KEY');
  }

  /**
   * Display the registration view.
   *
   * @return \Illuminate\View\View
   */




  public function store(Request $request)
  {
    $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'phone' => ['required', 'string', 'max:255'],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
      // 'address' => ['required', 'string', 'max:255'],
      // 'privacy_policy'=> 'required',
      // 'terms_of_services'=> 'required',
    ]);

    $user = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'phone' => $request->phone,
      // 'address' => $request->address,
      // combine address line1 city state and zip code into one address
      'address' => $request->address_line1 . ' ' . $request->city . ' ' . $request->state . ' ' . $request->postal_code,
      'password' => Hash::make($request->password),
      'privacy_policy' => $request->privacy_policy,
      'terms_of_services' => $request->terms_of_services,
    ]);
    $date = Carbon::parse($request->dob);
    $day = $date->day;
    $month = $date->month;
    $year = $date->year;

    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

    $account = $stripe->accounts->create(
      [
        'country' => 'US',
        'type' => 'custom',
        'requested_capabilities' => ['card_payments', 'transfers'],
        'business_type' => 'individual',
        'individual' => [
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'id_number' => $request->ssn,                           // social security number
          'dob' => [
            'day' => $day,
            'month' => $month,
            'year' => $year,
          ],
          'address' => [
            'line1' => $request->address_line1,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => 'US',
          ],
        ],
        'business_profile' => [
          'url' => $request->profile_url,
          'mcc' => '5734',
          'product_description' => $request->p_description,
        ],
        'tos_acceptance' => [
          'date' => time(),
          'ip' => $_SERVER['REMOTE_ADDR'], // Assumes you're not using a proxy
        ],
        'external_account' => [
          'object' => 'bank_account',
          'country' => 'US',
          'currency' => 'usd',
          'account_holder_name' => 'test',
          'account_holder_type' => 'individual',
          'routing_number' => '110000000',
          'account_number' => '000123456789',
        ],



      ]
    );

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $file = \Stripe\File::create([
      'purpose' => 'identity_document',
      'file' => fopen('F:\success.png', 'r'),
    ], [
      'stripe_account' => $account->id,

    ]);
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $update = \Stripe\Account::update(
      $account->id,
      [
        'individual' => [
          'verification' => [
            'document' => [
              'front' => $file->id,
            ],
          ],
        ],
      ]


    );

    $client_account =  StripeClient::create([
      'user_id' => $user->id,
      'stripe_account_id' => $account->id,
      'stripe_account_status' => 'pending',
    ]);

    // event(new Registered($user));

    // Auth::login($user);

    return redirect()->route('home')->with('success', 'User created Successfully');
  }

  //  charge the customer accoding to the invoice 
  public function payment(Request $request)
  {
      
    //    charge amount to customer into stripe account
    $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    $charge = $stripe->charges->create([
      'currency' => 'USD',
      'source' => $request->stripeToken,
      'amount' => 100 * $request->amount,
      'description' => '',
      'destination' => [
        'account' => $request->account,
      ],


    ]);


    // receipt_url is the url of the receipt of the payment

    $receipt_url = $charge->receipt_url;
    $stripe_receipt = StripeReceipt::create([
      'user_id' => 51,           //will be changed 
      'customer_id' => 3,         //will be changed
      'stripe_charge_id' => $charge->id,
      'stripe_receipt_url' => $receipt_url,
      'stripe_receipt_amount' => $charge->amount / 100,
      'stripe_receipt_status' => $charge->status,
      'stripe_receipt_created' => $charge->created,
      'stripe_receipt_currency' => $charge->currency,


    ]);

    //  update the invoice paid status to paid from 0 to 1
    $invoice = Invoice::find($request->invoice_id);
    $invoice->paid_status = 1;
    $invoice->save();
    


    return redirect()->route('invoices')->with('success', 'Payment Successful');
     
 
     
    

  }
  // payouts from stripe connect account to his bank account

  public function payoutPage()
  {

    return view('Backend.pages.stripe.test-payout');
  }

  public function payout(Request $request)
  {

    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $payout = \Stripe\Payout::create([
      'amount' => 100 * $request->payout_amount,
      'currency' => 'usd',

    ], [
      'stripe_account' => $request->account,
    ]);
   dd($payout);
    return redirect()->route('payout.page')->with('success', 'Payout done Successfully');
  }
}
