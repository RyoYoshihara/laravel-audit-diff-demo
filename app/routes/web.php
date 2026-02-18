<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuditLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::resource('posts', PostController::class)->only(['index', 'create', 'store', 'edit', 'update']);

Route::get('audit-logs', [AuditLogController::class, 'index'])->name('audit-logs.index');
Route::get('audit-logs/{id}', [AuditLogController::class, 'show'])->name('audit-logs.show');
