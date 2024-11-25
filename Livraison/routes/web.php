<?php
use App\Models\client;
use App\Models\livreur;
use App\Models\administrateur;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupermarcheController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\supController;
use App\Http\Controllers\RoleController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController as AuthRegisteredUserController;
use App\Http\Controllers\LivreurController;


Route::get('/dashboard', function () {
    return view('dashboard');

});

Route::get('/', function () {
    return view('client.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('user', UserController::class);
Route::resource('produit', ProduitController::class);
Route::resource('supermarche', SupermarcheController::class);
Route::resource('livreur', LivreurController::class);
Route::resource('categorie', CategorieController::class);
Route::resource('panier', PanierController::class);
Route::resource('article', ArticleController::class);
Route::resource('client', ClientController::class);
Route::resource('sup', SupController::class);
Route::resource('role', RoleController::class);
Route::get('/client-side', [ProduitController::class, 'clientSide'])->name('client.article');
Route::get('/images', [App\Http\Controllers\ImageController::class, 'index']);
Route::delete('/panier/{id}', [PanierController::class, 'remove'])->name('panier.remove');
Route::delete('/panier/empty', [PanierController::class, 'empty'])->name('panier.empty');
Route::get('/panier', [PanierController::class, 'show'])->name('panier.show');
Route::get('/panier/count', [PanierController::class, 'getCartCount'])->name('panier.count');
Route::get('/panier/show', [PanierController::class, 'showCart'])->name('panier.show');





Route::get('/index_admin', [UserController::class, 'index_admin'])->name('user.index_admin');
Route::get('/index_client', [UserController::class, 'index_client'])->name('user.index_client');
Route::get('/index_livreur', [UserController::class, 'index_livreur'])->name('user.index_livreur');




Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/login', [AuthenticatedSessionController::class, 'login'])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
