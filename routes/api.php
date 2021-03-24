<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ArticleAuthorController;
use App\Http\Controllers\Api\ArticleHubController;
use App\Http\Controllers\Api\ArticleRelationshipController;
use App\Http\Controllers\Api\ArticleTopController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\HubController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('auth/checkEmail', [LoginController::class, 'checkEmail']);

Route::prefix('articles')->group(
    function () {
        Route::get('/', [ArticleController::class, 'index'])->middleware('api')->name('articles.index');
        Route::post('/', [ArticleController::class, 'store'])->name('article.store')->middleware('auth:api');
        Route::post('/vote', [ArticleController::class, 'vote'])->middleware('auth:api');
        Route::get('/{article_json}', [ArticleController::class, 'show'])->middleware('api')->name('articles.show');
        Route::prefix('filter')->group(
            function () {
                Route::get('day', [ArticleTopController::class, 'articles']);
                Route::get('week', [ArticleTopController::class, 'articles']);
                Route::get('month', [ArticleTopController::class, 'articles']);
                Route::get('favorite', [ArticleTopController::class, 'favorite'])->middleware('auth:api');
            }
        );

//        Route::get(
//            '{article_json}/relationships/author',
//            ['uses' => 'Api\ArticleRelationshipController'.'@author', 'as' => 'articles.relationships.author']
//        );
//        Route::get(
//            '{article_json}/author',
//            ['uses' => 'Api\ArticleRelationshipController'.'@author', 'as' => 'articles.author']
//        );
//        Route::get('{article_json}/relationships/comments', [ArticleRelationshipController::class, 'comments'])
//            ->name('articles.relationships.comments');
//        Route::get(
//            '{article_json}/comments',
//            ['uses' => 'Api\ArticleRelationshipController'.'@comments', 'as' => 'articles.comments']
//        );
        Route::get(
            '{article_json}/relationships/hubs', [ArticleRelationshipController::class, 'hubs'])->name(
           'articles.relationships.hubs'
        );
//        Route::get(
//            '{article_json}/hubs',
//            ['uses' => 'Api\ArticleRelationshipController'.'@hubs', 'as' => 'articles.hubs']
//        );

        /**
         * Comments Api.
         */
        Route::post('{article}/comment', [CommentController::class, 'store'])->middleware('auth:api');
    }
);

/*
 * Favorite Api
 */
//Route::prefix('saved')->group(
//    function () {
//        Route::get('articles', [SavedController::class, 'allPosts']);
//        Route::get('comments', [SavedController::class, 'allComments']);
//    }
//);

/*
 * Hubs Api
 */
Route::prefix('hubs')->group(
    function () {
        Route::get('/', [HubController::class, 'index'])->middleware('api')->name('hubs.api.index');
        Route::get('/{hub}', [HubController::class, 'show'])->middleware('api')->name('hubs.api.show');
        Route::get('/filter/all', [HubController::class, 'all'])->middleware('api')->name('hubs.api.all');
        Route::get('{hub}/top/day', [ArticleHubController::class, 'articles']);
        Route::get('{hub}/top/week', [ArticleHubController::class, 'articles']);
        Route::get('{hub}/top/month', [ArticleHubController::class, 'articles']);
        Route::get('{hub}/all', [ArticleHubController::class, 'all']);
        Route::post('/follow/{id}', [HubController::class, 'follow']);
    }
);
Route::get('/search_hub', [HubController::class, 'search_hub_by_key']);

/*
 * Author Api
 */

Route::prefix('authors')->group(
    function () {
        Route::get('/', [AuthorController::class, 'index'])->name('authors.all');
        Route::get('{author}', [AuthorController::class, 'show'])->name('authors.show');
        Route::post('{author}', [AuthorController::class, 'follow'])->name('author.follow')->middleware('auth:api');
        Route::get('{id}/all', [ArticleAuthorController::class, 'articles']);
        Route::get('{id}/follow_check', [AuthorController::class, 'userFollowCheck']);
        Route::get('{id}/follow_check', [AuthorController::class, 'userFollowCheck']);
        Route::get('{id}/followings', [AuthorController::class, 'followings']);
        Route::get('{id}/followers', [AuthorController::class, 'followers']);
    }
);
Route::get('/search_user', [AuthorController::class, 'search_user_by_key']);

/*
 * Profile Api
 */
//    Route::get('/users/{id}/articles', [UserController::class, 'articles']);
//    Route::post('/users/{id}/profile_update', [UserController::class, 'upload']);

/**
 * Search Api.
 */
Route::get('search{search?}', [SearchController::class, 'results']);
