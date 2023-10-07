<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
// Auth::routes(['register'=>false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionsController::class);
Route::resource('products', ProductsController::class);
Route::resource('InvoiceAttachments', InvoicesAttachmentsController::class);
Route::get('/section/{id}', [InvoicesController::class, 'getProducts']);
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, 'edit']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'viewFile']);
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'download']);
Route::post('/delete_file', [InvoicesDetailsController::class, 'destroy']);
Route::get('/status_update/{id}', [InvoicesController::class, 'status_update']);
Route::post('/invoices_paye', [InvoicesController::class, 'paye']);
Route::post('/archives', [InvoicesController::class, 'archive']);
Route::get('/edit_invoices/{id}', [InvoicesController::class, 'edit']);
Route::get('/invoices_unpaid', [InvoicesController::class, 'invoices_unpaid']);
Route::get('/invoices_paid', [InvoicesController::class, 'invoices_paid']);
Route::get('/invoices_Partial', [InvoicesController::class, 'invoices_Partial']);
Route::resource('archive', ArchiveController::class);
// redirect à la page archive
Route::get('/archive_invoices', [ArchiveController::class, 'index']);
Route::get('/print_invoices/{id}', [InvoicesController::class, 'Print']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::get('invoices_report', [ReportsController::class, 'index'] );

Route::post('Search_invoices',[ReportsController::class, 'Search_invoices'] );

Route::get('invoices_customer', [CustomerController::class, 'index'] );
Route::post('Search_customers',[CustomerController::class, 'Search_customers'] );

Route::get('markAsread_all',[InvoicesController::class, 'markAsReadAll'] );
Route::get('/{page}', [AdminController::class, 'index']);
