<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SidebarmenuController;
use App\Http\Controllers\ClearDataController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\ActivityController;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ParentController;

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


// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/',[FrontController::class,'index']);


Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('menus', SidebarmenuController::class);
    Route::get('/defaultmenu', [HomeController::class, 'defaultmenu'])->name('defaultmenu');
    Route::get('/user-profile-view',[SystemUserController::class,'index'])->name('user.profileview');
    Route::get('/user-profile-update', [SystemUserController::class,'updateProfile'])->name('update.userProfile');
    Route::post('/user-profile-update-form', [SystemUserController::class,'upsertProfile'])->name('upsert.userProfile');
    //activity 
    Route::get('/view-activity',[ActivityController::class, 'index'])->name('create.activity');  
    Route::post('/submit-activity',[ActivityController::class, 'submit'])->name('submit.activity');  
    Route::get('/list-activity',[ActivityController::class,'listActivity'])->name('activity.list');
    Route::post('/activities/delete', [ActivityController::class, 'activityDelete'])->name('activity.delete');
    Route::get('/activities/edit/{id}', [ActivityController::class, 'editActivities'])->name('activity.edit');
    Route::post('/activities/update',[ActivityController::class, 'updateActivities'])->name('update.activity');
    //Student activty approve and reject
    Route::get('/activity/student/approve/{id}', [ActivityController::class, 'approveActivityEnrollment'])->name('activity.approve');
    Route::get('/activity/student/reject/{id}', [ActivityController::class, 'rejectActivityEnrollment'])->name('activity.reject');
    //Enroll
    Route::get('/view/enroll/activity', [ActivityController::class,'enrollActivity'])->name('enroll.activity');
    Route::post('/enroll/update', [ActivityController::class, 'updateRecord'])->name('enrollment.update');
    Route::get('/enrollement/application/approve',[ActivityController::class,'enrollmentApplicationList'])->name('enrollment.application.approve');
    //Parent 
    Route::post('/student-id-check', [ParentController::class, 'checkStudentId'])->name('student.id.check');
    Route::get('/enrollment/as/parent', [ParentController::class,'viewEnrollementAsParent'])->name('enrollment.parent');
});
Route::get('/clear-data', [ClearDataController::class, 'clearData']);
Route::post('/edit-route-name',[HomeController::class, 'editRouteName'])->name('editRouteName');
Route::post('/update-route-name', [HomeController::class, 'updateRouteName'])->name('update.routeName');



