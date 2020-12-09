<?php

//Route::group(['namespace' => 'Api'], function () {
//    Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
//        Route::post('register', 'RegisterController');
//        Route::post('login', 'LoginController');
//        Route::post('/logout', 'Auth\LogoutController')->middleware('auth:api');
//        Route::get('me', 'TestController')->middleware('auth');

//        Route::post('logout', 'LogoutController')->middleware('auth:api');
//    });
//});
//Route::get('articles_filter/day', 'Api\ArticleTopController@posts');
//Route::get('articles_filter/week', 'Api\ArticleTopController@posts');
//Route::get('articles_filter/month', 'Api\ArticleTopController@posts');
////Route::middleware('auth')->get('articles_filter/favorite', 'Api\ArticleTopController@favorite');
//Route::apiResource('articles', 'Api\ArticleController');
//Route::apiResource('authors', 'Api\AuthorController');
//Route::apiResource('comments', 'Api\CommentController');
//Route::apiResource('hubs', 'Api\HubController');
//
//
//
//Route::get(
//    'articles/{article}/relationships/author',
//    [
//        'uses' => 'Api\ArticleRelationshipController' . '@author',
//        'as'   => 'articles.relationships.author',
//    ]
//);
//Route::get(
//    'articles/{article}/author',
//    [
//        'uses' => 'Api\ArticleRelationshipController' . '@author',
//        'as'   => 'articles.author',
//    ]
//);
//Route::get(
//    'articles/{article}/relationships/comments',
//    [
//        'uses' => 'Api\ArticleRelationshipController' . '@comments',
//        'as'   => 'articles.relationships.comments',
//    ]
//);
//Route::get(
//    'articles/{article}/comments',
//    [
//        'uses' => 'Api\ArticleRelationshipController' . '@comments',
//        'as'   => 'articles.comments',
//    ]
//);
//Route::get(
//    'articles/{article}/relationships/hubs',
//    [
//        'uses' => 'Api\ArticleRelationshipController' . '@hubs',
//        'as'   => 'articles.relationships.hubs',
//    ]
//);
//Route::get(
//    'articles/{article}/hubs',
//    [
//        'uses' => 'Api\ArticleRelationshipController' . '@hubs',
//        'as'   => 'articles.hubs',
//    ]
//);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@guard');
});
