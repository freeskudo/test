<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PointController;

use App\Http\Controllers\UserController;

use App\Models\Point;
use App\Models\Profile;
use App\Models\Optin;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('top');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// TODO: plefix

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->name('about.us');

Route::get('/terms-of-service', function () {
    return Inertia::render('TermsOfService');
})->name('terms.of.service');

Route::get('/specified-commercial-transaction-law', function () {
    return Inertia::render('SpecifiedCommercialTransactionLaw');
})->name('specified.commercial.transaction.law');

Route::get('/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy.policy');

Route::get('/contact-us', function () {
    return Inertia::render('ContactUs');
})->name('contact.us');

Route::get('/form', [OrderController::class, 'form'])->name('form');
Route::post('/form', [OrderController::class, 'history'])->name('order.history');
Route::post('/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
Route::get('/complete', [OrderController::class, 'complete'])->name('order.complete');

Route::post('/buy', [OrderController::class, 'buy']);

Route::get('/mail/send', 'MailController@send')->name('mail');

Route::get('/user-edit', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('user.edit');
Route::post('/user-save', [UserController::class, 'save'])->middleware(['auth', 'verified'])->name('user.save');

Route::get('/user-log', [UserController::class, 'log'])->middleware(['auth', 'verified'])->name('user.log');

require __DIR__.'/auth.php';
