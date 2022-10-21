<?php
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// 管理者Login関係
Route::get('/login/administrators', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::get('/register/administrators', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);

Route::post('/login/administrators', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/register/administrators', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin'])->name('administrators-register');


// 管理者画面 TOP,商品一覧•登録•削除
Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'itemsTop']);
    Route::get('/index', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('/items/{id}/edit');
    Route::post('/{id}/edit', [App\Http\Controllers\ItemController::class, 'update'])->name('/items/{id}/edit');
    Route::delete('/{id}/delete', [App\Http\Controllers\ItemController::class, 'destroy'])->name('/items/{id}/delete');
});
// 管理者画面 カテゴリー一覧•登録•削除
Route::prefix('types')->group(function () {
    Route::get('/', [App\Http\Controllers\TypeController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\TypeController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\TypeController::class, 'add']);
    Route::get('/{id}/edit', [App\Http\Controllers\TypeController::class, 'edit'])->name('/types/{id}/edit');
    Route::post('/{id}/edit', [App\Http\Controllers\TypeController::class, 'update'])->name('/types/{id}/edit');
    Route::delete('/{id}/delete', [App\Http\Controllers\TypeController::class, 'destroy'])->name('/types/{id}/delete');
});

// ユーザー画面
Route::prefix('home')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'top'])->name('home');
    Route::get('/{id}/index', [App\Http\Controllers\HomeController::class, 'index'])->name('/home/{id}/index');
    Route::get('/{id}/show', [App\Http\Controllers\HomeController::class, 'show'])->name('/home/{id}/show');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'cartList']);
    Route::post('/cart', [App\Http\Controllers\CartController::class, 'addToCart']);
    Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'updateCart']);
    Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'removeCart']);
    Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clearAllCart']);

    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/user-info', [App\Http\Controllers\CheckoutController::class, 'deliveryDetails'])->name('user-info');
    Route::post('/checkout/user-info', [App\Http\Controllers\CheckoutController::class, 'create'])->name('user-info');

    Route::get('/payment', [App\Http\Controllers\StripeController::class, 'showCharge'])->name('charge');
    Route::post('/payment', [App\Http\Controllers\StripeController::class, 'charge'])->name('charge');
    Route::get('/payment/complete', [App\Http\Controllers\StripeController::class, 'complete'])->name('complete');
});
