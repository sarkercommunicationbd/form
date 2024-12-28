<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Registration;
use App\Http\Controllers\RequestController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('registration');
})->name('registration');

Auth::routes();

Route::get('customer/export', [App\Http\Controllers\CustomerController::class, 'exportDataInExcel']);
Route::get('customer/export/approve', [App\Http\Controllers\CustomerController::class, 'exportDataInExcelapprove']);
Route::get('customer/export/decline', [App\Http\Controllers\CustomerController::class, 'exportDataInExceldecline']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test-dashboard', [App\Http\Controllers\HomeController::class, 'test_dashboard'])->name('test.dashboard');


Route::post('/registration/store', [\App\Http\Controllers\Registration::class, 'registration_store'] )->name('registration.store');

Route::get ('/requests', [\App\Http\Controllers\RequestController::class, 'requests_view'] )->name('requests.index');
Route::get('/requests/destroy/{id}', [App\Http\Controllers\RequestController::class,'requests_destroy' ] )->name('requests.destroy');

Route::get('/requests/update/{id}', [App\Http\Controllers\RequestController::class, 'requests_update' ] )->name('requests.update');

Route::get('/decline/update/{id}', [App\Http\Controllers\RequestController::class, 'decline_update' ] )->name('decline.update');

Route::get ('/approved_requests', [\App\Http\Controllers\RequestController::class, 'approved_view'] )->name('approved.index');
Route::get ('/decline_requests', [\App\Http\Controllers\RequestController::class, 'decline_view'] )->name('decline.index');

Route::get ('/permission', [\App\Http\Controllers\RequestController::class, 'permission'] )->name('permission.index');
Route::put('/permissions-update', [RequestController::class, 'updatePermission'])->name('permissions.update');

Route::get('/edit/{id}', [App\Http\Controllers\RequestController::class, 'edit_request' ] )->name('edit.requests');

Route::put('/registration/{id}', [RequestController::class, 'update_request'])->name('registration.update');


Route::get ('/sub-admin', [\App\Http\Controllers\RequestController::class, 'sub'] )->name('sub.index');

Route::post ('/sub_create', [\App\Http\Controllers\RequestController::class, 'sub_create'] )->name('register.sub');

//Profile Settings
Route::patch('/profile/update/{id}', [\App\Http\Controllers\RequestController::class, 'profile_update' ] )->name('profile.update');

Route::get('/profile/edit/', [\App\Http\Controllers\RequestController::class, 'profile_edit'] )->name('profile.edit');



Route::get('admin/user-permissions/{userId?}', [PermissionController::class, 'userPermission'])->name('user.permissions');
Route::put('admin/user-permissions/{userId}', [PermissionController::class, 'updateUserPermission'])->name('user.permissions.update');






