<?php

use Illuminate\Support\Facades\Route;

Route::bind('email_address', function (string $emailAddress) {
    return App\User::findByEmailAddress($emailAddress);
});
Route::bind('reply', function (string $id) {
    return App\Models\Reply::findOrFail($id);
});
Route::bind('tag', function (string $slug) {
    return App\Models\Tag::findBySlug($slug);
});
Route::bind('thread', function (string $slug) {
    return App\Models\Thread::findBySlug($slug);
});
Route::bind('username', function (string $username) {
    return App\Models\User::findByUsername($username);
});
Route::bind('article', function (string $slug) {
    return App\Models\Article::findBySlug($slug);
});
Route::bind('series', function (string $slug) {
    return App\Models\Series::findBySlug($slug);
});
