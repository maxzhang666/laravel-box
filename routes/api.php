<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/**
 * JWT 用户鉴权基础路由.
 * laravel-box定义.
 */
Route::group([
    'prefix' => 'auth'
], function ($router) {
    $router->post('login', [AuthController::class, 'login']);
    $router->post('logout', [AuthController::class, 'logout']);
    $router->post('refresh', [AuthController::class, 'refresh']);
    $router->post('me', [AuthController::class, 'me']);
});
