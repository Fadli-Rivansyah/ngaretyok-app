<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Lapak\CreateLapak;
use App\Livewire\Lapak\UpdateLapak;
use App\Livewire\Lapak\ViewLapak;
use App\Livewire\Find\FindMain;
use App\Livewire\Lapak\LapakMain;
use App\Mail\RumputKitaEmail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SuccessfulRegistration;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\Auth\SocialController;

// Notification::route('vonage', config('app.admin_sms_number'))->notify(new SuccessfulRegistration('fadli'));

Route::get('/', function (){
    return redirect('/login');
})->middleware('guest');

Route::get('/mail', function (){
    Mail::to("fadlirivansyah22@gmail.com")->send(new RumputKitaEmail());
    return view('messageEmail');
})->middleware('guest');

Route::get('/find', FindMain::class)->middleware(['auth', 'verified'])->name('find')->lazy();
Route::get('/lapak', LapakMain::class)->middleware(['auth', 'verified'])->name('lapak');

Route::get('/lapak/create', CreateLapak::class)->middleware(['auth', 'verified'])->name('create.lapak');
Route::get('/lapak/{idlapak}/edit', UpdateLapak::class)->middleware(['auth', 'verified'])->name('edit.lapak');
Route::get('/lapak/{idlapak}/view', ViewLapak::class)->middleware(['auth', 'verified'])->name('view.lapak');
Route::get('/lapak/{idlapak}/delete', LapakMain::class)->middleware(['auth', 'verified'])->name('delete.lapak');;

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/auth/google', [SocialController::class, 'redirectToGoogleProvider'])->name('auth.google');
Route::get('/auth/google/callback', [SocialController::class,'handleGoogleCallback']);

require __DIR__.'/auth.php';
