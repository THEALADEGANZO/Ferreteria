<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\detalle_ventaController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\ventaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    });

    Route::controller(categoriaController::class)->prefix('categoria')->group(function () {
        Route::get('', 'index')->name('categoria');
        Route::get('create', 'create')->name('categoria.create');
        Route::post('store', 'store')->name('categoria.store');
        Route::get('edit/{id}', 'edit')->name('categoria.edit');
        Route::put('edit/{id}', 'update')->name('categoria.update');
        Route::delete('destroy/{id}', 'destroy')->name('categoria.destroy');
    });


    Route::controller(productoController::class)->prefix('producto')->group(function () {
        Route::get('', 'index')->name('producto');
        Route::get('create', 'create')->name('producto.create');
        Route::post('store', 'store')->name('producto.store');
        Route::get('edit/{id}', 'edit')->name('producto.edit');
        Route::put('edit/{id}', 'update')->name('producto.update');
        Route::delete('destroy/{id}', 'destroy')->name('producto.destroy');
    });

    Route::controller(proveedorController::class)->prefix('proveedor')->group(function () {
        Route::get('', 'index')->name('proveedor');
        Route::get('create', 'create')->name('proveedor.create');
        Route::post('store', 'store')->name('proveedor.store');
        Route::get('edit/{id}', 'edit')->name('proveedor.edit');
        Route::put('edit/{id}', 'update')->name('proveedor.update');
        Route::delete('destroy/{id}', 'destroy')->name('proveedor.destroy');
    });

    Route::controller(clienteController::class)->prefix('cliente')->group(function () {
        Route::get('', 'index')->name('cliente');
        Route::get('create', 'create')->name('cliente.create');
        Route::post('store', 'store')->name('cliente.store');
        Route::get('edit/{id}', 'edit')->name('cliente.edit');
        Route::put('edit/{id}', 'update')->name('cliente.update');
        Route::delete('destroy/{id}', 'destroy')->name('cliente.destroy');
    });


    Route::controller(ventaController::class)->prefix('ventas')->group(function () {
        Route::get('', 'index')->name('venta.index');
        Route::get('create', 'create')->name('venta.create');
        Route::post('store', 'store')->name('venta.store');
        Route::get('{venta}', 'show')->name('venta.show');
        Route::get('{venta}/export', 'export')->name('venta.export');

//        Route::get('edit/{id}', 'edit')->name('venta.edit');
//        Route::put('edit/{id}', 'update')->name('venta.update');
//        Route::delete('destroy/{id}', 'destroy')->name('venta.destroy');
    });

    Route::controller(detalle_ventaController::class)->prefix('detalle_venta')->group(function () {
        Route::get('', 'index')->name('detalle_venta.index');
        Route::get('create', 'create')->name('detalle_venta.create');
        Route::post('store', 'store')->name('detalle_venta.store');
        Route::get('edit/{id}', 'edit')->name('detalle_venta.edit');
        Route::put('edit/{id}', 'update')->name('detalle_venta.update');
        Route::delete('destroy/{id}', 'destroy')->name('detalle_venta.destroy');
    });

