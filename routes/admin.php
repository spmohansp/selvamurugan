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

//Chemical Names
Route::get('/chemicalsProduct', 'AdminControllers\ChemicalProductsController@ShowAllCustomerChemicalProduct');
Route::get('/ChemicalProduct/Add', 'AdminControllers\ChemicalProductsController@AddChemical');
Route::post('/ChemicalProducts/AddChemical', 'AdminControllers\ChemicalProductsController@saveChemical')->name('AddChemicalProduct');
Route::get('/ChemicalProducts/{id}/edit', 'AdminControllers\ChemicalProductsController@EditChemical')->name('EditChemicalProduct');
Route::post('/ChemicalProducts/{id}/update', 'AdminControllers\ChemicalProductsController@UpdateChemical')->name('UpdateChemicalProduct');
Route::delete('/ChemicalProducts/{id}/delete', 'AdminControllers\ChemicalProductsController@DeleteChemical')->name('DeleteChemicalProduct');


//Company
Route::get('/companies', 'AdminControllers\CompanyController@ShowAllCompanies');
Route::get('companies/Add', 'AdminControllers\CompanyController@AddCompany');
Route::post('companies/Add', 'AdminControllers\CompanyController@saveCompany')->name('AddNewCompany');
Route::get('companies/{id}/edit', 'AdminControllers\CompanyController@EditCompany')->name('EditCompany');
Route::post('companies/{id}/update', 'AdminControllers\CompanyController@UpdateCompany')->name('UpdateCompany');
Route::delete('companies/{id}/delete', 'AdminControllers\CompanyController@DeleteCompany')->name('DeleteCompany');



//Beam Product
Route::get('/Product/beam', 'AdminControllers\BeamController@ShowAllCustomerBeam');
Route::get('/Product/beam/Add', 'AdminControllers\BeamController@AddCustomerBeam');
Route::post('/Product/beam/Add', 'AdminControllers\BeamController@saveIncomeBeam')->name('addIncomeBeam');
Route::get('/Product/beam/{id}/Edit', 'AdminControllers\BeamController@IncomeBeamEdit')->name('IncomeBeamEdit');
Route::post('/Product/beam/{id}/Update','AdminControllers\BeamController@IncomeBeamUpdate')->name('IncomeBeamUpdate');
Route::post('/Product/beam/{id}/Delete','AdminControllers\BeamController@IncomeBeamDelete')->name('IncomeBeamDelete');


//Yarn Product
Route::get('/Product/yarn', 'AdminControllers\YarnController@ShowAllCustomerYarn');
Route::get('/Product/yarn/Add', 'AdminControllers\YarnController@AddCustomerYarn');
Route::post('/Product/yarn/Add', 'AdminControllers\YarnController@SaveCustomerYarn')->name('AddCustomerYarn');
Route::get('/Product/yarn/{id}/Edit', 'AdminControllers\YarnController@IncomeYarnEdit')->name('IncomeYarnEdit');
Route::post('/Product/yarn/{id}/Update', 'AdminControllers\YarnController@IncomeYarnUpdate')->name('IncomeYarnUpdate');
Route::delete('/Product/yarn/{id}/Delete', 'AdminControllers\YarnController@IncomeYarnDelete')->name('IncomeYarnDelete');




//Chemical Income Product
Route::get('/Chemicals', 'AdminControllers\ChemicalController@ShowAllincomeChemicals');
Route::get('/Chemicals/Add', 'AdminControllers\ChemicalController@AddIncomeChemical');
Route::post('Chemicals/AddChemical', 'AdminControllers\ChemicalController@saveIncomeChemical')->name('AddIncomeChemical');
Route::get('Chemicals/{id}/edit', 'AdminControllers\ChemicalController@EditIncomeChemical')->name('EditIncomeChemical');
Route::post('Chemicals/{id}/update', 'AdminControllers\ChemicalController@UpdateIncomeChemical')->name('UpdateIncomeChemical');
Route::delete('Chemicals/{id}/delete', 'AdminControllers\ChemicalController@DeleteIncomeChemical')->name('DeleteIncomeChemical');



//Warping
Route::get('/warping', 'AdminControllers\WarpingController@ShowAllWarpings');
Route::get('/warping/Add', 'AdminControllers\WarpingController@AddWarping');
Route::post('/warping/Add', 'AdminControllers\WarpingController@SaveWarping')->name('AddWarping');
Route::get('/warping/{id}/edit', 'AdminControllers\WarpingController@EditWarping')->name('EditWarping');
Route::post('/warping/{id}/update', 'AdminControllers\WarpingController@UpdateWarping')->name('UpdateWarping');




//Sizing
Route::get('/Sizing', 'AdminControllers\SizingController@ShowAllSizing');
Route::get('/Sizing/{id}/setlist', 'AdminControllers\SizingController@SizingSetList')->name('ViewSizingSetList');
Route::post('/Sizing/{id}/AddSigingBeamSetList', 'AdminControllers\SizingController@AddSigingBeamSetList')->name('AddSigingBeamSetList');
Route::get('/Sizing/{id}/editsetlist', 'AdminControllers\SizingController@EditSizingSetList')->name('EditSizingSetList');
Route::post('/Sizing/{id}/UpdateSizingBeamSetList', 'AdminControllers\SizingController@UpdateSizingBeamSetList')->name('UpdateSizingBeamSetList');
