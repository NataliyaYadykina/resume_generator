<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('/landing');
})->name('home');

Route::get('/dashboard', function () {
    $resumes = Auth::user()->resumes;
    return view('/resumes.index', compact('resumes'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('/templates', TemplateController::class)->middleware('auth');

Route::resource('/resumes', ResumeController::class)->middleware('auth');

Route::get('/resumes/{id}/download', [ResumeController::class, 'downloadPdf'])->middleware('auth')->name('resumes.download');
