<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\panierController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
        Route::get('/PDF', [PDFController::class,'generatePDF'])->name('PDF');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::post('/pro', [ProduitController::class, 'index'])->name('woody.index');
        Route::get('/pro', [ProduitController::class, 'index'])->name('woody.index');

        Route::get('/article', [ArticleController::class, 'article'])->name('woody.articles');
        Route::post('/article', [ArticleController::class, 'article'])->name('woody.articles');

        Route::get('/panier', [panierController::class, 'index'])->name('woody.panier');
        Route::post('/panier', [panierController::class, 'store'])->name('woody.store');



        Route::get('/paypal', [PayPalController::class, 'paypalIndex'])->name('paypal');
        Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
        Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
        Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');

});
Route::resource('customer', CustomerController::class)->middleware('auth');

require __DIR__.'/auth.php';
