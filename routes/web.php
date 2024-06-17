<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\Invoices_ReportController;
use App\Http\Controllers\Customers_ReportController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoicesDetailsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assign
ed to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('admin.home');
});
Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionController::class);
Route::resource('products', ProductController::class);


Route::resource('invoiceattachments', InvoicesAttachmentsController::class);
Route::get('section/{id}', [InvoicesController::class, 'getproducts']);
Route::get('InvoicesDetails/{id}', [InvoicesDetailsController::class, 'edit']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'open_file']);
Route::post('delete_file', [InvoicesDetailsController::class,'destroy'])->name('delete_file');
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class,'get_file']);
Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);
Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');
Route::post('/status_update/{id}', [InvoicesController::class,'status_update'])->name('status_update');

Route::resource('archive', InvoiceAchiveController::class);

Route::get('invoice_paid',[InvoicesController::class,'Invoice_Paid']);

Route::get('invoice_unPaid',[InvoicesController::class,'Invoice_UnPaid']);

Route::get('invoice_partial',[InvoicesController::class,'Invoice_Partial']);

Route::get('print_invoice/{id}',[InvoicesController::class,'Print_invoice']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    });

    Route::get('invoices_report', [Invoices_ReportController::class,'index']);
    Route::post('Search_invoices', [Invoices_ReportController::class,'Search_invoices']);

    Route::get('customers_report', [Customers_ReportController::class,'index'])->name("customers_report");
    Route::post('Search_customers', [Customers_ReportController::class, 'Search_customers']);
    Route::get('MarkAsRead_all',[InvoicesController::class,'MarkAsRead_all'])->name('MarkAsRead_all');

   
     Route::get('/{page}', [AdminController::class,'index']);







