<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/machines/{machine}', [MachineController::class, 'show'])->name('machines.show');

Route::get('/machines', [MachineController::class, 'catalogue'])->name('machines.catalogue');

Route::get('/faq', function () {
    return view('pages/faq');
});
Route::get('/answer', function () {
    return view('pages/answer');
});
Route::get('/reponse', function () {
    return view('pages/answer');
});
Route::get('/contact', function () {
    return view('pages/contact');
});

Route::prefix('admin')->name('admin.')->group(function () {

    // Routes CRUD pour les machines
    Route::resource('machines', MachineController::class)->except(['show']);

    // Routes CRUD pour les catégories
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Routes CRUD pour les FAQs
    Route::resource('faqs', FaqController::class)->except(['show']);
});
Route::get('/admin/machines/{machine}/photos', [MachineController::class, 'addPhotosForm'])->name('admin.machines.photos');
Route::post('/admin/machines/{machine}/photos', [MachineController::class, 'storePhotos'])->name('admin.machines.photos.store');
Route::delete('/admin/machine-images/{image}', [MachineController::class, 'deletePhoto'])->name('admin.machines.photos.delete');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::get('/search', [SearchController::class, 'index'])->name('search');
