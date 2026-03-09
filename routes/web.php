<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Tests\Feature\ProfileInformationTest;

Route::get('/', [AuthController::class, 'home'])->name('/');
Route::get('user-dashboard', [DashboardController::class, 'userDashboard'])
    ->name('user.dashboard')
    ->middleware(['auth', 'role:admin|user']);
Route::get('dashboard', [DashboardController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['auth', 'validate_role']);
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('siteSettings', SiteSettingController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('students', StudentController::class);
    Route::post('student-status', [StudentController::class, 'studentStatus'])->name('student.status');
    Route::get('inactive-student', [StudentController::class, 'inactiveStudent'])->name('inactive.students');
    Route::post('upload-image', [StudentController::class, 'uploadImage'])->name('upload.image');
    Route::resource('books', BookController::class);
    Route::get('book-status', [BookController::class, 'bookStatus'])->name('book.status');
    Route::post('banner-status', [BannerController::class, 'bannerStatus'])->name('banner.status');
    Route::resource('news', NewsController::class);
    Route::resource('banners', BannerController::class);
    Route::view('recursive', 'recursive');
});
Route::view('frontends.home', 'frontends.home');
Route::view('adminDashboard', 'adminDashboard');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');

// FRONTEND
Route::get('register', [RegisterController::class, 'register'])->name('student.register');
Route::post('student-store', [RegisterController::class, 'storeStudent'])->name('student.store');
Route::get('my-profile', [ProfileController::class, 'myProfile'])->name('my.profile');
Route::get('edit-profile', [ProfileController::class, 'editProfile'])->name('profile.edit');
Route::post('update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::get('view-document/{path}', [DocumentController::class, 'view'])
    ->where('path', '.*')
    ->name('view.document');

Route::get('books-list', [FrontendController::class, 'books'])->name('books.list');
Route::get('about-us', [FrontendController::class, 'aboutUs'])->name('about.us');
Route::get('medicine', [FrontendController::class, 'medicine'])->name('medicine');
Route::get('update', [FrontendController::class, 'update'])->name('update');
Route::get('practitioner', [FrontendController::class, 'practitioner'])->name('practitioner');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('apply-for', [FrontendController::class, 'applyFor'])->name('apply.for');
