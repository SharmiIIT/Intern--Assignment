<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::get('/',[StudentController::class,"index"])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('student')->group(function(){
    Route::get('/',[StudentController::class,"index"])->name('student');
    Route::get('/list',[StudentController::class,"list"])->name('student.list');
    Route::get('/{student_id}/get',[StudentController::class,"get"])->name('student.get');
    Route::post('/store',[StudentController::class,"store"])->name('student.store');
    Route::get('/{student_id}/edit',[StudentController::class,"edit"])->name('student.edit');
    Route::post('/{student_id}/update',[StudentController::class,"update"])->name('student.update');
    Route::delete('/{student_id}/delete',[StudentController::class,"delete"])->name('student.delete');
    Route::get('/{student_id}/status',[StudentController::class,"status"])->name('student.status');
});
