<?php

use Illuminate\Support\Facades\Route;
use Mrlinnth\Simplefeedback\Http\Controllers\SimplefeedbackController;

Route::middleware(['web'])
->prefix('simple-feedback')
->name('simplefeedbacks.')
->group(function () {
    Route::post('/', SimplefeedbackController::class)->name('store');
});
