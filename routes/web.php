<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::resource('school', App\Http\Controllers\SchoolController::class);

Route::resource('session', App\Http\Controllers\SessionController::class);

Route::resource('student', App\Http\Controllers\StudentController::class);

Route::resource('parent', App\Http\Controllers\ParentController::class);

Route::resource('staff-roles', App\Http\Controllers\StaffRolesController::class);

Route::resource('staff', App\Http\Controllers\StaffController::class);

Route::resource('atukot', App\Http\Controllers\AtukotController::class);

Route::resource('stream', App\Http\Controllers\StreamController::class);

Route::resource('classroom', App\Http\Controllers\ClassroomController::class);

Route::resource('classroom-booking', App\Http\Controllers\ClassroomBookingController::class);

Route::resource('subject', App\Http\Controllers\SubjectController::class);

Route::resource('assessment-type', App\Http\Controllers\AssessmentTypeController::class);

Route::resource('assessment', App\Http\Controllers\AssessmentController::class);

Route::resource('fee', App\Http\Controllers\FeeController::class);

Route::resource('payment-type', App\Http\Controllers\PaymentTypeController::class);

Route::resource('payment', App\Http\Controllers\PaymentController::class);

Route::resource('attendance', App\Http\Controllers\AttendanceController::class);

Route::resource('library-books', App\Http\Controllers\LibraryBooksController::class);

Route::resource('library-book-issue', App\Http\Controllers\LibraryBookIssueController::class);

Route::resource('library-book-request', App\Http\Controllers\LibraryBookRequestController::class);

Route::resource('hostel', App\Http\Controllers\HostelController::class);

Route::resource('hostel-room-type', App\Http\Controllers\HostelRoomTypeController::class);

Route::resource('hostel-room', App\Http\Controllers\HostelRoomController::class);

Route::resource('hostel-bed', App\Http\Controllers\HostelBedController::class);

Route::resource('hostel-allocation', App\Http\Controllers\HostelAllocationController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
