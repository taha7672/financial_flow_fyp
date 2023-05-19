<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Backend\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    // login api for user and create a bearer token for user 
    public function login(Request $request)
    {
        $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ]);
                }
              
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized User'
            ]);
        }
        // get the user by email and password 

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('token')->plainTextToken;
        // return $token;

        // ['token' => $token->plainTextToken];

        if ($user && $token) {
            return response()->json([
                'status' => true,
                'message' => 'Login Successfully',
                'data' => [
                    'token' => $token,
                    'user' => $user
                ]
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Invalid Credentials',
            'data' => []
        ]);
    }

    // api logout for user and delete the bearer token for user 

    public function logout(Request $request)
    {
        $user = request()->user(); //or Auth::user()
        // Revoke current user token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout Successfully',
        ]);
    }
    // forgot password for user using mailtrap 
    public function forgotPassword(Request $request)
    {
   
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('MobileApp.forgot-password-email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return response()->json([
            'status' => true,
            'message' => 'We have e-mailed your password reset link!',
           
       
        ]);

       
    }
//  show form 
// showResetPasswordForm 
    public function showResetPasswordForm($token)
    {
        return view('MobileApp.reset-password-form', ['token' => $token]);
    }
    // testreset 
  
  

    // reset password for user using mailtrap 

    public function resetPassword(Request $request)
    {
     
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return 
        response()->json([
            'status' => true,
            'message' => 'Your password has been changed!',
        ]);


        }


    // profile of loggedin user 
    public function profile(Request $request)
    {
        $user = Auth()->user()->id;
        $user = User::find($user);
        // update user profile

        $user->address = $request->address;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'Profile Updated Successfully',
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Profile Not Updated',
                'data' => []
            ]);
        }
    }
    // user settings 
    public function userSettings(Request $request)
    {
        // return 'user setting';
        $user = Auth()->user()->id;
        // upade usersetting if it has already user_setting 
        $userSetting = UserSetting::where('user_id', $user)->first();
        if ($userSetting) {
            $userSetting->user_id = $user;
            $userSetting->auto_tax = $request->auto_tax;
            $userSetting->tax_rate = $request->tax_rate;
            $userSetting->auto_inv_number = $request->auto_inv_number;
            $userSetting->inv_number_format = $request->inv_number_format;
            $userSetting->cus_number_format = $request->cus_number_format;
            $userSetting->setting_updated = $request->setting_updated;
            $userSetting->save();
            if ($userSetting) {
                return response()->json([
                    'status' => true,
                    'message' => 'User Setting Updated Successfully',
                    'data' => $userSetting,

                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'User Setting Not Updated',
                    'data' => []
                ]);
            }
        }
        $user_setting = UserSetting::create([
            'user_id' => $user,
            'auto_tax' => $request->auto_tax,
            'tax_rate' => $request->tax_rate,
            'auto_inv_number' => $request->auto_inv_number,
            'inv_number_format' => $request->inv_number_format,
            'cus_number_format' => $request->cus_number_format,
            'setting_updated' => $request->setting_updated,
        ]);
        if ($user_setting) {
            return response()->json([
                'status' => true,
                'message' => 'User Settings Updated Successfully',
                'data' => $user_setting
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User Settings Not Updated',
                'data' => []
            ]);
        }
    }










    // test 
    public function test(Request $request)
    {
        return 'test';
        $url = Storage::url('public\storage\images\invoices\attach\1670252433_shower-line-icon.png');
        return $url;
        $test = 'this is testing message ';
        return response()->json([
            'status' => true,
            'message' => 'test',
            'data' => [
                'test' => $test
            ]
        ]);
    }
}
