<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;

Route::prefix("admin")->group(function(){

    Route::get('/login', [AuthenticatedSessionController::class, 'createAdmin'])
                ->middleware('guest:admin')
                ->name('admin.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'storeAdmin'])
    ->middleware('guest:admin');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroyAdmin'])
                ->middleware('auth:admin')
                ->name('admin.logout');

});


Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest:user')
                ->name('user.register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest:user');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:user')
                ->name('user.login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest:user');

Route::get('/verify-otp', [OtpController::class, 'verifyOtpCreate'])
                ->middleware('guest:user')->name('user.verify-otp.create');

Route::post('/verify-otp', [OtpController::class, 'verifyLoginOtp'])
                ->middleware('guest:user')->name('user.verify-otp');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:user')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:user')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:user')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:user')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:user')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:user', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:user', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:user')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:user');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:user')
                ->name('logout');
