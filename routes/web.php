<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// 🏠 **Home Page**
Route::get('/', function () {
    return view('home');
})->name('home');

// 🚗 **Publicly Accessible Static Pages**
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// 🏠 **User Dashboard - Authenticated Users Only**
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // 📝 **User Profile Management**
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.picture.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🚘 **Car Listings**
    Route::resource('cars', CarController::class);
    Route::patch('/cars/{id}/toggle-status', [CarController::class, 'toggleStatus'])->name('cars.toggleStatus');
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/my-listings', [CarController::class, 'userListings'])->name('cars.userListings');
    Route::post('/cars/{id}/deactivate', [CarController::class, 'deactivate'])->name('cars.deactivate');
    Route::delete('/cars/{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');

    // 💰 **Bidding Routes**
    Route::get('/bids', [BiddingController::class, 'index'])->name('bids.index');
    Route::post('/bids/{car}', [BiddingController::class, 'store'])->name('bidding.submit');
    Route::post('/bids/{id}/approve', [BiddingController::class, 'approve'])->name('bids.approve');
    Route::get('/bidding/{id}/receipt', [BiddingController::class, 'downloadReceipt'])->name('bidding.receipt');



    // 🚗 **Test Drive Routes**
    Route::post('/testdrive/book/{car}', [TestDriveController::class, 'book'])->name('testdrive.book');
    Route::get('/testdrives', [TestDriveController::class, 'index'])->name('testdrives.index');
});

// 👑 **Admin Routes - Restricted to Admins Only**

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    

// 👥 **User Management**
Route::get('/users', [AdminController::class, 'listUsers'])->name('admin.users'); // Changed name
Route::post('/users/{id}/make-admin', [AdminController::class, 'markAsAdmin'])->name('admin.makeAdmin');
Route::patch('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');


    // 🚘 **Car Management**
    Route::get('/cars', [AdminController::class, 'manageCars'])->name('admin.cars');
    Route::post('/cars/{id}/toggle-status', [AdminController::class, 'toggleCarStatus'])->name('admin.toggleCarStatus');
    Route::delete('/cars/{id}', [AdminController::class, 'deleteCar'])->name('admin.deleteCar');


    // 📅 **Test Drive Approvals**
    Route::get('/testdrives', [AdminController::class, 'testDrives'])->name('admin.testdrives');
    Route::put('/testdrives/{id}', [AdminController::class, 'updateTestDrive'])->name('admin.testdrives.update');
    Route::post('/testdrive/{id}/approve', [AdminController::class, 'approveTestDrive'])->name('admin.approveTestDrive');

    // 💰 **Bidding & Transactions**
    Route::post('/bids/{id}/finalize', [AdminController::class, 'finalizeTransaction'])->name('admin.finalizeTransaction');
    Route::get('/bids', [AdminController::class, 'bids'])->name('admin.bids');
    Route::put('/bids/{id}', [AdminController::class, 'updateBid'])->name('admin.bids.update');

    
});

// Authentication Routes
require __DIR__.'/auth.php';
