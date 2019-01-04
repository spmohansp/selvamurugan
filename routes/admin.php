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


//UNIT
Route::get('/units', 'AdminControllers\UnitController@ShowAllUnits');
Route::get('/unit/Add', 'AdminControllers\UnitController@AddUnit');
Route::post('/unit/Add', 'AdminControllers\UnitController@SaveUnit')->name('AddUnit');
Route::get('/units/{id}/edit', 'AdminControllers\UnitController@EditUnits')->name('unitEdit');
Route::post('/units/{id}/update', 'AdminControllers\UnitController@UpdateUnits')->name('unitUpdate');


//CUSTOMER
Route::get('/Customers', 'AdminControllers\CustomerController@ShowAllCustomer');
Route::get('/Customer/Add', 'AdminControllers\CustomerController@AddCustomer');
Route::post('/Customer/Add', 'AdminControllers\CustomerController@SaveCustomer')->name('AddCustomer');
Route::get('/Customer/{id}/edit','AdminControllers\CustomerController@EditCustomer');
Route::post('/Customer/{id}/update','AdminControllers\CustomerController@UpdateCustomer')->name('updateCustomer');
Route::delete('/Customer/{id}/delete','AdminControllers\CustomerController@DeleteCustomer')->name('deleteCustomer');



//SUB CUSTOMER
Route::get('/subCustomers', 'AdminControllers\SubCustomerController@ShowAllSubCustomer');
Route::get('/SubCustomer/Add', 'AdminControllers\SubCustomerController@AddSubCustomer');
Route::get('/subCustomer/{id}/edit','AdminControllers\SubCustomerController@EditsubCustomer');
Route::post('/subcustomer/{id}/update','AdminControllers\SubCustomerController@UpdatesubCustomer')->name('updatesubCustomer');
Route::delete('/subcustomer/{id}/delete','AdminControllers\SubCustomerController@DeletesubCustomer')->name('deletesubCustomer');
Route::post('/SubCustomer/Add', 'AdminControllers\SubCustomerController@SaveSubCustomer')->name('AddSubCustomer');



//Beam Product
Route::get('/Product/beam', 'AdminControllers\BeamController@ShowAllCustomerBeam');
Route::get('/Product/beam/Add', 'AdminControllers\BeamController@AddCustomerBeam');
Route::post('/Product/beam/Add', 'AdminControllers\BeamController@saveIncomeBeam')->name('addIncomeBeam');


//Yarn Product
Route::get('/Product/yarn', 'AdminControllers\YarnController@ShowAllCustomerYarn');
Route::get('/Product/yarn/Add', 'AdminControllers\YarnController@AddCustomerYarn');
Route::post('/Product/yarn/Add', 'AdminControllers\YarnController@saveIncomeYarn')->name('addIncomeYarn');

//Chemical
Route::get('/chemicals', 'AdminControllers\ChemicalController@ShowAllCustomerChemical');
Route::get('Chemicals/Add', 'AdminControllers\ChemicalController@AddChemical');
Route::post('Chemicals/AddChemical', 'AdminControllers\ChemicalController@saveChemical')->name('AddChemical');
Route::get('Chemicals/{id}/edit', 'AdminControllers\ChemicalController@EditChemical')->name('EditChemical');
Route::post('Chemicals/{id}/update', 'AdminControllers\ChemicalController@UpdateChemical')->name('UpdateChemical');
Route::delete('Chemicals/{id}/delete', 'AdminControllers\ChemicalController@DeleteChemical')->name('DeleteChemical');