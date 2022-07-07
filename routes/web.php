<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentsController;
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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/recipes', [RecipeController::class, 'index']);

// récupérer la recette demandée
Route::get('/recipes/{url}', [RecipeController::class, 'show']);

Route::get('contact', [ContactController::class, 'create']);
Route::post('contact', [ContactController::class, 'store']);

//route pour CRUD avec autentification obligatoire
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');

//Route CRUD ameliore
//route pour l'ajout d'une nouvelle recette
Route::post('admin', [AdminController::class, 'addRecipe'])->name('recipe.add');

//route pour la modification
Route::get('admin/{id}',[AdminController::class, 'getRecipeById']);
Route::put('admin/',[AdminController::class, 'updateRecipe'])->name('recipe.update');

//rout pour la suppression
Route::delete('admin/{id}',[AdminController::class, 'deleteRecipe']);


//route pour gestionnair de commentaire
Route::post('recipes/{id}/comments',[CommentsController::class, 'store']);

//Route pour la recherche
Route::get('/search', [RecipeController::class, 'search']);

//Route pour la recherche admin
Route::get('/searchadmin', [AdminController::class, 'search']);

require __DIR__.'/auth.php';
