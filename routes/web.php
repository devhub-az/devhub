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
    Route::get('@{username}/settings', 'Auth\UserSettingsController@index')->name('settings');
    Route::post('@{username}/settings', 'Auth\UserSettingsController@update');
});

Route::get('/@{username}', 'UserController@show')->name('user_profile');

Route::prefix('api')->group(function () {
    /**
     * Posts Api
     */
    Route::get('posts/top/day', 'Api\PostController@posts');
    Route::get('posts/top/week', 'Api\PostController@posts');
    Route::get('posts/top/month', 'Api\PostController@posts');
    Route::get('posts/all', 'Api\PostController@all');
    Route::get('posts/favorite', 'Api\PostController@favorite');

    /**
     * Hubs Api
     */
    Route::get('hubs/all', 'Api\HubController@search');
    Route::get('hubs/{id}', 'Api\HubController@posts');
    Route::get('hubs', 'Api\HubController@hubs')->name('hubs-list');

    /**
     * Users Api
     */
    Route::get('users/all','Api\UserController@users');
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

Route::get('users', 'UserController@userList')->name('users-list');

Route::prefix('comment')->group(function () {
    Route::post('new-comment', 'CommentController@newComment')->name('new-comment');
});

Route::post('profile/{profileId}/follow', 'ProfileController@followUser')->name('user.follow');
Route::post('/{profileId}/unfollow', 'ProfileController@unFollowUser')->name('user.unfollow');

Route::resource('posts', 'PostController');

Route::get('about_us', function () {
    return view('pages.about_us');
});

// FUTURE
Route::post('upvote', 'PostController@updateVote');

Route::get('query', 'HomeController@indexTest');
