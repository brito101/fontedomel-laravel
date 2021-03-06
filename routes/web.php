<?php

use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\BeeController as SiteBeeController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeConttroller;
use App\Http\Controllers\Site\PoliceController;
use App\Http\Controllers\Site\ProductController as SiteProductController;
use App\Http\Controllers\Site\RecipeController as SiteRecipeController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
    Route::prefix('admin')->name('admin.')->group(function () {
        /** Chart home */
        Route::get('/chart', [AdminController::class, 'chart'])->name('home.chart');

        /** Users */
        Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/users/destroy/{id}', [UserController::class, 'destroy']);
        Route::resource('users', UserController::class);

        /** Products */
        Route::get('/products/destroy/{id}', [ProductController::class, 'destroy']);
        Route::resource('products', ProductController::class);

        /** Recipes */
        Route::get('/recipes/destroy/{id}', [RecipeController::class, 'destroy']);
        Route::resource('recipes', RecipeController::class);

        /** Bees */
        Route::get('/bees/destroy/{id}', [BeeController::class, 'destroy']);
        Route::resource('bees', BeeController::class);

        /**
         * ACL
         * */
        /** Permissions */
        Route::get('/permission/destroy/{id}', [PermissionController::class, 'destroy']);
        Route::resource('permission', PermissionController::class);
        /** Roles */
        Route::get('/role/destroy/{id}', [RoleController::class, 'destroy']);
        Route::get('role/{role}/permission', [RoleController::class, 'permissions'])->name('role.permissions');
        Route::put('role/{role}/permission/sync', [RoleController::class, 'permissionsSync'])->name('role.permissionsSync');
        Route::resource('role', RoleController::class);
    });
});

/** Web */
/** Home */
Route::get('/', [HomeConttroller::class, 'index'])->name('home');
/** Products */
Route::get('/produtos', [SiteProductController::class, 'index'])->name('products');
Route::get("/produtos/{slug}", [SiteProductController::class, 'item'])->name('product');
/** Bees */
Route::get('/abelhas', [SiteBeeController::class, 'index'])->name('bees');
Route::get("/abelhas/{slug}", [SiteBeeController::class, 'item'])->name('bee');
/** Recipes */
Route::get('/receitas', [SiteRecipeController::class, 'index'])->name('recipes');
Route::get("/receitas/{slug}", [SiteRecipeController::class, 'item'])->name('recipe');
/** Contact */
Route::get('/contato', [ContactController::class, 'index'])->name('contact');
Route::post('/sendEmail', [ContactController::class, 'sendEmail'])->name('sendEmail');
/** Police */
Route::get('/politica-de-privacidade', [PoliceController::class, 'index'])->name('police');

Auth::routes();
