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

Route::get('/test', [App\Http\Controllers\HomePageController::class, 'sms']);

Route::get('/', [App\Http\Controllers\HomePageController::class, 'index']);
Route::get('/about', [App\Http\Controllers\HomePageController::class, 'about']);
Route::get('/beneficiaries', [App\Http\Controllers\HomePageController::class, 'beneficiaries']);
Route::get('/faqs', [App\Http\Controllers\HomePageController::class, 'faqs'])->name('faqs');
Route::get('/contact', [App\Http\Controllers\HomePageController::class, 'contact'])->name('contact');
Route::post('/contact-us', [App\Http\Controllers\HomePageController::class, 'contactConfirm']);
Route::get('/blog', [App\Http\Controllers\HomePageController::class, 'blog']);
Route::get('/view/{id}', [App\Http\Controllers\HomePageController::class, 'single_blog'])->name('single.blog');
Route::get('/terms-conditions', [App\Http\Controllers\HomePageController::class, 'terms_conditions']);
Route::get('/privacy-policy', [App\Http\Controllers\HomePageController::class, 'privacy_policy']);

// Auth
Route::get('/subscribe', [App\Http\Controllers\HomePageController::class, 'subscribe'])->name('subscribe');
Route::post('/subscribe', [App\Http\Controllers\HomePageController::class, 'post_subscribe'])->name('post.subscribe');
Route::get('/make/payment/{user}', [App\Http\Controllers\HomePageController::class, 'payment'])->name('user.make.payment');
Route::get('/payment/callback', [App\Http\Controllers\HomePageController::class, 'handleGatewayCallback'])->name('user.handleGatewayCallback');
Route::get('/continue/register', [App\Http\Controllers\HomePageController::class, 'continue_register'])->name('continue.register');
Route::post('/continue/register', [App\Http\Controllers\HomePageController::class, 'post_continue_register'])->name('post.continue.register');
Route::get('/register/{id}', [App\Http\Controllers\HomePageController::class, 'register'])->name('register');
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
    Route::get('/application', [App\Http\Controllers\HomeController::class, 'application'])->name('user.application');
    Route::get('/lab', [App\Http\Controllers\HomeController::class, 'lab'])->name('user.lab');
    Route::any('/post/lab/answer/{id}', [App\Http\Controllers\HomeController::class, 'post_lab_answer'])->name('user.post.lab.answer');
    Route::get('/deposits', [App\Http\Controllers\HomeController::class, 'deposits'])->name('user.deposits');
    Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('user.account');
    Route::post('/account/upload_photo/{id}', [App\Http\Controllers\HomeController::class, 'upload_photo'])->name('user.account.upload.photo');
    Route::post('/account/update_password/{id}', [App\Http\Controllers\HomeController::class, 'update_password'])->name('user.account.update.password');
    Route::get('/notifications', [App\Http\Controllers\HomeController::class, 'notifications'])->name('notifications');
    Route::any('/notification/read/{id}', [App\Http\Controllers\HomeController::class, 'read_notification'])->name('read.notification');
});

// Admin
Route::get('/admin/login', [App\Http\Controllers\HomePageController::class, 'admin_login'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\HomePageController::class, 'post_admin_login'])->name('post.admin.login');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/subscribers/active', [App\Http\Controllers\AdminController::class, 'active_users'])->name('admin.active.users');
    Route::get('/admin/subscribers/view/edit/{id}', [App\Http\Controllers\AdminController::class, 'view_edit_user'])->name('admin.view.edit.user');
    Route::get('/admin/subscribers/knowledgebase/{id}', [App\Http\Controllers\AdminController::class, 'users_knowledgebase'])->name('admin.users.knowledgebase');
    Route::post('/admin/subscribers/message//{id}', [App\Http\Controllers\AdminController::class, 'message_user'])->name('admin.message.user');
    Route::post('/admin/subscribers/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('admin.delete.user');
    Route::get('/admin/subscribers/in-active', [App\Http\Controllers\AdminController::class, 'in_active_users'])->name('admin.in-active.users');
    Route::get('/admin/subscribers/unsuccessful', [App\Http\Controllers\AdminController::class, 'unsuccessful_users'])->name('admin.unsuccessful.users');
    Route::get('/admin/deposits', [App\Http\Controllers\AdminController::class, 'deposits'])->name('admin.deposits');
    Route::get('/admin/account', [App\Http\Controllers\AdminController::class, 'account'])->name('admin.account');
    Route::post('/admin/account/upload_profile/{id}', [App\Http\Controllers\AdminController::class, 'update_profile'])->name('admin.account.update.profile');
    Route::post('/admin/account/upload_photo/{id}', [App\Http\Controllers\AdminController::class, 'upload_photo'])->name('admin.account.upload.photo');
    Route::post('/admin/account/update_password/{id}', [App\Http\Controllers\AdminController::class, 'update_password'])->name('admin.account.update.password');
    Route::get('/admin/notifications', [App\Http\Controllers\AdminController::class, 'notifications'])->name('admin.notifications');
    Route::get('/admin/questions/topics', [App\Http\Controllers\AdminController::class, 'topics'])->name('admin.topics');
    Route::post('/admin/questions/post/topic', [App\Http\Controllers\AdminController::class, 'create_topic'])->name('admin.post.topic');
    Route::post('/admin/update/topic/{id}', [App\Http\Controllers\AdminController::class, 'update_topic'])->name('admin.update.topic');
    Route::post('/admin/delete/topic/{id}', [App\Http\Controllers\AdminController::class, 'delete_topic'])->name('admin.delete.topic');
    Route::get('/admin/questions', [App\Http\Controllers\AdminController::class, 'questions'])->name('admin.questions');
    Route::post('/admin/questions/post', [App\Http\Controllers\AdminController::class, 'create_question'])->name('admin.post.question');
    Route::get('/admin/questions/view', [App\Http\Controllers\AdminController::class, 'view_questions'])->name('admin.view.questions');
    Route::post('/admin/update/question/{id}', [App\Http\Controllers\AdminController::class, 'update_question'])->name('admin.update.question');
    Route::post('/admin/delete/question/{id}', [App\Http\Controllers\AdminController::class, 'delete_question'])->name('admin.delete.question');
    Route::get('/admin/beneficiaries', [App\Http\Controllers\AdminController::class, 'beneficiaries'])->name('admin.beneficiaries');
    Route::post('/admin/beneficiaries/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_beneficiaries'])->name('admin.delete.beneficiaries');
    Route::post('/admin/post/shuffle', [App\Http\Controllers\AdminController::class, 'shuffle'])->name('admin.shuffle');
    Route::get('/admin/blog/add', [App\Http\Controllers\AdminController::class, 'add_blog'])->name('admin.add.blog');
    Route::post('/admin/blog/add', [App\Http\Controllers\AdminController::class, 'post_blog'])->name('admin.post.blog');
    Route::get('/admin/blogs/view', [App\Http\Controllers\AdminController::class, 'view_blogs'])->name('admin.view.blogs');
    Route::post('/admin/blog/update/{id}', [App\Http\Controllers\AdminController::class, 'update_blog'])->name('admin.update.blog');
    Route::post('/admin/blog/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete_blog'])->name('admin.delete.blog');
});