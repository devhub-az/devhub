<?php

Auth::routes();

//Route::get('setlocale/{locale}', function ($locale) {
//    if (in_array($locale, \Config::get('app.locales'))) {
//        Session::put('locale', $locale);
//    }
//    // Carbon\Carbon::setLocale(config('app.locale'));
//    return redirect()->back();
//});

Route::get('/', 'HomeController@postsApiRoute')->name('home');
Route::get('/top/week', 'HomeController@postsApiRoute')->name('top.week');
Route::get('/top/month', 'HomeController@postsApiRoute')->name('top.month');
Route::get('/all', 'HomeController@postsApiRoute')->name('all');
Route::get('/downloadPDF/{id}', 'UserController@downloadPDF');

Route::group(['middleware' => ['auth', 'activity']], static function () {
    Route::get('/favorite', 'HomeController@postsApiRoute')->name('favorite');
    Route::get('tracker', 'Auth\NotificationController@index')->name('tracker');
    Route::get('tracker/remove/all', 'Auth\NotificationController@deleteAll')->name('delete-all-trackers');

    // Conversations
    Route::get('/conversations', 'ConversationController@index')->name('conversations');
    Route::get('/conversations/{user}', 'ConversationController@show')
//        ->middleware('can:talkTo,user')
        ->name('conversations.show');
    Route::post('/conversations/{user}', 'ConversationController@store')
        ->middleware('can:talkTo,user')
        ->name('conversations.show');

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

Route::prefix('api')->group(static function () {
    /*
     * Posts Api
     */
    Route::get('posts/top/day', 'Api\PostController@posts');
    Route::get('posts/top/week', 'Api\PostController@posts');
    Route::get('posts/top/month', 'Api\PostController@posts');
    Route::get('posts/all', 'Api\PostController@all');
    Route::get('posts/favorite', 'Api\PostController@favorite');
    Route::get('posts/{id}', 'Api\PostController@show');
    Route::post('post/image/cache', 'Api\PostController@upload_image');

    /**
     * Comments Api
     */

    Route::get('comment/{id}', 'Api\CommentController@show');

    /*
     * Favorite Api
     */

    Route::prefix('saved')->group(function () {
        Route::get('posts', 'Api\SavedController@allPosts');
        Route::get('comments', 'Api\SavedController@allComments');
    });

    /*
     * Hubs Api
     */
    Route::get('hubs/search', 'Api\HubController@search');
    Route::get('hubs/{id}/top/day', 'Api\PostHubController@posts');
    Route::get('hubs/{id}/top/week', 'Api\PostHubController@posts');
    Route::get('hubs/{id}/top/month', 'Api\PostHubController@posts');
    Route::get('hubs/{id}/all', 'Api\PostHubController@all');

    Route::get('hubs', 'Api\HubController@hubs')->name('hubs-list-api');

    /*
     * Users Api
     */
    Route::get('/users/{id}/follow_check', 'Api\UserController@userFollowCheck');
    Route::get('users/all', 'Api\UserController@users');
    Route::get('users/{id}/followings', 'Api\UserController@followings');
    Route::get('users/{id}/followers', 'Api\UserController@followers');

    /*
     * Profile Api
     */
    Route::get('/users/{id}/posts', 'Api\UserController@posts');
    Route::post('/users/{id}/profile_update', 'Api\UserController@upload');
});


Route::group(['middleware' => ['activity']], static function () {
    Route::prefix('post')->group(static function () {
        Route::get('/add', 'PostController@create')->name('create_post');
        Route::get('/{id}', 'PostController@show')->name('show');
        Route::post('/{post}', 'PostController@updateViews');
        Route::post('/favorite/{id}', 'PostController@addFavorite');
    });

    Route::prefix('hubs')->group(static function () {
        Route::get('/', 'HubController@index')->name('hubs-list');
        Route::get('/{id}', 'HubController@show');
        Route::get('/{id}/top/week', 'HubController@show');
        Route::get('/{id}/top/month', 'HubController@show');
        Route::get('/{id}/all', 'HubController@show');
        Route::post('/follow/{id}', 'HubController@follow');
    });

    Route::get('search-result', 'SearchController@index')->name('search-result');
    Route::post('search-result', 'SearchController@index');

    Route::prefix('users')->group(static function () {
        Route::get('/', 'UserController@userList')->name('users-list');
        Route::post('{profileId}/follow', 'ProfileController@follow');

        Route::prefix('@{username}')->group(static function () {
            Route::get('/posts', 'UserController@showPosts')->name('user_posts');
            Route::get('', 'UserController@showInfo')->name('user_info');
            Route::get('/followers', 'UserController@showFollowers')->name('user_followers');
            Route::get('/followings', 'UserController@showFollowings')->name('user_followings');
        });
    });

    Route::prefix('comment')->group(static function () {
        Route::post('new-comment', 'CommentController@newComment')->name('new-comment');
        Route::post('/favorite/{id}', 'CommentController@favorite');
    });

    Route::resource('posts', 'PostController');

    Route::get('about_us', static function () {
        return view('pages.about_us');
    });
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('abilities/destroy', 'AbilitiesController@massDestroy')->name('abilities.massDestroy');
    Route::resource('abilities', 'AbilitiesController');
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});

// FUTURE
Route::post('upvote', 'PostController@vote');

Route::get('query', 'HomeController@indexTest');

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::get('test', 'Auth\NotificationController@test');
