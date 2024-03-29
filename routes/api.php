<?php

use App\Http\Controllers\Api\ArticleAuthorController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ArticleHubController;
use App\Http\Controllers\Api\ArticleRelationshipController;
use App\Http\Controllers\Api\ArticleTopController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\VerificationController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\HubController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('user', [AuthController::class, 'details'])->middleware('auth:sanctum');
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('/password/email', [AuthController::class, 'sendPasswordResetLinkEmail'])->middleware('throttle:5,1')->name('password.email');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
});

Route::prefix('articles')->group(
    function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
        Route::post('/', [ArticleController::class, 'store'])->name('article.store')->middleware('auth:api');
        Route::post('/vote', [ArticleController::class, 'vote'])->middleware('auth:sanctum');
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
        Route::get('{article_json}/relationships/comments', [ArticleRelationshipController::class, 'comments'])
            ->name('articles.relationships.comments');
//        Route::get(
//            '{article_json}/comments',
//            ['uses' => 'Api\ArticleRelationshipController'.'@comments', 'as' => 'articles.comments']
//        );
        Route::get(
            '{article_json}/relationships/hubs',
            [ArticleRelationshipController::class, 'hubs']
        )->name(
            'articles.relationships.hubs'
        );
//        Route::get(
//            '{article_json}/hubs',
//            ['uses' => 'Api\ArticleRelationshipController'.'@hubs', 'as' => 'articles.hubs']
//        );

        /*
         * Comments Api.
         */
        Route::post('{article}/comment', [CommentController::class, 'store'])->middleware('auth:api');
    }
);


/*
 * Hubs Api
 */
Route::prefix('hubs')->group(
    function () {
        Route::get('/', [HubController::class, 'index'])->name('hubs.api.index');
        Route::get('top_rated', [HubController::class, 'topRated']);
        Route::get('top_followed', [HubController::class, 'topFollowed']);
        Route::post('/follow/{id}', [HubController::class, 'follow']);
        Route::get('/{slug}', [HubController::class, 'show']);
        Route::get('/filter/all', [HubController::class, 'all'])->name('hubs.api.all');
        Route::get('{hub}/top/day', [ArticleHubController::class, 'articles']);
        Route::get('{hub}/top/week', [ArticleHubController::class, 'articles']);
        Route::get('{hub}/top/month', [ArticleHubController::class, 'articles']);
        Route::get('{hub}/all', [ArticleHubController::class, 'all']);
    }
);
Route::get('/search_hub', [HubController::class, 'search_hub_by_key']);

/*
 * Author Api
 */

Route::prefix('authors')->group(
    function () {
        Route::get('/', [AuthorController::class, 'index'])->name('authors.all');
        Route::get('{id}/articles', [ArticleAuthorController::class, 'articles'])->name('authors.articles');
        Route::get('{author}', [AuthorController::class, 'show'])->name('authors.show');
        Route::post('{author}', [AuthorController::class, 'follow'])->name('author.follow')->middleware('auth:api');
        Route::get('{id}/all', [ArticleAuthorController::class, 'articles']);
        Route::get('{id}/follow_check', [AuthorController::class, 'userFollowCheck']);
        Route::get('{id}/follow_check', [AuthorController::class, 'userFollowCheck']);
//        Route::get('{id}/followings', [AuthorController::class, 'followings']);
//        Route::get('{id}/followers', [AuthorController::class, 'followers']);
    }
);
