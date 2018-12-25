<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

//CUSTOMER
Route::get('/Customers', 'AdminControllers\CustomerController@ShowAllCustomer');
Route::get('/Customer/Add', 'AdminControllers\CustomerController@AddCustomer');
Route::post('/Customer/Add', 'AdminControllers\CustomerController@SaveCustomer')->name('AddCustomer');



//SUB CUSTOMER
Route::get('/subCustomers', 'AdminControllers\SubCustomerController@ShowAllSubCustomer');
Route::get('/SubCustomer/Add', 'AdminControllers\SubCustomerController@AddSubCustomer');
Route::post('/SubCustomer/Add', 'AdminControllers\SubCustomerController@SaveSubCustomer')->name('AddSubCustomer');