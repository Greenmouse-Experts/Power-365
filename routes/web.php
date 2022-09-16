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
Route::get('/', [App\Http\Controllers\HomePageController::class, 'index']);

// Auth
Route::get('/subscribe', [App\Http\Controllers\HomePageController::class, 'subscribe'])->name('subscribe');
Route::post('/subscribe', [App\Http\Controllers\HomePageController::class, 'post_subscribe'])->name('post.subscribe');
Route::get('/make/payment/{user}', [App\Http\Controllers\HomePageController::class, 'payment'])->name('user.make.payment');
Route::get('/payment/callback', [App\Http\Controllers\HomePageController::class, 'handleGatewayCallback'])->name('user.handleGatewayCallback');
Route::get('/continue/register', [App\Http\Controllers\HomePageController::class, 'continue_register'])->name('continue.register');
Route::post('/continue/register', [App\Http\Controllers\HomePageController::class, 'post_continue_register'])->name('post.continue.register');
Route::get('/register', [App\Http\Controllers\HomePageController::class, 'register'])->name('register');
Route::post('/register/{id}', [App\Http\Controllers\HomePageController::class, 'post_register'])->name('post.register');
Route::get('/verify/account/{email}', [App\Http\Controllers\HomePageController::class, 'verify_account'])->name('verify.account');
Route::post('/email/verify/resend/{email}', [App\Http\Controllers\HomePageController::class, 'email_verify_resend'])->name('email.verify.resend');
Route::post('/email/confirm/{token}', [App\Http\Controllers\HomePageController::class, 'registerConfirm'])->name('email.confirmation');
Route::get('/login', [App\Http\Controllers\HomePageController::class, 'login'])->name('login');
Route::post('/user/login', [App\Http\Controllers\HomePageController::class, 'user_login'])->name('user.login');
Route::get('/forget', [App\Http\Controllers\HomePageController::class, 'forget'])->name('forget');
Route::post('/password/forget',  [App\Http\Controllers\HomePageController::class, 'forget_password'])->name('user.forget.password');
Route::get('/reset/password/email', [App\Http\Controllers\HomePageController::class, 'password_reset_email'])->name('user.reset.password');
Route::post('update/password/reset/', [App\Http\Controllers\HomePageController::class, 'reset_password'])->name('user.update.password');


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

// User
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('dashboard')->group(function () {
    Route::get('add/subscription', [App\Http\Controllers\HomeController::class, 'add_subscription'])->name('user.add.subscription');
    Route::get('/payment/callback', [App\Http\Controllers\HomeController::class, 'handleGatewayCallback'])->name('user.new.handleGatewayCallback');
    Route::get('/subscriptions', [App\Http\Controllers\HomeController::class, 'subscriptions'])->name('user.subscriptions');
    Route::get('/deposits', [App\Http\Controllers\HomeController::class, 'deposits'])->name('user.deposits');
    Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('user.account');
    Route::post('/account/upload_photo/{id}', [App\Http\Controllers\HomeController::class, 'upload_photo'])->name('user.account.upload.photo');
    Route::post('/account/update_password/{id}', [App\Http\Controllers\HomeController::class, 'update_password'])->name('user.account.update.password');
    Route::get('/notifications', [App\Http\Controllers\HomeController::class, 'notifications'])->name('notifications');
});

// Admin
Route::get('/admin/login', [App\Http\Controllers\HomePageController::class, 'admin_login'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\HomePageController::class, 'post_admin_login'])->name('post.admin.login');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/active/users', [App\Http\Controllers\AdminController::class, 'active_users'])->name('admin.active.users');
    Route::get('/admin/view/edit/user/{id}', [App\Http\Controllers\AdminController::class, 'view_edit_user'])->name('admin.view.edit.user');
    Route::post('/admin/message/user/{id}', [App\Http\Controllers\AdminController::class, 'message_user'])->name('admin.message.user');
    Route::post('/admin/delete/user/{id}', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('admin.delete.user');
    Route::get('/admin/in-active/users', [App\Http\Controllers\AdminController::class, 'in_active_users'])->name('admin.in-active.users');
    Route::get('/admin/deposits', [App\Http\Controllers\AdminController::class, 'deposits'])->name('admin.deposits');
    Route::get('/admin/account', [App\Http\Controllers\AdminController::class, 'account'])->name('admin.account');
    Route::post('/admin/account/upload_profile/{id}', [App\Http\Controllers\AdminController::class, 'update_profile'])->name('admin.account.update.profile');
    Route::post('/admin/account/upload_photo/{id}', [App\Http\Controllers\AdminController::class, 'upload_photo'])->name('admin.account.upload.photo');
    Route::post('/admin/account/update_password/{id}', [App\Http\Controllers\AdminController::class, 'update_password'])->name('admin.account.update.password');
    Route::get('/admin/notifications', [App\Http\Controllers\AdminController::class, 'notifications'])->name('admin.notifications');
});