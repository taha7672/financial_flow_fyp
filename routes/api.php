<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\InvoiceController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
USE Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// login  user
Route::post('login', [UserController::class, 'login']);
// logout  
Route::middleware('auth:sanctum')->post('logout', [UserController::class, 'logout']);
// forgot password  user
Route::post('forgot-password', [UserController::class, 'forgotPassword']);
// reset password  user
Route::get('reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password/post', [UserController::class, 'resetPassword'])->name('reset.password.post');
// profile user
Route::middleware('auth:sanctum')->post('profile', [UserController::class, 'profile']);
// update user settings 
Route::middleware('auth:sanctum')->post('user-settings', [UserController::class, 'userSettings']);
// make group for customer  with 

Route::group(['prefix' => 'customer'], function () {
     // // create customer and edit customer id is optional in route 
    Route::middleware('auth:sanctum')->post('create/', [CustomerController::class, 'store']);
    // get all customer 
    Route::middleware('auth:sanctum')->post('/', [CustomerController::class, 'index']);
    // search customer 
    Route::middleware('auth:sanctum')->post('/detail', [CustomerController::class, 'show']);
   
});
//   make group for dashboard  with middleware('ApiAuthCheck)
Route::group(['prefix' => 'dashboard' ], function () {
    // get all dashboard 
    Route::middleware('auth:sanctum')->post('/', [DashboardController::class, 'index']);
   
});
//   make group for invoice with middleware 
Route::group(['prefix' => 'invoice'], function () {
    // get all invoice 
    Route::middleware('auth:sanctum')->post('/', [InvoiceController::class, 'getAllInvoicesReq']);
    Route::middleware('auth:sanctum')->post('/detail', [InvoiceController::class, 'getInvoiceDetailReq']);
    // create invoice 
    Route::middleware('auth:sanctum')->post('create', [InvoiceController::class, 'create']);
    // mapMethod 
    Route::middleware('auth:sanctum')->post('mapMethod', [InvoiceController::class, 'mapMethod']);
 
   
});
// make group for user transaction 
Route::group(['prefix' => 'transaction'], function () {
    // get all transaction 
    Route::middleware('auth:sanctum')->post('/', [TransactionController::class, 'transaction']);
    // transaction/create 
    Route::middleware('auth:sanctum')->post('/create', [TransactionController::class, 'create']);
    // applyDiscount 
    Route::middleware('auth:sanctum')->post('/applyDiscount', [TransactionController::class, 'applyDiscount']);

   
});


// testing with api authentication 


Route::get('/test', [UserController::class, 'test']); 
// cache clear route 
Route::get('/cache-clear', function () {
//  dd('ggg');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});




