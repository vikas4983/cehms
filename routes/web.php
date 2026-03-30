<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OldStudentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestimonialController;

use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'home'])->name('/');

Route::get('user-dashboard', [DashboardController::class, 'userDashboard'])
    ->name('user.dashboard')
    ->middleware(['auth', 'permission:user-dashboard']);

Route::get('dashboard', [DashboardController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['auth', 'validate_role']);

Route::middleware(['auth', 'permission:admin-dashboard'])->group(function () {
    Route::get('admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::post('assign-permission', [PermissionController::class, 'assignPermission'])->name('permission.assign');
    Route::resource('siteSettings', SiteSettingController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('students', StudentController::class);
    Route::get('admin-profile/{id}', [StudentController::class, 'adminProfile'])->name('profile.admin');
    Route::post('student-status', [StudentController::class, 'studentStatus'])->name('student.status');
    Route::get('inactive-student', [StudentController::class, 'inactiveStudent'])->name('inactive.students');
    Route::get('active-student', [StudentController::class, 'activeStudent'])->name('active.students');
    Route::get('trash-student', [StudentController::class, 'trashStudent'])->name('trash.students');
    Route::get('untrash-student/{id}', [StudentController::class, 'untrashStudent'])->name('untrash.students');
    Route::post('upload-image', [StudentController::class, 'uploadImage'])->name('upload.image');
    Route::post('active-students-export', [StudentController::class, 'exportActiveStudents'])->name('active.students.export');
    Route::post('inactive-students-export', [StudentController::class, 'exportInactiveStudents'])->name('inactive.students.export');
    Route::post('today-students-export', [StudentController::class, 'exportTodayStudents'])->name('today.students.export');
    Route::post('weekly-students-export', [StudentController::class, 'exportWeeklyStudents'])->name('weekly.students.export');
    Route::post('monthly-students-export', [StudentController::class, 'exportMonthlyStudents'])->name('monthly.students.export');
    Route::post('yearly-students-export', [StudentController::class, 'exportYearlyStudents'])->name('yearly.students.export');
    Route::resource('books', BookController::class);
    Route::resource('medicines', MedicineController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('cms', CmsController::class);
    Route::resource('oldStudents', OldStudentController::class);
    Route::get('book-status', [BookController::class, 'bookStatus'])->name('book.status');
    Route::get('view-book/{path}', [BookController::class, 'viewBook'])
        ->where('path', '.*')
        ->name('book.view');
    Route::post('banner-status', [BannerController::class, 'bannerStatus'])->name('banner.status');
    Route::resource('news', NewsController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('enquiries', EnquiryController::class);
    Route::view('recursive', 'recursive');
    Route::get('filter-input/input', [FilterController::class, 'filter'])->name('input.filter');
    Route::get('admin',[StudentController::class,'admin'])->name('admin');
});

// FRONTEND
Route::get('register', [RegisterController::class, 'register'])->name('student.register');
Route::post('student-store', [RegisterController::class, 'storeStudent'])->name('student.store');
Route::middleware(['auth'])->group(function () {
    Route::get('my-profile', [ProfileController::class, 'myProfile'])
        ->name('my.profile')
        ->middleware('permission:view-student');
    Route::get('edit-profile', [ProfileController::class, 'editProfile'])
        ->name('profile.edit')
        ->middleware('permission:edit-student');
    Route::post('update-profile', [ProfileController::class, 'updateProfile'])
        ->name('profile.update')
        ->middleware('permission:edit-student');
    Route::get('view-document/{path}', [DocumentController::class, 'view'])
        ->where('path', '.*')
        ->name('view.document');
});

// Download
Route::get('download/{path}', [FrontendController::class, 'download'])
    ->where('path', '.*')
    ->name('download');

// Filter

// Search Practitioner
Route::get('search-practitioner/input', [FrontendController::class, 'searchPractitioner'])->name('search.practitioner');

// Testimonials
Route::get('testi-monials', [RegisterController::class, 'testimonial'])->name('testimonial');

// Forgot password
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');

// CMS pages
Route::get('{slug}', [FrontendController::class, 'page']);
