<?php

use App\Http\Controllers\AdminController;
use Faker\Provider\HtmlLorem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingCrudController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\Karyawan;
use App\Models\Report;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes for CRUD operations on bookings
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
// Route::get('/bookings', [BookingController::class, 'index'])->middleware('auth')->name('bookings.index');
// Route::middleware('auth')->get('/inbox', [InboxController::class, 'index'])->name('inbox');
Route::get('/inbox', [InboxController::class, 'index'])->middleware('auth')->name('inbox');
// Route::get('/inbox', [InboxController::class, 'index'])->name('inbox');
// Route::get('/inbox', [BookingController::class, 'showInbox'])->name('inbox');
// Route::get('/inbox', [InboxController::class, 'index'])->name('inbox');
// Route::get('/inbox', [InboxController::class, 'index'])->name('inbox');
Route::get('/inbox', [InboxController::class, 'index'])->name('inbox')->middleware('auth');
// Route::get('/admin/edit/{id}', [InboxController::class, 'edit'])->name('admin.edit');
// Route::put('/admin/update/{id}', [InboxController::class, 'update'])->name('admin.update');
Route::get('/inbox/{id}/edit', [InboxController::class, 'edit'])->name('bookings.edit');
Route::put('/inbox/{id}', [InboxController::class, 'update'])->name('bookings.update');



Route::get('/package', [PackageController::class, 'index'])->name('package');
Route::get('/aboutus', [PageController::class, 'aboutUs'])->name('aboutus');
Route::get('/portofolio', [PageController::class, 'portofolio'])->name('portofolio');
Route::get('/welcome', [PageController::class, 'welcome'])->name('welcome');
// Route::resource('admin', AdminController::class);  // Ini akan secara otomatis mendefinisikan rute CRUD

Route::get('/admin/bookings/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/bookings/{id}', [AdminController::class, 'update'])->name('admin.update');
// Routes untuk Data User
// Route::get('/admin/edit-user/{id}', [AdminController::class, 'edit'])->name('users.edit');
// Route::put('/admin/update-user/{id}', [AdminController::class, 'update'])->name('users.update');
Route::get('/admin/user-edit/{id}', [AdminController::class, 'editUser'])->name('user.edit');
Route::put('/admin/user-update/{id}', [AdminController::class, 'updateUser'])->name('user.update');
Route::delete('/admin/user-destroy/{id}', [AdminController::class, 'destroyUser'])->name('user.destroy');
// Routes untuk Penggajian Karyawan
Route::get('/admin/salary/edit/{id}', [AdminController::class, 'editSalary'])->name('salary.edit');
// Routes untuk Laporan
Route::get('/admin/report/edit/{id}', [AdminController::class, 'editReport'])->name('report.edit');

Route::get('/admin/karyawan/bookings/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/admin/karyawan/bookings/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/admin/edit-karyawan/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/admin/edit-karyawan/{id}', [EmployeeController::class, 'update'])->name('employee.update');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/admin/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
    Route::get('/admin/reports/{id}/print', [ReportController::class, 'print'])->name('reports.print');
});
Route::post('/create-report', [ReportController::class, 'createReport']);

Route::post('/karyawan/absen', [EmployeeController::class, 'absen'])->name('employee.absen');
// Route::middleware(['auth'])->post('/karyawan/absen', [EmployeeController::class, 'absen'])->name('employee.absen');
Route::middleware(['auth'])->group(function () {
    Route::post('/employee/absen', [EmployeeController::class, 'storeAttendance'])->name('employee.absen');
});

Route::middleware('auth')->prefix('employee')->group(function () {
    Route::post('/absen-masuk', [AttendanceController::class, 'clockIn'])->name('employee.absen.masuk');
    Route::post('/absen-pulang', [AttendanceController::class, 'clockOut'])->name('employee.absen.pulang');
});

// Route::get('/employee/{id}/detail', [EmployeeController::class, 'show'])->name('employee.detail');


// Route::resource('admin/', EmployeeController::class);


Route::get('/admin/dashboard', [EmployeeController::class, 'index'])->name('employees.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/karyawan/{user_id}/detail/{month}', [AttendanceController::class, 'show'])->name('employee.detail');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('admin');

Route::get('/karyawan/dashboard', [KaryawanController::class, 'index'])
    ->name('karyawan.dashboard')
    ->middleware('karyawan');



    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('admin/laporan', [AdminController::class, 'showReportPage'])->name('admin.report');
    });

    Route::get('/payment/{booking}', [PaymentController::class, 'createPayment'])->name('payment.create');
    Route::post('/payment-notification', [PaymentController::class, 'notification']);
    Route::post('/payment/update-status', [PaymentController::class, 'updateBookingStatus']);
    Route::post('/update-phone-number', [BookingController::class, 'updatePhoneNumber']);
    Route::get('/send-to-whatsapp', [PaymentController::class, 'sendToWhatsApp'])->name('send-to-whatsapp');
    Route::get('/admin/send-to-whatsapp/{id}', [AdminController::class, 'sendToWhatsApp'])->name('admin.send-to-whatsapp');
    Route::get('/karyawan/send-to-whatsapp/{id}', [KaryawanController::class, 'sendToWhatsApp'])->name('karyawan.sendToWhatsApp');

    // <<!--laporan-->>
    // Route::get('/admin/reports/show', [EmployeeController::class, 'financeReport'])->name('reports.show');


