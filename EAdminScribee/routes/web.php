<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;

// Redirect root URL to login page
Route::redirect('/', '/login');
Route::get('/home', function () {
    return view('home'); // Make sure you have a home.blade.php view
})->middleware('auth');
// Home Route Logic
// Route::get('/home', function () {
//     if (session('status')) {
//         return redirect()->route('admin.remuneration-forms.index')->with('status', session('status'));
//     }

//     return redirect()->route('admin.remuneration-forms.index');
// });

// Authentication Routes
Auth::routes();

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Faculties and Departments Routes
Route::get('faculties/list', [FacultyController::class, 'list'])->name('faculties.list');
Route::get('departments/list', [DepartmentController::class, 'list'])->name('departments.list');

// Admin Grouped Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Admin Home
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions Management
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles Management
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users Management
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Statuses Management
    Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusesController');

    // Remuneration Forms Management
    Route::delete('remuneration-forms/destroy', 'RemunerationFormsController@massDestroy')->name('remuneration-forms.massDestroy');
    Route::get('remuneration-forms/{remuneration_form}/analyze', 'RemunerationFormsController@showAnalyze')->name('remuneration-forms.showAnalyze');
    Route::post('remuneration-forms/{remuneration_form}/analyze', 'RemunerationFormsController@analyze')->name('remuneration-forms.analyze');
    Route::get('remuneration-forms/{remuneration_form}/send', 'RemunerationFormsController@showSend')->name('remuneration-forms.showSend');
    Route::post('remuneration-forms/{remuneration_form}/send', 'RemunerationFormsController@send')->name('remuneration-forms.send');
    Route::resource('remuneration-forms', 'RemunerationFormsController');

    // Comments Management
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentsController');
});

// Profile Grouped Routes
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change Password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
    Route::post('update', [ProfileController::class, 'update'])->name('update');
});
