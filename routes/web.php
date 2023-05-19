<?php

use App\Http\Controllers\Backend\AdminHomeController;
use App\Http\Controllers\Backend\PlansController;
use App\Http\Controllers\Backend\ClientsController;
use App\Http\Controllers\Backend\InvoicesController;
use App\Http\Controllers\Backend\MyProfileController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\UserRoleController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\LadgerController;
use App\Http\Controllers\Adminauth\RegisteredUserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Backend\ReceivableController;
use App\Http\Controllers\Backend\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adminauth\AuthenticatedSessionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Backend\AdminUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
// admin 
// Route::get('/admin/dashboard', function () {
//     return view('Admin.dashboard');
// })->middleware(['auth:admin'])->name('admin.dashboard');

require __DIR__ . '/Adminauth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
// stripe.store
Route::post('signup', [StripeController::class, 'store']);
Route::get('admin', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('dashboard')->middleware('auth:admin', 'permission:Dashboard');
    Route::get('admin/dashboard/getPayments', [AdminHomeController::class, 'getPayments'])->name('getPayments');
    Route::get('admin/admins', [RegisteredUserController::class, 'admins'])->name('admins');
    Route::get('admin/admins/create', [RegisteredUserController::class, 'create'])->name('create.admin');
    Route::post('admin/admins/store-admin', [RegisteredUserController::class, 'store'])->name('store.admin');
    Route::get('admin/admins/edit/{id}', [RegisteredUserController::class, 'edit'])->name('edit.admin');
    Route::post('admin/admins/update/{id}', [RegisteredUserController::class, 'update'])->name('update.admin');
    Route::get('admin/admins/delete/{id}', [RegisteredUserController::class, 'delete'])->name('delete.admin');
    // myprofile routes 
    Route::get('admin/myprofile', [MyProfileController::class, 'index'])->name('myprofile');
    Route::post('admin/myprofile/update', [MyProfileController::class, 'update'])->name('myprofile.update');
    // account setting 
    Route::get('admin/account-setting', [MyProfileController::class, 'accountSetting'])->name('account.setting');
    // Plans routes
    Route::get('admin/plans', [PlansController::class, 'index'])->name('plans')->middleware('auth:admin', 'permission:Plans');
    Route::get('admin/create-plan', [PlansController::class, 'create'])->name('create.plan')->middleware('auth:admin', 'permission:Create Plans');
    Route::post('admin/create-plan/store', [PlansController::class, 'store'])->name('store.plan')->middleware('auth:admin', 'permission:Create Plans');
    // status change 
    Route::get('admin/plans-status', [PlansController::class, 'status'])->name('plan.status')->middleware('auth:admin', 'permission:Plans');
    // edit plan
    Route::get('admin/edit-plan/{id}', [PlansController::class, 'edit'])->name('edit.plan')->middleware('auth:admin', 'permission:Edit Plans');
    Route::post('admin/edit-plan/update/{id}', [PlansController::class, 'update'])->name('update.plan')->middleware('auth:admin', 'permission:Edit Plans');
    // delete plan
    Route::GET('admin/delete-plan/{id}', [PlansController::class, 'delete'])->name('delete.plan')->middleware('auth:admin', 'permission:Delete Plans');
    // cusomers
    Route::get('admin/customers', [CustomerController::class, 'index'])->name('customers')->middleware('auth:admin', 'permission:View Customers');
    // status change
    Route::get('admin/customers-status', [CustomerController::class, 'status'])->name('customer.status')->middleware('auth:admin', 'permission:View Customers');
    // create customer 
    Route::get('admin/create-customer', [CustomerController::class, 'create'])->name('create.customer')->middleware('auth:admin', 'permission:Create Customers');
    Route::post('admin/create-customer/store', [CustomerController::class, 'store'])->name('store.customer')->middleware('auth:admin', 'permission:Create Customers');
    // edit customer
    Route::get('admin/edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit.customer')->middleware('auth:admin', 'permission:Edit Discount');
    Route::post('admin/edit-customer/update/{id}', [CustomerController::class, 'update'])->name('update.customer')->middleware('auth:admin', 'permission:Edit Discount');
    // delete customer
    Route::GET('admin/delete-customer/{id}', [CustomerController::class, 'delete'])->name('delete.customer')->middleware('auth:admin', 'permission:Delete Customers');
    // customer.search
    Route::post('admin/customer/search', [TransactionController::class, 'search'])->name('customer.search');
    //search client
    Route::post('admin/client-filter', [ClientsController::class, 'clientFilter'])->name('client.search');
    Route::get('admin/clients', [ClientsController::class, 'index'])->name('clients');
    // create client
    Route::get('admin/create-client', [ClientsController::class, 'create'])->name('create.client')->middleware('auth:admin', 'permission:Create Clients');
    Route::post('admin/create-client/store', [ClientsController::class, 'store'])->name('store.client')->middleware('auth:admin', 'permission:Create Clients');
    //  delete client
    Route::GET('admin/delete-client/{id}', [ClientsController::class, 'delete'])->name('delete.client')->middleware('auth:admin', 'permission:Delete Clients');
    // status change 
    Route::get('admin/clients-status', [ClientsController::class, 'statusChange'])->name('status.change');
    // invoices
    Route::get('admin/invoices', [InvoicesController::class, 'index'])->name('invoices')->middleware('auth:admin', 'permission:Invoices');
    Route::get('admin/invoices/get', [InvoicesController::class, 'getInvoice'])->name('get.invoices');
    // create invoice
    Route::get('admin/create-invoice', [InvoicesController::class, 'create'])->name('create.invoice')->middleware('auth:admin', 'permission:Create Invoices');
    // client & customer search in invoice
    Route::post('admin/client/search', [InvoicesController::class, 'clientSearch'])->name('client.search');
    Route::post('admin/inv-customer/search', [InvoicesController::class, 'customerSearch'])->name('customer.search');

    // make a group with prefix admin/invoice
    Route::prefix('admin/invoice')->group(function () {
        Route::post('/customer/select/{id}', [InvoicesController::class, 'selectCustomer'])->name('customer.select')->middleware('auth:admin', 'permission:View Invoices');
    });
    // store invoice
    Route::post('admin/create-invoice/store', [InvoicesController::class, 'store'])->name('store.invoice')->middleware('auth:admin', 'permission:Create Invoices');
    Route::get('admin/invoice-delete/{id}', [InvoicesController::class, 'delete'])->name('invoice.delete')->middleware('auth:admin', 'permission:Delete Invoices');
    Route::get('admin/invoice/mark-comp/{id}', [InvoicesController::class, 'markComplete'])->name('mark.complete');
    // filters 
    Route::post('admin/customer/filter', [InvoicesController::class, 'customerFilter'])->name('customer.filter');
    Route::post('admin/client/filter', [InvoicesController::class, 'clientFilter'])->name('client.filter');
    Route::post('admin/invoice/filter', [InvoicesController::class, 'filterInvoice'])->name('filter.invoice');
    Route::get('admin/inv-detail/{inv_uinque_key}', [InvoicesController::class, 'invDetails'])->name('inv.details');
    Route::post('admin/invoice/payment', [StripeController::class, 'payment'])->name('invoice.payment');
    Route::get('admin/payout', [StripeController::class, 'payoutPage'])->name('payout.page');
    Route::post('admin/payout/to-bank', [StripeController::class, 'payout'])->name('payout');

    ### discount ### 
    Route::group(['prefix' => 'admin/discount', 'middleware' => ['auth:admin', 'permission:Discounts']], function () {
        Route::get('/index', [DiscountController::class, 'index'])->name('discounts');
        Route::get('/create', [DiscountController::class, 'create'])->name('create.discount')->middleware('auth:admin', 'permission:Apply Discount');
        Route::post('/store', [DiscountController::class, 'store'])->name('store.discount')->middleware('auth:admin', 'permission:Apply Discount');
        Route::delete('/delete/{id}', [DiscountController::class, 'delete'])->name('delete.discount')->middleware('auth:admin', 'permission:Delete Discount');
        Route::get('/edit/{id}', [DiscountController::class, 'edit'])->name('edit.discount')->middleware('auth:admin', 'permission:Edit Discount');
        Route::post('/update/{id}', [DiscountController::class, 'update'])->name('update.discount')->middleware('auth:admin', 'permission:Edit Discount');
        Route::get('/getDiscounts', [DiscountController::class, 'getDiscounts'])->name('getDiscounts');
    });
    ### TRANSCATION ###
    Route::group(['prefix' => 'admin/transaction', 'middleware' => ['auth:admin', 'permission:Payments']], function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transactions');
        Route::get('/create', [TransactionController::class, 'create'])->name('create.transaction')->middleware('auth:admin', 'permission:Add Payments');
        Route::post('/store', [TransactionController::class, 'store'])->name('store.transaction')->middleware('auth:admin', 'permission:Add Payments');
        Route::delete('/delete/{id}', [TransactionController::class, 'delete'])->name('delete.transaction')->middleware('auth:admin', 'permission:Delete Payments');
        Route::get('/edit/{id}', [TransactionController::class, 'edit'])->name('edit.transaction')->middleware('auth:admin', 'permission:Edit Payments');
        Route::post('/update/{id}', [TransactionController::class, 'update'])->name('update.transaction')->middleware('auth:admin', 'permission:Edit Payments');
    });
    ### ladgers ###
    Route::group(['prefix' => 'admin/ladger'], function () {
        Route::get('/index', [LadgerController::class, 'index'])->name('ladgers');
        Route::post('/getLadgers', [LadgerController::class, 'getLadgers'])->name('get.ladgers');
    });

    #### user-role  ###
    Route::group(['prefix' => 'admin/user-role', 'middleware' => ['auth:admin', 'permission:Admin Users']], function () {
        Route::get('/permission', [UserRoleController::class, 'permisssion'])->name('permission');
        Route::get('/index', [UserRoleController::class, 'index'])->name('userRoles');
        Route::get('/create', [UserRoleController::class, 'create'])->name('create.userRole')->middleware('auth:admin', 'permission:Create Admin');
        Route::post('/store', [UserRoleController::class, 'store'])->name('store.userRole')->middleware('auth:admin', 'permission:Create Admin');
        Route::get('/delete/{id}', [UserRoleController::class, 'destroy'])->name('delete.userRole')->middleware('auth:admin', 'permission:Delete Admin');
        Route::get('/edit/{id}', [UserRoleController::class, 'edit'])->name('edit.userRole')->middleware('auth:admin', 'permission:Edit Admin');
        Route::post('/update/{id}', [UserRoleController::class, 'update'])->name('update.userRole')->middleware('auth:admin', 'permission:Edit Admin ');
    });
    ### RECEVIABLES ###
    Route::group(['prefix' => 'admin/receivables' , 'middleware' => ['auth:admin', 'permission:Receivables']], function () {
        Route::get('/index', [ReceivableController::class, 'index'])->name('receivables');
        Route::get('/getReceivable', [ReceivableController::class, 'getReceivable'])->name('get.receivable');
    });
    ### REPORTS ###
    Route::group(['prefix' => 'admin/reports', 'middleware' => ['auth:admin', 'permission:Reports']], function () {
        Route::get('/index', [ReportsController::class, 'index'])->name('reports');
        Route::post('/pdf', [ReportsController::class, 'PDF'])->name('pdf');
    });
    // searchRole 
    Route::post('admin/user-role/search', [RegisteredUserController::class, 'searchRole'])->name('role.search');
});
