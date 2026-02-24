<?php

use App\Http\Controllers\Api\ArmorController;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\CharClassController;
use App\Http\Controllers\Api\DialogController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\KingdomController;
use App\Http\Controllers\Api\NpcController;
use App\Http\Controllers\Api\RaceController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\WeaponController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ── Usuario autenticado ─────────────────────────────────────────
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// ────────────────────────────────────────────────────────────────
// RUTAS PÚBLICAS – catálogo de juego (solo lectura)
// ────────────────────────────────────────────────────────────────
Route::apiResource('kingdoms', KingdomController::class)->only(['index', 'show']);
Route::apiResource('races',    RaceController::class)->only(['index', 'show']);
Route::apiResource('classes',  CharClassController::class)->only(['index', 'show']);
Route::apiResource('skills',   SkillController::class)->only(['index', 'show']);
Route::apiResource('weapons',  WeaponController::class)->only(['index', 'show']);
Route::apiResource('armors',   ArmorController::class)->only(['index', 'show']);
Route::apiResource('items',    ItemController::class)->only(['index', 'show']);
Route::apiResource('npcs',     NpcController::class)->only(['index', 'show']);

Route::apiResource('npcs.dialogs', DialogController::class)->only(['index', 'show']);

// ────────────────────────────────────────────────────────────────
// RUTAS PROTEGIDAS – requieren auth:sanctum
// ────────────────────────────────────────────────────────────────
Route::middleware('auth:sanctum')->group(function () {

    // Gestión completa de personajes del usuario autenticado
    Route::apiResource('characters', CharacterController::class);

    // CRUD de administración del catálogo del juego
    Route::apiResource('kingdoms', KingdomController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('races',    RaceController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('classes',  CharClassController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('skills',   SkillController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('weapons',  WeaponController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('armors',   ArmorController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('items',    ItemController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('npcs',     NpcController::class)->only(['store', 'update', 'destroy']);

    Route::apiResource('npcs.dialogs', DialogController::class)->only(['store', 'update', 'destroy']);
});
