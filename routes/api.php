<?php

//Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
//    Route::post('login', 'Api\AuthController@login');
//    Route::post('logout', 'Api\AuthController@logout');
//    Route::post('refresh', 'Api\AuthController@refresh');
//    Route::post('me', 'Api\AuthController@guard');
//});

//    Route::post('post/image/cache', 'Api\PostController@upload_image');
//Route::middleware('auth')->get('articles_filter/favorite', 'Api\ArticleTopController@favorite');

Route::apiResource('articles', 'Api\ArticleController')->middleware('api');

Route::prefix('articles')->group(function () {
    Route::prefix('filter')->group(function () {
        Route::get('day', 'Api\ArticleTopController@posts');
        Route::get('week', 'Api\ArticleTopController@posts');
        Route::get('month', 'Api\ArticleTopController@posts');
        Route::get('favorite', 'Api\ArticleTopController@favorite')->middleware('auth:api');
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
    Route::post('/follow/{id}', 'Api\HubController@follow');
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
