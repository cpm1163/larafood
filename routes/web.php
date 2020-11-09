<?php

use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;

//Organizando as rotas do Admin
Route::prefix('admin')->group(function(){
    /**
     * Routes Details Plan
     */
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::post('plans/{url}/details/show', [DetailPlanController::class, 'show'])->name('details.plan.show');

    /**
     * Routes Plan
     */
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');

    /**
     * Route Home DashBoard
     */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
