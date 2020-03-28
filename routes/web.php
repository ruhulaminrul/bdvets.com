<?php

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

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

Route::get('active','ActiveController@index')->name('active');



Route::get("/","UserController@index")->name('index');






Auth::routes();



Route::group(['middleware' => ['isActive'] ], function () {

});

Route::group(['middleware' => ['isDeactive'] ], function () {

});

Route::group(['middleware' => ['isAdmin'] ], function () {

});

Route::group(['middleware' => ['isDoctor'] ], function () {

});

Route::group(['middleware' => ['isPharmacy'] ], function () {

});

Route::group(['middleware' => ['adminDoctor'] ], function () {

});
Route::group(['middleware' => ['adminPharmacy'] ], function () {

});
Route::group(['middleware' => ['adminDoctorPharmacy'] ], function () {

});

Route::get('/home', 'HomeController@index')->name('home');


    
    Route::get("/village","LocationController@village")->name('village');
    Route::post("/village-store","LocationController@villageStore")->name('village-store');
    Route::get("/village-delete","LocationController@villageDelete")->name('village-delete');    
    Route::resource('offices', 'OfficeController');
    Route::resource('doctors', 'DoctorController');


 
    
Route::resource('doctor-profiles', 'DoctorProfileController');

Route::resource('prescriptions', 'PrescriptionController');
Route::resource('advices', 'AdviceController');
Route::resource('clinical-signs', 'ClinicalSignController');
Route::resource('necropsies', 'NecropsyController');
Route::resource('diagnoses', 'DiagnosisController');

Route::resource('farmers', 'FarmerController');
Route::resource('medichines', 'MedichineController');
Route::resource('medichine-categories', 'MedichineCategoryController');





Route::resource('medichine-sales', 'MedichineSaleController');
Route::resource('medichine-sales-reports', 'MedichineSaleReportController');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/test-group', function () {
//         // Uses first & second Middleware
//         return 'hahah';
//     });

// });






//////////   Api Links

Route::get('divisions-list-api', 'LocationController@divisionListApi')->name('divisions_list_api');
Route::get('district-list-api', 'LocationController@districtListApi')->name('district_list_api');
Route::get('upazilla-list-api', 'LocationController@upazillatListApi')->name('upazilla_list_api');
Route::get('union-list-api', 'LocationController@unionListApi')->name('union_list_api');
Route::get('village-list-api', 'LocationController@villageListApi')->name('village_list_api');

Route::get('village-farmer-list_api', 'FarmerController@villageFarmerListApi')->name('village_farmer_list_api');
Route::get('medichine-category-list-api', 'MedichineCategoryController@medichineCategoryListApi')->name('medichine_category_list_api');
Route::get('office-list-api', 'OfficeController@officeListApi')->name('office_list_api');


Route::get('farmer-chack-api', 'FarmerController@farmerCheckApi')->name('farmer_chack_api');
Route::get('farmer-profile-api/{farmer}', 'FarmerController@farmerProfileApi')->name('farmer_profile_api');



Route::get('clinical-sign-all-api', 'ClinicalSignController@signListApi');
Route::get('tentative-diagnosis-all-api', 'DiagnosisController@diagnosisListApi');
Route::get('advice-all-api', 'AdviceController@adviceListApi');
Route::get('necropsy-all-api', 'NecropsyController@necropsyListApi');
Route::get('medichine-all-api', 'MedichineController@medichineListApi');





Route::resource('tests', 'TestController');
Route::get('/unsubscribe/{user}', function (Request $request) {
    // ...
    return "hahah";
})->name('unsubscribe');