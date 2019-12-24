<?php

Auth::routes();

Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    // Carbon\Carbon::setLocale(config('app.locale'));
    return redirect()->back();
});

Route::get('/', 'HomeController@postsApiRoute')->name('home');
Route::get('/top/week', 'HomeController@postsApiRoute')->name('top.week');
Route::get('/top/month', 'HomeController@postsApiRoute')->name('top.month');
Route::get('/all', 'HomeController@postsApiRoute')->name('all');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/favorite', 'HomeController@postsApiRoute')->name('favorite');
    Route::get('tracker', 'Auth\NotificationController@index')->name('tracker');
    Route::get('tracker/remove/all', 'Auth\NotificationController@deleteAll')->name('delete-all-trackers');

    Route::prefix('@{username}/settings')->group(function (){
        Route::get('profile', 'Auth\UserSettingsController@index')->name('profile-settings');
        Route::post('profile', 'Auth\UserSettingsController@update');
    });
});

Route::prefix('api')->group(function () {
    /*
     * Posts Api
     */
    Route::get('posts/top/day', 'Api\PostController@posts');
    Route::get('posts/top/week', 'Api\PostController@posts');
    Route::get('posts/top/month', 'Api\PostController@posts');
    Route::get('posts/all', 'Api\PostController@all');
    Route::get('posts/favorite', 'Api\PostController@favorite');

    /*
     * Hubs Api
     */
    Route::get('hubs/all', 'Api\HubController@search');
    Route::get('hubs/{id}', 'Api\HubController@posts');
    Route::get('hubs', 'Api\HubController@hubs')->name('hubs-list');

    /*
     * Users Api
     */
    Route::get('users/all', 'Api\UserController@users');
});

Route::prefix('post')->group(function () {
    Route::get('/add', 'PostController@create')->name('create_post');
    Route::get('/{id}', 'PostController@show')->name('show');
    Route::post('/{post}', 'PostController@updateViews');
    Route::post('/favorite/{id}', 'PostController@addFavorite');
});

Route::prefix('hubs')->group(function () {
    Route::get('/', 'HubController@index');
    Route::get('/{id}', 'HubController@show');
    Route::post('/follow/{id}', 'HubController@follow');
});

Route::get('search-result', 'SearchController@index')->name('search-result');
Route::post('search-result', 'SearchController@index');

Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@userList')->name('users-list');
    Route::post('{profileId}/follow', 'ProfileController@followUser')->name('user.follow');
    Route::post('{profileId}/un_follow', 'ProfileController@unFollowUser')->name('user.un_follow');
    Route::get('@{username}', 'UserController@show')->name('user_profile');
});

Route::prefix('comment')->group(function () {
    Route::post('new-comment', 'CommentController@newComment')->name('new-comment');
});

Route::resource('posts', 'PostController');

Route::get('about_us', function () {
    return view('pages.about_us');
});

// FUTURE
Route::post('upvote', 'PostController@vote');

Route::get('query', 'HomeController@indexTest');


Route::get('test', 'Auth\NotificationController@test');
