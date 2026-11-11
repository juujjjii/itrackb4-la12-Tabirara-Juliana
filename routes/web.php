<?php

use App\Http\Controllers\SubjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/subjects/featured', [SubjectsController::class, 'featured'])
    ->name('subjects.featured');

Route::get('/subjects/filter/{units?}', function ($units = null) {
    return redirect()->route('subjects.index', $units !== null ? ['units' => $units] : []);
})->name('subjects.filter');

Route::resource('subjects', SubjectsController::class);
   // (['index', 'show', 'create', 'store']);
