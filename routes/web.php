<?php

Auth::routes();
Route::get('login/github', 'Auth\LoginController@github');
Route::get('login/github/redirect', 'Auth\LoginController@githubRedirect');
//Route::get('/forgot-password', function () {
//    return view('auth.forgot-password');
//})->middleware('guest')->name('password.request');

//Route::get('setlocale/{locale}', function ($locale) {
//    if (in_array($locale, \Config::get('app.locales'))) {
//        Session::put('locale', $locale);
//    }
//    // Carbon\Carbon::setLocale(config('app.locale'));
//    return redirect()->back();
//});

Route::get('/', 'HomeController@postsApiRoute')->name('home');
Route::get('top/week', 'HomeController@postsApiRoute')->name('top.week');
Route::get('top/month', 'HomeController@postsApiRoute')->name('top.month');
Route::get('all', 'HomeController@postsApiRoute')->name('all');

//Auth routes
Route::group(['middleware' => ['auth']], static function () {
    Route::get('favorite', 'HomeController@postsApiRoute')->name('favorite');
    Route::get('tracker', 'Auth\NotificationController@index')->name('tracker');
    Route::get('tracker/remove/all', 'Auth\NotificationController@deleteAll')->name('delete-all-trackers');

    Route::prefix('saved')->group(function () {
        Route::get('/posts', 'Auth\FavoriteController@indexPosts')->name('saved-posts');

        Route::get('/comments', 'Auth\FavoriteController@indexComments')->name('saved-comments');
    });

    Route::prefix('@{username}/settings')->group(function () {
        Route::get('profile', 'Auth\UserSettingsController@index')->name('profile-settings');
        Route::post('profile', 'Auth\UserSettingsController@update');
        Route::post('avatar', 'Auth\UserSettingsController@update_avatar');
    });
});

Route::group([], static function () {
    // Articles view
    Route::prefix('article')->group(static function () {
        Route::get('/new', 'ArticleController@create')->name('create_article');
        Route::post('/create-new-post', 'ArticleController@store');
        Route::get('/{slug}', 'ArticleController@show')->name('show_article')->middleware('session');
        Route::post('/update_views/{post}', 'ArticleController@updateViews');
        Route::post('/favorite/{id}', 'ArticleController@addFavorite');
    });

    // Hubs view
    Route::prefix('hubs')->group(static function () {
        Route::get('/', 'HubController@index')->name('hubs-list');
        Route::get('/{id}', 'HubController@show');
        Route::get('/{id}/top/week', 'HubController@show');
        Route::get('/{id}/top/month', 'HubController@show');
        Route::get('/{id}/all', 'HubController@show');
    });

    //Search view
    Route::get('search-result', 'SearchController@index')->name('search-result');
    Route::post('search-result', 'SearchController@index');

    //Users view
    Route::prefix('authors')->group(static function () {
        Route::get('/', 'AuthorController@userList')->name('users-list');
        Route::post('{profileId}/follow', 'ProfileController@follow');
//        TODO: ADD LINK FAVORITE (ProfileController)

        Route::prefix('@{username}')->group(static function () {
            Route::get('posts', 'AuthorController@showPosts')->name('user_posts');
            Route::get('/', 'AuthorController@showInfo')->name('user_info');
            Route::get('followers', 'AuthorController@showFollowers')->name('user_followers');
            Route::get('followings', 'AuthorController@showFollowings')->name('user_followings');
            Route::get('favorites', 'ProfileController@favorites');
        });
    });

    //Comments view
    Route::prefix('comment')->group(static function () {
        Route::post('new-comment', 'Api\CommentController@newComment')->name('new-comment');
        Route::post('/favorite/{id}', 'Api\CommentController@favorite');
    });

    //About view
    Route::view('about', 'pages.about_us')->name('about');
});

//Admin routes
//Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
//    Route::get('/', 'HomeController@index')->name('home');
//    Route::post('abilities/destroy', 'AbilitiesController@massDestroy')->name('abilities.massDestroy');
//    Route::resource('abilities', 'AbilitiesController');
//    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
//    Route::resource('roles', 'RolesController');
//    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
//    Route::resource('users', 'UsersController');
//});

Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('{path?}', 'HomeController@index')->where('path', '[\/\w\.-]*');
});

// FUTURE
//Route::post('upvote', 'PostController@vote');

Route::get('query', 'HomeController@indexTest');

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
