<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {


    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('invoices', "InvoicesController");

    Route::resource('sections', "SectionsController");

    Route::resource('products', "ProductsController");

    Route::resource('InvoiceAttachments', "InvoiceAttachmentsController");

    Route::resource('Archive_Invoice', 'InvoiceAchiveController');



    Route::get('Invoices_Paid', "InvoicesController@Invoices_Paid");
    Route::get('Invoices_Partial', "InvoicesController@Invoices_Partial");
    Route::get('Invoices_UnPaid', "InvoicesController@Invoices_UnPaid");

    Route::get('invoices_report', "Invoices_Report@index");
    Route::post('search_invoices', "Invoices_Report@search_invoices");


    Route::get('customers_report', "Customers_Report@index");
    Route::post('search_customers', "Customers_Report@search_customers");


    Route::get('/section/{id}', "InvoicesController@getproducts");

    Route::get('/InvoicesDetails/{id}', "InvoicesDetailsController@edit");

    Route::get('Print_invoice/{id}', "InvoicesController@Print_invoice");

    Route::get('MarkAsRead_all', 'InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

    Route::get('/edit_invoice/{id}', "InvoicesController@edit");

    Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');

    Route::post('/Status_Update/{id}', "InvoicesController@Status_Update")->name('Status_Update');




    Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');
    Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');
    Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');

    Route::get('export_invoices', 'InvoicesController@export');


    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');




    // End Routes
    Route::get('/{page}', 'AdminController@index');
});
