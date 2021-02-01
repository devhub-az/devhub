<?php

use App\Models\Article;
use App\Models\User;
use function Tests\actingAs;

test(
    'users can view a article',
    function () {
        $this->user = User::factory()->create();
        $this->article = Article::factory()->create(
            [
                'author_id' => $this->user->id,
                'title'      => 'My first article',
                'body'   => '{"time": 99999999, "blocks": [{"data": {"text": "Body for my first article"}, "type": "paragraph"}], "version": "2.19.1"}',
            ]
        );

        $response = $this->get(route('article.show', $this->article->slug));

        $response->assertSuccessful();
        $response->assertSee('My first article');
        $this->article->forceDelete();
        $this->user->forceDelete();
    }
);

test(
    'guests cannot create a article',
    function () {
        $response = $this->get(route('article.create'));

        $response->assertRedirect(route('login'));
    }
);

test(
    'logged in users can view the create article page',
    function () {
        $user = User::factory()->create();

        $response = actingAs($user)->get(route('article.create'));

        $response->assertSuccessful();
        $response->assertSee('Paylaşma yazmag');
    }
);
