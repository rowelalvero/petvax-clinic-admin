<?php
use Illuminate\Support\Facades\Route;
use Modules\Service\Http\Controllers\Backend\API\ServiceController;
use Modules\Service\Http\Controllers\Backend\API\ServicePackageController;
use Modules\Service\Http\Controllers\Backend\API\ServiceDurationController;
use Modules\Service\Http\Controllers\Backend\API\ServiceFacilityController;
use Modules\Service\Http\Controllers\Backend\API\ServiceTrainingController;

Route::get('service-list', [ServiceController::class, 'serviceList']);
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('service/staff/{id}', [ServiceController::class, 'assign_employee_list']);
    Route::post('service/staff/{id}', [ServiceController::class, 'assign_employee_update']);

    Route::get('service/branch/{id}', [ServiceController::class, 'assign_branch_list']);
    Route::post('service/branch/{id}', [ServiceController::class, 'assign_branch_update']);

    // Gallery Images
    Route::get('service-gallery', [ServiceController::class, 'ServiceGallery']);
    Route::post('/gallery-images/{id}', [ServiceController::class, 'uploadGalleryImages']);

    Route::apiResource('service', ServiceController::class);
    Route::post('update-service', [ServiceController::class, 'update']);
    Route::get('delete-service', [ServiceController::class, 'destroy']);
    Route::apiResource('servicePackage', ServicePackageController::class);

    Route::post('service-detail', [ServiceController::class, 'serviceDetails']);
    Route::get('search-service', [ServiceController::class, 'searchServices']);

    Route::resource('service-training', ServiceTrainingController::class);


    Route::post('save-service-facility', [ Modules\Service\Http\Controllers\Backend\ServiceFacilityController::class, 'store']);
    Route::post('update-service-facility/{id}', [ Modules\Service\Http\Controllers\Backend\ServiceFacilityController::class, 'update']);
    Route::post('delete-service-facility/{id}', [ Modules\Service\Http\Controllers\Backend\ServiceFacilityController::class, 'destroy']);

    Route::post('save-service-duration', [ Modules\Service\Http\Controllers\Backend\ServiceDurationController::class, 'store']);
    Route::post('update-service-duration/{id}', [ Modules\Service\Http\Controllers\Backend\ServiceDurationController::class, 'update']);
    Route::post('delete-service-duration/{id}', [ Modules\Service\Http\Controllers\Backend\ServiceDurationController::class, 'destroy']);

    Route::post('save-service-training', [ Modules\Service\Http\Controllers\Backend\ServiceTrainingController::class, 'store']);
    Route::post('update-service-training/{id}', [ Modules\Service\Http\Controllers\Backend\ServiceTrainingController::class, 'update']);
    Route::post('delete-service-training/{id}', [ Modules\Service\Http\Controllers\Backend\ServiceTrainingController::class, 'destroy']);

});


Route::get('duration-list', [ServiceDurationController::class, 'durationList']);
Route::get('facility-list', [ServiceFacilityController::class, 'facilityList']);
Route::get('training-list', [ServiceTrainingController::class, 'trainingList']);
Route::get('training-duration-list', [ServiceTrainingController::class, 'trainingDurationList']);
?>


