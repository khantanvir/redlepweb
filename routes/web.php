<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Agent\AgentTaskController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Home\HomeController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('login', 'login')->name('login');
    Route::get('student-login', 'student_login');
    Route::get('student-register', 'student_register');
    Route::post('student-register-post', 'student_register_post');
    Route::get('get-notification-count', 'get_notification_count');
    Route::get('get-my-notification', 'get_my_notification');
    Route::get('my-notification-list', 'get_all_my_notification');
    Route::get('show-all-activity', 'show_all_activity');
    Route::get('get-user-by-role/{role?}', 'get_user_by_role');
    Route::get('reset-user-activity-list', 'reset_user_activity_list');
    Route::get('random-check', 'random_check');
});
Route::middleware(['auth'])->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::post('blog-upload-image', 'upload_image');
        Route::post('blog-status-change', 'blog_status_change');
        Route::get('image/upload','upload_image_page');
        Route::get('create-blog/image/upload','upload_image_page');
        Route::get('list-blog', 'list_blog');
        Route::get('/create-blog/new','create_blog');
        Route::get('create-blog/{id?}', 'create_blog');
        Route::post('create-blog-data-post', 'create_blog_data_post');
        Route::get('blog-categories/{id?}', 'all_blog_categories');
        Route::post('store-blog-category-data','create_blog_category');
        Route::post('blog-category_status_change','category_status_change');
    });
    Route::controller(SettingController::class)->group(function () {
        Route::get('company-settings', 'company_settings');
        Route::post('company-setting-post', 'company_setting_post');
    });
    
});
Route::controller(LoginController::class)->group(function () {
    Route::post('user-login-post', 'user_login');
    Route::get('sign-out', 'sign_out');
    Route::get('reset-password', 'reset_password');
    Route::post('reset-password-post', 'reset_password_post');
    Route::get('reset-password-form/{token?}', 'reset_password_form');
    Route::post('reset-password-form-post', 'reset_password_form_post');
});
Route::get('/', function () {
    return view('welcome');
});
Route::controller(UserController::class)->group(function () {
    Route::get('profile-settings', 'profile_settings');
    Route::get('edit_profile', 'edit_profile');
    Route::post('my-profile-update', 'my_profile_update');
});

Route::get('/run-migrations', function () {
    Artisan::call('migrate');
    return 'Migrations have been run!';
});
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'All Cached Cleared!';
});



