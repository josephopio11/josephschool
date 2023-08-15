<?php

use App\Http\Controllers\AdmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AtukotController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\MuzaddeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\HostelBedController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HostelRoomController;
use App\Http\Controllers\StaffRolesController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\LibraryBooksController;
use App\Http\Controllers\SchoolSessionController;
use App\Http\Controllers\AssessmentTypeController;
use App\Http\Controllers\HostelRoomTypeController;
use App\Http\Controllers\ClassroomBookingController;
use App\Http\Controllers\HostelAllocationController;
use App\Http\Controllers\LibraryBookIssueController;
use App\Http\Controllers\LibraryBookRequestController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::resource('admission', AdmissionController::class);
// Route::post('/admission', [AdmissionController::class, 'admit'])->name('admission.admit');

Route::prefix('class')->group(function () {
    Route::resource('atukot', AtukotController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('classroom', ClassroomController::class);
    Route::resource('classroom-booking', ClassroomBookingController::class);
})->name('class');


Route::resource('school', SchoolController::class);
Route::resource('school-session', SchoolSessionController::class);
Route::resource('student', StudentController::class);
Route::resource('muzadde', MuzaddeController::class);
Route::resource('staff-roles', StaffRolesController::class);
Route::resource('staff', StaffController::class);
Route::resource('stream', StreamController::class);
Route::resource('assessment-type', AssessmentTypeController::class);
Route::resource('assessment', AssessmentController::class);
Route::resource('fee', FeeController::class);
Route::resource('payment-type', PaymentTypeController::class);
Route::resource('payment', PaymentController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('library-books', LibraryBooksController::class);
Route::resource('library-book-issue', LibraryBookIssueController::class);
Route::resource('library-book-request', LibraryBookRequestController::class);
Route::resource('hostel', HostelController::class);
Route::resource('hostel-room-type', HostelRoomTypeController::class);
Route::resource('hostel-room', HostelRoomController::class);
Route::resource('hostel-bed', HostelBedController::class);
Route::resource('hostel-allocation', HostelAllocationController::class);
