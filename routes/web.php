<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BookTour\BookTourController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Destination\DestinationController;
use App\Http\Controllers\Admin\Group\GroupController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\Tour\TourController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Vehicle\VehicleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::prefix('/')->name('client.')->group(function () {
    Route::get('/', [ClientController::class, 'home'])->name('index');
    Route::get('/destination', [ClientController::class, 'destination'])->name('destination');
    Route::get('/blog', [ClientController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}', [ClientController::class, 'blogDetail'])->name('blog-detail');
    Route::get('/contact', [ClientController::class, 'contact'])->name('contact');
    Route::get('/tour', [ClientController::class, 'tour'])->name('tour');
    Route::get('/tour/{slug}', [ClientController::class, 'tourDetail'])->name('tour-detail');
    Route::get('/book-tour/{slug}', [ClientController::class, 'bookTour'])->middleware('auth-client')->name('book-tour');
    Route::post('/book-tour/{slug}', [ClientController::class, 'hanldeBookTour'])->middleware('auth-client')->name('handle-book-tour');
    Route::get('/booking-success', [ClientController::class, 'bookingSuccess'])->middleware('auth-client')->name('booking-success');
    Route::get('/about-us', [ClientController::class, 'aboutUs'])->name('about-us');
    Route::get('/hotel', [ClientController::class, 'hotel'])->name('hotel');
    Route::get('/user', [ClientController::class, 'userInfo'])->name('user');
    Route::get('/user/history-book-tour', [ClientController::class, 'historyBookTour'])->name('history-book-tour');
    Route::get('/user/change-password', [ClientController::class, 'changePassword'])->name('change-password');
    Route::put('/user/{email}', [ClientController::class, 'userUpdate'])->name('user-update');
    Route::put('/user/change-password/{email}', [ClientController::class, 'handleChangePassword'])->name('handle-change-password');
    Route::get('/login', [ClientController::class, 'login'])->name('login');
    Route::post('/login', [ClientController::class, 'handleLogin'])->name('handle-login');
    Route::get('/register', [ClientController::class, 'register'])->name('register');
    Route::post('/register', [ClientController::class, 'handleRegister'])->name('handle-register');
    Route::get('/logout', [ClientController::class, 'logout'])->name('logout');
});

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('index');
    // Quản lý danh mục
    Route::prefix('destinations')->name('destination.')->group(function () {
        Route::get('/', [DestinationController::class, 'index'])->name('index');
        Route::get('/add', [DestinationController::class, 'add'])->name('add');
        Route::post('/add', [DestinationController::class, 'store'])->name('store');
        Route::get('/edit/{destination}', [DestinationController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [DestinationController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [DestinationController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [DestinationController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [DestinationController::class, 'restore'])->name('restore');
    });
    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/add', [categoryController::class, 'add'])->name('add');
        Route::post('/add', [categoryController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [categoryController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [categoryController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [categoryController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [categoryController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [categoryController::class, 'restore'])->name('restore');
    });
    Route::prefix('tours')->name('tour.')->group(function () {
        Route::get('/', [TourController::class, 'index'])->name('index');
        Route::get('/add', [TourController::class, 'add'])->name('add');
        Route::post('/add', [TourController::class, 'store'])->name('store');
        Route::get('/edit/{tour}', [TourController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [TourController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [TourController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [TourController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [TourController::class, 'restore'])->name('restore');
    });
    Route::prefix('book-tours')->name('book-tour.')->group(function () {
        Route::get('/', [BookTourController::class, 'index'])->name('index');
        Route::get('/view/{tour}', [BookTourController::class, 'viewDetail'])->name('view-detail');
        Route::put('/view/{id}', [BookTourController::class, 'updateStatus'])->name('update-status');
        Route::delete('/delete/{id}', [BookTourController::class, 'delete'])->name('delete');
    });

    Route::prefix('posts')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/add', [PostController::class, 'add'])->name('add');
        Route::post('/add', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [PostController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [PostController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [PostController::class, 'restore'])->name('restore');
    });

    Route::prefix('vehicles')->name('vehicle.')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('index');
        Route::get('/add', [VehicleController::class, 'add'])->name('add');
        Route::post('/add', [VehicleController::class, 'store'])->name('store');
        Route::get('/edit/{vehicle}', [VehicleController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [VehicleController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [VehicleController::class, 'delete'])->name('delete');
    });
    Route::prefix('tags')->name('tag.')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/add', [TagController::class, 'add'])->name('add');
        Route::post('/add', [TagController::class, 'store'])->name('store');
        Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [TagController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [TagController::class, 'delete'])->name('delete');
    });
    // Quản lý nhóm người dùng
    Route::prefix('groups')->name('group.')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('index');
        Route::get('/add', [GroupController::class, 'add'])->name('add');
        Route::post('/add', [GroupController::class, 'store'])->name('store');
        Route::get('/edit/{group}', [GroupController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [GroupController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [GroupController::class, 'delete'])->name('delete');
    });
    // Quản lý người dùng
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/add', [UserController::class, 'add'])->name('add');
        Route::post('/add', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [UserController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete/{id}', [UserController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore/{id}', [UserController::class, 'restore'])->name('restore');
        Route::get('/account-setting', [UserController::class, 'AccountSetting'])->name('account-setting');
    });
    Route::post('/upload', [ImageController::class, 'upload'])->name('upload');
});
Route::prefix('/auth-dashboard')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
// Routes dành cho các mẫu
require __DIR__ . '/template.php';
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
