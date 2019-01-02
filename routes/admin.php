<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');


//AJAX
Route::get('/getSubCustomerData', 'AdminControllers\SubCustomerController@getSubCustomerData');


//CUSTOMER
Route::get('/units', 'AdminControllers\UnitController@ShowAllUnits');
Route::get('/unit/Add', 'AdminControllers\UnitController@AddUnit');
Route::post('/unit/Add', 'AdminControllers\UnitController@SaveUnit')->name('AddUnit');


//CUSTOMER
Route::get('/Customers', 'AdminControllers\CustomerController@ShowAllCustomer');
Route::get('/Customer/Add', 'AdminControllers\CustomerController@AddCustomer');
Route::post('/Customer/Add', 'AdminControllers\CustomerController@SaveCustomer')->name('AddCustomer');



//SUB CUSTOMER
Route::get('/subCustomers', 'AdminControllers\SubCustomerController@ShowAllSubCustomer');
Route::get('/SubCustomer/Add', 'AdminControllers\SubCustomerController@AddSubCustomer');
Route::post('/SubCustomer/Add', 'AdminControllers\SubCustomerController@SaveSubCustomer')->name('AddSubCustomer');



//Beam Product
Route::get('/Product/Beam', 'AdminControllers\BeamController@ShowAllCustomerBeam');
Route::get('/Product/beam/Add', 'AdminControllers\BeamController@AddCustomerBeam');
Route::post('/Product/beam/Add', 'AdminControllers\BeamController@saveIncomeBeam')->name('addIncomeBeam');