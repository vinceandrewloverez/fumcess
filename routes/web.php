<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\AdmissionController as AdminAdmissionController;
use App\Http\Controllers\Admin\TuitionController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\Student\AdmissionController as StudentAdmissionController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/education', fn () => view('education'))->name('education');
Route::get('/contact', fn () => view('contact'))->name('contact');

/*
|--------------------------------------------------------------------------
| Public Admissions Routes (no login required)
|--------------------------------------------------------------------------
*/
Route::get('/admissions', [StudentAdmissionController::class, 'create'])
    ->name('admissions.create');

Route::post('/admissions', [StudentAdmissionController::class, 'store'])
    ->name('admissions.store');

/*
|--------------------------------------------------------------------------
| Student Routes (requires login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        // Dashboard
        Route::get('/', fn () => view('student.index'))->name('index');
        Route::get('/dashboard', fn () => view('student.index'))->name('dashboard');

        // Admissions
        Route::get('/admissions', [StudentAdmissionController::class, 'index'])
            ->name('admissions.index');
        Route::get('/admissions/{admission}', [StudentAdmissionController::class, 'show'])
            ->name('admissions.show');
        Route::post('/admissions', [StudentAdmissionController::class, 'store'])
            ->name('admissions.store'); // Optional for logged-in users

        // Admissions Documents
        Route::get('/admissions/documents', [StudentAdmissionController::class, 'documents'])
            ->name('admissions.documents');
        Route::post('/admissions/documents/upload', [StudentAdmissionController::class, 'uploadDocuments'])
            ->name('admissions.documents.upload');

        // Documents general
        Route::get('/documents', [StudentAdmissionController::class, 'documents'])
            ->name('documents.index');
        Route::post('/documents/upload', [StudentAdmissionController::class, 'uploadDocuments'])
            ->name('documents.upload');

        // Tuitions
        Route::get('/tuitions', fn () => view('student.tuitions'))
            ->name('tuitions.index');

        // Reports
        Route::get('/reports', fn () => view('student.reports'))
            ->name('reports.index');
    });

/*
|--------------------------------------------------------------------------
| Admin Routes (requires login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', fn () => view('admin.index'))->name('index');

        Route::resource('users', UserController::class);
        Route::resource('documents', DocumentController::class);
        Route::resource('admissions', AdminAdmissionController::class);
        Route::resource('tuitions', TuitionController::class);
        Route::resource('reports', ReportController::class);

        // Document approvals
        Route::patch('documents/{document}/approve', [DocumentController::class, 'approve'])
            ->name('documents.approve');
        Route::patch('documents/{document}/reject', [DocumentController::class, 'reject'])
            ->name('documents.reject');

        // Tuition approvals
        Route::patch('tuitions/{tuition}/approve', [TuitionController::class, 'approve'])
            ->name('tuitions.approve');
        Route::patch('tuitions/{tuition}/reject', [TuitionController::class, 'reject'])
            ->name('tuitions.reject');

        // Admission approvals
        Route::patch('admissions/{admission}/approve', [AdminAdmissionController::class, 'approve'])
            ->name('admissions.approve');
        Route::patch('admissions/{admission}/reject', [AdminAdmissionController::class, 'reject'])
            ->name('admissions.reject');
    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
