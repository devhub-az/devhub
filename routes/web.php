<?php
Auth::routes();

Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    // Carbon\Carbon::setLocale(config('app.locale'));
    return redirect()->back();
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/top/week', 'HomeController@indexWeek')->name('top.week');
Route::get('/top/month', 'HomeController@indexMonth')->name('top.month');
Route::get('/all', 'HomeController@all')->name('all');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/favorite', 'HomeController@favorite')->name('favorite');
});

Route::prefix('api')->group(function () {
    Route::get('posts/top/day', 'PostController@indexDay');
    Route::get('posts/top/week', 'PostController@indexWeek');
    Route::get('posts/top/month', 'PostController@indexMonth');
    Route::get('posts/all', 'PostController@indexAll');
    Route::get('posts/favorite', 'PostController@favorite');
    Route::get('hubs/all', 'HubController@hubsAll');
    Route::get('hubs/{id}', 'HubController@hubPosts');
    Route::get('hubs', 'HubController@hubs');

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/notifications', 'UserController@notifications');
});

Route::get('search-result', 'SearchController@index')->name('search-result');
Route::post('search-result', 'SearchController@index');

Route::get('users', 'UserController@userList')->name('user-list');

Route::prefix('comment')->group(function () {
    Route::post('new-comment', 'CommentController@newComment')->name('new-comment');
});

Route::get('/@{username}', 'UserController@show')->name('user_profile');

Route::post('profile/{profileId}/follow', 'ProfileController@followUser')->name('user.follow');
Route::post('/{profileId}/unfollow', 'ProfileController@unFollowUser')->name('user.unfollow');

Route::resource('posts', 'PostController');

Route::get('about_us', function () {
    return view('pages.about_us');
});

// FUTURE
Route::post('upvote', 'PostController@updateVote');

Route::get('query', 'HomeController@indexTest');
