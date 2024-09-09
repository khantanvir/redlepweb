<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Agent\AgentTaskController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Teacher\TeacherController;

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

Route::get('/', function () {
    return view('welcome');
});



