<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BookTour\BookTourController;
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
use App\Models\BookTour;
use App\Models\Destination;
use App\Models\Group;
use App\Models\Post;
use App\Models\Tour;
use App\Models\User;
use App\Models\Vehicle;
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
    Route::get('/favourite-tours', [ClientController::class, 'favouriteTour'])->middleware('auth-client')->name('favourite-tours');
    Route::post('/add-favourite', [ClientController::class, 'addFavourite'])->middleware('auth-client')->name('add-favourite');
    Route::delete('/remove-favourite', [ClientController::class, 'removeFavourite'])->middleware('auth-client')->name('remove-favourite');
    Route::get('/tour/{slug}', [ClientController::class, 'tourDetail'])->name('tour-detail');
    Route::post('/tour/{slug}', [ClientController::class, 'ratingTour'])->name('rating-tour');
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

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth', 'can:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('index');
    // Quản lý danh mục
    Route::prefix('destinations')->name('destination.')->middleware('can:destinations')->group(function () {
        Route::get('/', [DestinationController::class, 'index'])->name('index')->can('viewAny', Destination::class);
        Route::get('/add', [DestinationController::class, 'add'])->name('add')->can('create', Destination::class);
        Route::post('/add', [DestinationController::class, 'store'])->name('store')->can('create', Destination::class);
        Route::get('/edit/{destination}', [DestinationController::class, 'edit'])->name('edit')->can('update', Destination::class);
        Route::put('/edit/{id}', [DestinationController::class, 'update'])->name('update')->can('update', Destination::class);
        Route::delete('/soft-delete/{id}', [DestinationController::class, 'softDelete'])->name('soft-delete')->can('detele', Destination::class);
        Route::delete('/force-delete/{id}', [DestinationController::class, 'forceDelete'])->name('force-delete')->can('detele', Destination::class);
        Route::delete('/restore/{id}', [DestinationController::class, 'restore'])->name('restore')->can('detele', Destination::class);
    });
    Route::prefix('tours')->name('tour.')->middleware('can:tours')->group(function () {
        Route::get('/', [TourController::class, 'index'])->name('index')->can('viewAny', Tour::class);
        Route::get('/add', [TourController::class, 'add'])->name('add')->can('create', Tour::class);
        Route::post('/add', [TourController::class, 'store'])->name('store')->can('create', Tour::class);
        Route::get('/edit/{tour}', [TourController::class, 'edit'])->name('edit')->can('update', Tour::class);
        Route::put('/edit/{id}', [TourController::class, 'update'])->name('update')->can('update', Tour::class);
        Route::delete('/soft-delete/{id}', [TourController::class, 'softDelete'])->name('soft-delete')->can('delete', Tour::class);
        Route::delete('/force-delete/{id}', [TourController::class, 'forceDelete'])->name('force-delete')->can('delete', Tour::class);
        Route::delete('/restore/{id}', [TourController::class, 'restore'])->name('restore')->can('delete', Tour::class);
    });
    Route::prefix('book-tours')->name('book-tour.')->middleware('can:book-tours')->group(function () {
        Route::get('/', [BookTourController::class, 'index'])->name('index')->can('viewAny', BookTour::class);
        Route::get('/view/{tour}', [BookTourController::class, 'viewDetail'])->name('view-detail')->can('update', BookTour::class);
        Route::put('/view/{id}', [BookTourController::class, 'updateStatus'])->name('update-status')->can('update', BookTour::class);
        Route::delete('/delete/{id}', [BookTourController::class, 'delete'])->name('delete')->can('delete', BookTour::class);
    });

    Route::prefix('posts')->name('post.')->middleware('can:posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index')->can('viewAny', Post::class);
        Route::get('/add', [PostController::class, 'add'])->name('add')->can('create', Post::class);
        Route::post('/add', [PostController::class, 'store'])->name('store')->can('create', Post::class);
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit')->can('update', Post::class);
        Route::put('/edit/{id}', [PostController::class, 'update'])->name('update')->can('update', Post::class);
        Route::delete('/soft-delete/{id}', [PostController::class, 'softDelete'])->name('soft-delete')->can('delete', Post::class);
        Route::delete('/force-delete/{id}', [PostController::class, 'forceDelete'])->name('force-delete')->can('delete', Post::class);
        Route::delete('/restore/{id}', [PostController::class, 'restore'])->name('restore')->can('delete', Post::class);
    });

    Route::prefix('vehicles')->name('vehicle.')->middleware('can:vehicles')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('index')->can('viewAny', Vehicle::class);
        Route::get('/add', [VehicleController::class, 'add'])->name('add')->can('create', Vehicle::class);
        Route::post('/add', [VehicleController::class, 'store'])->name('store')->can('create', Vehicle::class);
        Route::get('/edit/{vehicle}', [VehicleController::class, 'edit'])->name('edit')->can('update', Vehicle::class);
        Route::put('/edit/{id}', [VehicleController::class, 'update'])->name('update')->can('update', Vehicle::class);
        Route::delete('/delete/{id}', [VehicleController::class, 'delete'])->name('delete')->can('delete', Vehicle::class);
    });
    Route::prefix('tags')->name('tag.')->middleware('can:tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/add', [TagController::class, 'add'])->name('add')->can('create', Tag::class);
        Route::post('/add', [TagController::class, 'store'])->name('store')->can('create', Tag::class);
        Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('edit')->can('update', Tag::class);
        Route::put('/edit/{id}', [TagController::class, 'update'])->name('update')->can('update', Tag::class);
        Route::delete('/delete/{id}', [TagController::class, 'delete'])->name('delete')->can('delete', Tag::class);
    });
    // Quản lý nhóm người dùng
    Route::prefix('groups')->name('group.')->middleware('can:groups')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('index')->can('viewAny', Group::class);
        Route::get('/add', [GroupController::class, 'add'])->name('add')->can('create', Group::class);
        Route::post('/add', [GroupController::class, 'store'])->name('store')->can('create', Group::class);
        Route::get('/edit/{group}', [GroupController::class, 'edit'])->name('edit')->can('update', Group::class);
        Route::put('/edit/{id}', [GroupController::class, 'update'])->name('update')->can('update', Group::class);
        Route::delete('/delete/{id}', [GroupController::class, 'delete'])->name('delete')->can('delete', Group::class);
        Route::get('/permissions/{group}', [GroupController::class, 'permissions'])->name('permissions')->can('permission', Group::class);
        Route::put('/permissions/{id}', [GroupController::class, 'postPermissions'])->name('postPermissions')->can('permission', Group::class);
    });
    // Quản lý người dùng
    Route::prefix('users')->name('user.')->middleware('can:users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index')->can('viewAny', User::class);
        Route::get('/add', [UserController::class, 'add'])->name('add')->can('create', User::class);
        Route::post('/add', [UserController::class, 'store'])->name('store')->can('create', User::class);
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit')->can('update', User::class);
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('update')->can('update', User::class);
        Route::delete('/soft-delete/{id}', [UserController::class, 'softDelete'])->name('soft-delete')->can('delete', User::class);
        Route::delete('/force-delete/{id}', [UserController::class, 'forceDelete'])->name('force-delete')->can('delete', User::class);
        Route::delete('/restore/{id}', [UserController::class, 'restore'])->name('restore')->can('delete', User::class);
        Route::get('/account-setting', [UserController::class, 'AccountSetting'])->name('account-setting');
    });
    Route::get('/media', function () {
        return view('admin.media.index');
    })->middleware('can:media')->name('media');
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
