<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\PublicController;

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [PublicController::class, 'index'])->name('index');
Route::get('contactus', [PublicController::class, 'contact'])->name('contact');
Route::get('testimonials', [PublicController::class, 'testimonials'])->name('testimonials');
Route::get('topics_detail/{id}/show', [PublicController::class, 'topicsdetail'])->name('topicsDetail');
Route::get('topics_listing', [PublicController::class, 'topicslisting'])->name('topicslisting');

Route::prefix('admin')-> group(function () {
    Route::group([
        'prefix' => 'testimonials',
        'controller' => TestimonialController::class,
        'as' => 'testimonials.',
        'middleware' => 'verified',
        ],function () {
      Route::get('index','index')->name('index');
      Route::get('create','create')->name('create');
      Route::post('','store')->name('store');
      Route::get('/{id}/edit','edit')->name('edit');
      Route::put('/{id}','update')->name('update');
      Route::delete('/{id}/delete','destroy')->name('destroy');
    });

    Route::group([
        'prefix' => 'topics',
        'controller' => TopicController::class,
        'as' => 'topics.',
        'middleware' => 'verified',
        ],function () {
      Route::get('index','index')->name('index');
      Route::get('create','create')->name('create');
      Route::post('', 'store')->name('store');
      Route::get('/{id}/edit','edit')->name('edit');
      Route::put('/{id}','update')->name('update');
      Route::get('/{id}/show','show')->name('show');
      Route::delete('/{id}/delete', 'destroy')->name('destroy');
    });

    Route::group([
      'prefix' => 'categories',
      'controller' => CategoryController::class,
       'as' => 'categories.',
       'middleware' => 'verified',
      ],function () {
    Route::get('index','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('', 'store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::delete('/{id}/delete', 'destroy')->name('destroy');
  });

  Route::group([
    'prefix' => 'users',
    'controller' => UserController::class,
    'as' => 'users.',
    'middleware' => 'verified',
    ],function () {
  Route::get('index','index')->name('index');
  Route::get('create','create')->name('create');
  Route::post('','store')->name('store');
  Route::get('/{id}/edit','edit')->name('edit');
  Route::put('/{id}','update')->name('update');
});

Route::group([
  'prefix' => 'messages',
  'controller' => MessageController::class,
  'as' => 'messages.',
  'middleware' => 'verified',
  ],function () {
  Route::get('index','index')->name('index');
  Route::delete('/{id}/delete', 'destroy')->name('destroy');
});
});


Route::get('message_detail/{id}', [MessageController::class, 'messagedetail'])->name('messageDetail');



Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('contact-us', [App\Http\Controllers\MailController::class, 'ContactForm']);
Route::post('contact-us', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('sendEmail');
