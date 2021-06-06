<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectCategoryController;

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
        'phpVersion' => PHP_VERSION
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'current_team' => \Auth::user()->currentTeam,
        'team_members' => \Auth::user()->currentTeam->allUsers()
    ]);
})->name('dashboard');

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/show/{id}', [ProfileController::class, 'public_profile'])->name('public_profile');
        Route::put('/update_notification/{id}', [ProfileController::class, 'update_notification_preference'])->name('profile.update_notification_preferences');
    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/index', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
   
        // Project categories
        Route::group(['prefix' => 'categories'], function () {
            Route::post('/store', [ProjectCategoryController::class, 'store'])->name('project_categories.store');
            Route::get('/edit/{project_category}', [ProjectCategoryController::class, 'edit'])->name('project_categories.edit');
            Route::delete('/delete/{project_category}', [ProjectCategoryController::class, 'destroy'])->name('project_categories.destroy');
        });
    });
});