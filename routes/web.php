<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FieldController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\SlotController;

// ── Web Pages ─────────────────────────────────────
Route::get('/', fn() => view('home'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));
Route::get('/features', fn() => view('features'));

// ── Admin Pages ───────────────────────────────────
Route::prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'));
    Route::get('/users', fn() => view('admin.users'));
    Route::get('/fields', fn() => view('admin.fields'));
    Route::get('/schedules', fn() => view('admin.schedules'));  // tambah
    Route::get('/bookings', fn() => view('admin.bookings'));    // tambah
    Route::get('/payments', fn() => view('admin.payments'));    // tambah
    Route::get('/slots', fn() => view('admin.slots')); 
});

// ── API ───────────────────────────────────────────
Route::prefix('api')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('fields', FieldController::class);
    Route::apiResource('schedules', ScheduleController::class);  // tambah
    Route::apiResource('bookings', BookingController::class);    // tambah
    Route::apiResource('payments', PaymentController::class);    // tambah
    Route::apiResource('slots', SlotController::class);
    Route::get('fields/{fieldId}/slots', [SlotController::class, 'byFieldAndDate']);
    Route::post('slots/generate', [SlotController::class, 'generate']);

    // Route tambahan
    Route::get('fields/{fieldId}/schedules', [ScheduleController::class, 'byField']);
    Route::get('users/{userId}/bookings', [BookingController::class, 'byUser']);

    // Webhook Midtrans
    Route::post('midtrans/webhook', [PaymentController::class, 'webhook'])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
});
