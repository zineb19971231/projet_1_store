<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function (){

Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');

Route::get('/categories/{id}',[CategorieController::class, 'show'])->name('categories.show');

Route::get('/categories/edit/{id}', [CategorieController::class, 'edit'])->name('categories.edit');

Route::put('/categories/update/{id}', [CategorieController::class, 'update'])->name('categories.update');

Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');

//Clients
Route::get('/Clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/Clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/Clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/Clients/{id}',[ClientController::class, 'show'])->name('clients.show');
Route::get('/Clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/Clients/update/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/Clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
//produits

Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');

Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');

Route::get('/produits/filter',[ProduitController::class,'filter'])->name('produits.filter');

Route::get('/produits/{id}',[ProduitController::class, 'show'])->name('produits.show');

Route::get('/produits/edit/{id}', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/update/{id}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');

// Commande
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');
});

// home

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// panier
Route::get('/panier',[PanierController::class,'index'])->name('panier.index');
Route::get('/panier/clear', [PanierController::class, 'clearPanier'])->name('panier.clearPanier');

Route::get('/panier/{id}',[PanierController::class,'add'])->name('panier.add'); //->where('id','[1-9]+');

Route::post('/panier/increment/{id}',[PanierController::class,'increment'])->name('panier.increment');
Route::post('/panier/decrement/{id}',[PanierController::class,'decrement'])->name('panier.decrement');
