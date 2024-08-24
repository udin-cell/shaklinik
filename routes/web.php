<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryTreatmenController;
use App\Http\Controllers\DaftarTungguController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MyTransactionController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TreatmenController;
use App\Http\Controllers\TreatmenTransactionController;
use App\Http\Controllers\UserController;


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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/category', [FrontendController::class, 'category'])->name('category');
Route::get('/categorytreatmen', [FrontendController::class, 'categorytreatmen'])->name('categorytreatmen');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');



Route::get('/details/{slug}', [FrontendController::class, 'details'])->name('details');
Route::get('/treatmendetails/{id}', [FrontendController::class, 'treatmendetails'])->name('treatmendetails');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('/checkjadwal', [FrontendController::class, 'checkjadwal'])->name('checkjadwal');
    Route::get('/checkinvoice', [FrontendController::class, 'checkinvoice'])->name('checkinvoice');

    Route::get('/bookingcart', [FrontendController::class, 'bookingcart'])->name('bookingcart');
    Route::get('/bookingdetail', [FrontendController::class, 'bookingdetail'])->name('bookingdetail');
    Route::get('/checkoutdetail', [FrontendController::class, 'checkoutdetail'])->name('checkoutdetail');

    Route::post('/cart/{id}', [FrontendController::class, 'cartAdd'])->name('cart-add');
    Route::delete('/cart/{id}', [FrontendController::class, 'cartDelete'])->name('cart-delete');
    Route::put('/cart/{id}', [FrontendController::class, 'cartEdit'])->name('cart-edit');

    Route::post('/bookingcart/{id}', [FrontendController::class, 'bookingAdd'])->name('booking-add');
    Route::delete('/bookingcart/{id}', [FrontendController::class, 'bookingDelete'])->name('booking-delete');
    Route::put('/bookingcart/{id}', [FrontendController::class, 'bookingEdit'])->name('booking-edit');



    Route::post('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::post('/bookingout', [FrontendController::class, 'bookingout'])->name('bookingout');

    Route::get('/checkout/success', [FrontendController::class, 'success'])->name('checkout-success');


    Route::name('dashboard.')->prefix('dashboard')->group(function () {

        Route::resource('my-transaction', MyTransactionController::class)->only([
            'index', 'show'
        ]);

        Route::middleware(['admin'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');

            Route::get('/laporan-t', [LaporanController::class, 'laporant'])->name('laporan-t');
            Route::get('/laporan-tx', [LaporanController::class, 'laporantx'])->name('laporan-tx');

            Route::resource('product', ProductController::class);
            Route::resource('category', CategoryController::class);
            Route::resource('daftartunggu', DaftarTungguController::class);
            Route::resource('dokter', DokterController::class);
            Route::resource('treatmen', TreatmenController::class);
            Route::resource('categorytreatmen', CategoryTreatmenController::class);
            Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
                'index', 'create', 'store', 'destroy'
            ]);
            Route::resource('transaction', TransactionController::class)->only([
                'index', 'show', 'edit', 'update'
            ]);
            Route::resource('bookingtreatmen', TreatmenTransactionController::class)->only([
                'index', 'show', 'edit', 'update'
            ]);
            Route::resource('user', UserController::class)->only([
                'index', 'edit', 'update', 'destroy'
            ]);
        });
    });
});
