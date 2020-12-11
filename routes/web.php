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

//Auth routes
Route::group(['middleware' => ['auth']], static function () {
    Route::get('/favorite', 'HomeController@postsApiRoute')->name('favorite');
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

Route::prefix('api')->group(function () {
//    Route::post('post/image/cache', 'Api\PostController@upload_image');
    //Route::middleware('auth')->get('articles_filter/favorite', 'Api\ArticleTopController@favorite');
    Route::post('auth/login', 'Api\AuthController@login');

    //Article Api
    Route::apiResource('articles', 'Api\ArticleController');
    Route::prefix('articles')->group(function () {
        Route::prefix('filter')->group(function () {
            Route::get('day', 'Api\ArticleTopController@posts');
            Route::get('week', 'Api\ArticleTopController@posts');
            Route::get('month', 'Api\ArticleTopController@posts');
        });

        Route::get(
            '{article}/relationships/author',
            ['uses' => 'Api\ArticleRelationshipController'.'@author', 'as' => 'articles.relationships.author']
        );
        Route::get(
            '{article}/author',
            ['uses' => 'Api\ArticleRelationshipController'.'@author', 'as' => 'articles.author']
        );
        Route::get(
            '{article}/relationships/comments',
            ['uses' => 'Api\ArticleRelationshipController'.'@comments', 'as' => 'articles.relationships.comments']
        );
        Route::get(
            '{article}/comments',
            ['uses' => 'Api\ArticleRelationshipController'.'@comments', 'as' => 'articles.comments']
        );
        Route::get(
            '{article}/relationships/hubs',
            ['uses' => 'Api\ArticleRelationshipController'.'@hubs', 'as' => 'articles.relationships.hubs']
        );
        Route::get(
            '{article}/hubs',
            ['uses' => 'Api\ArticleRelationshipController'.'@hubs', 'as' => 'articles.hubs']
        );
    });

    /**
     * Comments Api.
     */
    Route::apiResource('comments', 'Api\CommentController');

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
    Route::apiResource('hubs', 'Api\HubController');
    Route::prefix('hubs')->group(function () {
        Route::get('{id}/top/day', 'Api\PostHubController@posts');
        Route::get('{id}/top/week', 'Api\PostHubController@posts');
        Route::get('{id}/top/month', 'Api\PostHubController@posts');
        Route::get('{id}/all', 'Api\PostHubController@all');
    });
    Route::get('/search_hub', 'Api\HubController@search_hub_by_key');

    /*
     * Author Api
     */

    Route::apiResource('/authors', 'Api\AuthorController');
    Route::prefix('authors')->group(function () {
        Route::get('{id}/follow_check', 'Api\AuthorController@userFollowCheck');
        Route::get('{id}/followings', 'Api\AuthorController@followings');
        Route::get('{id}/followers', 'Api\AuthorController@followers');
    });
    Route::get('/search_user', 'Api\AuthorController@search_user_by_key');

    /*
     * Profile Api
     */
//    Route::get('/users/{id}/posts', 'Api\UserController@posts');
//    Route::post('/users/{id}/profile_update', 'Api\UserController@upload');

    /**
     * Search Api.
     */
    Route::get('search{search?}', 'Api\SearchController@results');
});

Route::group([], static function () {
    // Articles view
    Route::prefix('article')->group(static function () {
        Route::get('/new', 'ArticleController@create')->name('create_article');
        Route::post('/create-new-post', 'ArticleController@store');
        Route::get('/{slug}', 'ArticleController@show')->name('show_article');
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
        Route::post('/follow/{id}', 'HubController@follow');
    });

    //Search view
    Route::get('search-result', 'SearchController@index')->name('search-result');
    Route::post('search-result', 'SearchController@index');

    //Users view
    Route::prefix('authors')->group(static function () {
        Route::get('/', 'AuthorController@userList')->name('users-list');
        Route::post('{profileId}/follow', 'ProfileController@follow');

        Route::prefix('@{username}')->group(static function () {
            Route::get('/posts', 'AuthorController@showPosts')->name('user_posts');
            Route::get('', 'AuthorController@showInfo')->name('user_info');
            Route::get('/followers', 'AuthorController@showFollowers')->name('user_followers');
            Route::get('/followings', 'AuthorController@showFollowings')->name('user_followings');
        });
    });

    //Comments view
    Route::prefix('comment')->group(static function () {
        Route::post('new-comment', 'Api\CommentController@newComment')->name('new-comment');
        Route::post('/favorite/{id}', 'Api\CommentController@favorite');
    });

    //About view
    Route::view('about_us', 'pages.about_us');
});

//Admin routes
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
//Route::post('upvote', 'PostController@vote');

Route::get('query', 'HomeController@indexTest');

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
