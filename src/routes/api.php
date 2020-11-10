<?php


Route::middleware('api')->get('/user', function (Request $request) {
    return Auth::guard('api')->getUser();
});

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
//        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
//        Route::post('/logout', 'Auth\LogoutController')->middleware('auth:api');
        Route::get('me', 'TestController')->middleware('auth');

//        Route::post('logout', 'LogoutController')->middleware('auth:api');
    });
});
//Route::get('articles_filter/day', 'Api\ArticleTopController@posts');
//Route::get('articles_filter/week', 'Api\ArticleTopController@posts');
//Route::get('articles_filter/month', 'Api\ArticleTopController@posts');
//Route::middleware('auth')->get('articles_filter/favorite', 'Api\ArticleTopController@favorite');
//Route::apiResource('articles', 'Api\ArticleController');
//Route::apiResource('authors', 'Api\AuthorController');
//Route::apiResource('comments', 'Api\CommentController');
Route::apiResource('hubs', 'Api\HubController');

//Route::group(['prefix' => 'auth'], function () {
//
//    // public routes
//    Route::post('/login', 'Api\AuthController@login')->name('login.api');
//    Route::post('/register','Api\AuthController@register')->name('register.api');
//    Route::middleware(['auth:api'])->post('/logout', 'Api\AuthController@logout')->name('logout.api');
//
//});

Route::get(
    'articles/{article}/relationships/author',
    [
        'uses' => 'Api\ArticleRelationshipController' . '@author',
        'as'   => 'articles.relationships.author',
    ]
);
Route::get(
    'articles/{article}/author',
    [
        'uses' => 'Api\ArticleRelationshipController' . '@author',
        'as'   => 'articles.author',
    ]
);
Route::get(
    'articles/{article}/relationships/comments',
    [
        'uses' => 'Api\ArticleRelationshipController' . '@comments',
        'as'   => 'articles.relationships.comments',
    ]
);
Route::get(
    'articles/{article}/comments',
    [
        'uses' => 'Api\ArticleRelationshipController' . '@comments',
        'as'   => 'articles.comments',
    ]
);
Route::get(
    'articles/{article}/relationships/hubs',
    [
        'uses' => 'Api\ArticleRelationshipController' . '@hubs',
        'as'   => 'articles.relationships.hubs',
    ]
);
Route::get(
    'articles/{article}/hubs',
    [
        'uses' => 'Api\ArticleRelationshipController' . '@hubs',
        'as'   => 'articles.hubs',
    ]
);
