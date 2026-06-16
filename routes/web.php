<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;

// Guest Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Protected Routes
Route::middleware(['demo.auth'])->group(function () {
    // Redirect root to /home
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/model/{id}', [ModelController::class, 'show'])->name('model.show');
    
    // Support open-model/{id} format
    Route::get('/open-model/{id}', function ($id) {
        return redirect()->route('model.show', ['id' => $id]);
    });

    Route::get('/phone/{id}', [PhoneController::class, 'show'])->name('phone.show');
    
    Route::post('/wishlist/toggle/{id}', function ($id) {
        $wishlist = session()->get('wishlist', []);
        $id = (int)$id;
        if (in_array($id, $wishlist)) {
            $wishlist = array_values(array_diff($wishlist, [$id]));
            $status = 'removed';
        } else {
            $wishlist[] = $id;
            $status = 'added';
        }
        session()->put('wishlist', $wishlist);
        return response()->json(['status' => $status, 'wishlist' => $wishlist]);
    })->name('wishlist.toggle');
    
    // Logout can be hit via GET or POST
    Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
});
