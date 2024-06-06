<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomStatusController;
use App\Http\Controllers\RoomClassController;
use App\Http\Controllers\AddonController;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::group(['middleware'=>['auth','isAdmin']], function($router) {
    $router->get('/', [HomeController::class, 'index'])->name('home');
    $router->resource('bookings', BookingController::class);
    $router->get('rooms/{floor}', [RoomController::class, 'get_rooms'])->name('getRooms');
    $router->get('rooms/room/{room}', [RoomController::class, 'get_rooms_from_room_id'])->name('getRoomsFromRoomId');
    $router->get('room/status/{room_status}', [RoomStatusController::class, 'room_status'])->name('roomStatus');
    $router->get('rooms/class/{room_class}', [RoomClassController::class, 'room_class'])->name('roomClass');
    $router->get('class/{room_class}', [RoomClassController::class, 'room_class_for_price'])->name('roomClassForPrice');
    $router->get('addon/{addon}', [AddonController::class, 'get_addon'])->name('getAddon');
});

// Route::resource('bookings', BookingController::class);

// Route::get('rooms/{floor}', [RoomController::class, 'get_rooms'])->name('getRooms');