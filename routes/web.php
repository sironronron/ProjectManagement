<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\User\ProfileController;

// Projects
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectTeamController;
use App\Http\Controllers\Project\ProjectCategoryController;
use App\Http\Controllers\Project\ProjectMilestoneController;

// Clients
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientCategoryController;
use App\Http\Controllers\Client\ClientUserController;
use App\Http\Controllers\Client\ClientNoteController;

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
        // View
        Route::get('/index', [ProjectController::class, 'index'])->name('projects.index');
        
        // Create
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
        
        // Show
        Route::get('/show/{unique_id}', [ProjectController::class, 'show'])->name('projects.show');

        // Project categories
        Route::group(['prefix' => 'categories'], function () {
            // Create
            Route::post('/store', [ProjectCategoryController::class, 'store'])->name('project_categories.store');
            
            // Update
            Route::get('/edit/{project_category}', [ProjectCategoryController::class, 'edit'])->name('project_categories.edit');
            Route::put('/edit/{project_category}/update', [ProjectCategoryController::class, 'update'])->name('project_categories.update');

            // Delete
            Route::delete('/delete/{project_category}', [ProjectCategoryController::class, 'destroy'])->name('project_categories.destroy');
        });

        // Project Teams
        Route::group(['prefix' => 'teams'], function () {
            // Index
            Route::get('/{project}/show', [ProjectController::class, 'show_teams'])->name('projects.show.teams');
        
            // Create
            Route::get('/{project}/create', [ProjectTeamController::class, 'create'])->name('projects.create.teams');
            Route::post('/store', [ProjectTeamController::class, 'store'])->name('projects.store.teams');
        });

        // Project Milestones
        Route::group(['prefix' => 'milestones'], function () {
            // Index
            Route::get('/{project}/show', [ProjectController::class, 'show_milestones'])->name('projects.show.milestones');
            
            // Create
            Route::get('/{project}/create', [ProjectMilestoneController::class, 'create'])->name('projects.create.milestones');
            Route::post('/store', [ProjectMilestoneController::class, 'store'])->name('projects.store.milestones');

            // Edit
            Route::get('/{project}/edit/{project_milestone}', [ProjectMilestoneController::class, 'edit'])->name('projects.edit.milestones');
            Route::put('/{project}/edit/{project_milestone}/update', [ProjectMilestoneController::class, 'update'])->name('projects.update.milestones');
        
            // Delete
            Route::delete('/delete/{project}', [ProjectMilestoneController::class, 'destroy'])->name('projects.destroy.milestones');
        });

        // Project Tasks
        Route::group(['prefix' => 'tasks'], function () {
            // Index
            Route::get('/{project}/show', [ProjectController::class, 'show_tasks'])->name('projects.show.tasks');
        });
    });

    // Client Routes
    Route::group(['prefix' => 'clients'], function () {
        // Index
        Route::get('/index', [ClientController::class, 'index'])->name('clients.index');
        
        // Create
        Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/create/post', [ClientController::class, 'store'])->name('clients.store');

        // Show
        Route::get('/show/{client}/dashboard', [ClientController::class, 'show'])->name('clients.show');
        Route::get('/show/{client}/users', [ClientController::class, 'show_users'])->name('clients.show.users');
        Route::get('/show/{client}/projects', [ClientController::class, 'show_projects'])->name('clients.show.projects');
        Route::get('/show/{client}/files', [ClientController::class, 'show_files'])->name('clients.show.files');
        Route::get('/show/{client}/notes', [ClientController::class, 'show_notes'])->name('clients.show.notes');

        // Edit
        Route::get('/edit/{client}/settings', [ClientController::class, 'edit'])->name('clients.show.settings');

        // Update
        Route::put('/edit/{client}/settings/update', [ClientController::class, 'update'])->name('clients.show.settings.update');

        // Delete
        Route::delete('/delete/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

        // Client User
        Route::group(['prefix' => 'user'], function () {
            Route::post('/new/store', [ClientUserController::class, 'store'])->name('client_users.store');
            Route::get('/edit/{client_id}/user/{client_user_id}', [ClientUserController::class, 'edit'])->name('client_users.edit');
            Route::put('/edit/{client_user_id}/update', [ClientUserController::class, 'update'])->name('client_users.update');
            Route::delete('delete/{client_user}', [ClientUserController::class, 'destroy'])->name('client_users.destroy');
        });

        // Client Note
        Route::group(['prefix' => 'note'], function () {
            // Create new note 
            Route::post('/store', [ClientNoteController::class, 'store'])->name('client_notes.store');
            
            // Show
            Route::get('/{client_id}/show/{client_note_id}', [ClientNoteController::class, 'show'])->name('client_notes.show');

            // Update
            Route::get('/edit/{client_id}/note/{client_note_id}', [ClientNoteController::class, 'edit'])->name('client_notes.edit');
            Route::put('/edit/{client_id}/note/{client_note_id}/update', [ClientNoteController::class, 'update'])->name('client_notes.update');
        });

        // Category routes
        Route::group(['prefix' => 'category'], function () {
            // Create
            Route::post('/create/post', [ClientCategoryController::class, 'store'])->name('clients.categories.store');

            // Edit
            Route::get('/edit/{client_category}', [ClientCategoryController::class, 'edit'])->name('clients.categories.edit');
            Route::put('/edit/{client_category}/put', [ClientCategoryController::class, 'update'])->name('clients.categories.update');

            // Delete
            Route::delete('/delete/{client_category}', [ClientCategoryController::class, 'destroy'])->name('clients.categories.destroy');
        });
    });
});