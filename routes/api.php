<?php

use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    try {
        DB::connection()->getPdo();
        DB::select('select 1');

        return response()->json(['status' => 'ok', 'database' => 'connected']);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'error', 'database' => 'disconnected'], 503);
    }
});

Route::get('/estudiantes', [EstudianteController::class, 'index']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);
Route::get('/estudiantes/{id}', [EstudianteController::class, 'show']);
