<?php

use App\Http\Controllers\AutoCompleteController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\ExamSpecialtyController;
use App\Http\Controllers\MedicalAppointmentsController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
# Logout User
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::get('autocompletecity', [AutoCompleteController::class, 'autocompletecity'])->name('autocompletecity');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/painel', [PainelController::class, 'index'])->name('painel');
});

Route::group(['middleware' => 'auth'], function () {
    // Routes agent and admin
    Route::group(['middleware' => 'check-permission:admin|agente'], function () {
        Route::resource('exams', ExamSpecialtyController::class);
        Route::resource('patients', PatientsController::class);
        Route::resource('doctors', DoctorsController::class);
        Route::resource('medical_appointments', MedicalAppointmentsController::class);

        // Autocomplete select2
        Route::get('autocompletename', [AutoCompleteController::class, 'autocompletename'])->name('autocompletename');
        Route::get('autocompleteexam', [AutoCompleteController::class, 'autocompleteexam'])->name('autocompleteexam');
        Route::get('autocompletedoctor', [AutoCompleteController::class, 'autocompletedoctor'])->name('autocompletedoctor');
        Route::get('autocompleteunits', [AutoCompleteController::class, 'autocompleteunits'])->name('autocompleteunits');
    });

    // Routes admin
    Route::group(['middleware' => 'check-permission:admin'], function () {
        Route::resource('units', UnitsController::class);
        Route::resource('cities', CitiesController::class);
        Route::resource('users', UserController::class);
    });

    Route::group(['middleware' => 'check-permission:admin|agente|municipe'], function () {
        Route::get('generate-pdf/{id}', [MedicalAppointmentsController::class, 'generatePDF'])->name('generate-pdf');
        Route::get('/medical_patients', [MedicalAppointmentsController::class, 'indexPatients'])->name('medical_patients');
        Route::get('/medical_show/{id}', [MedicalAppointmentsController::class, 'showPatients'])->name('medical_show');
    });
});
Auth::routes();
