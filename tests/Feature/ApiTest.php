<?php

use App\Models\User;
use function Tests\actingAs;

beforeEach(
    function () {
        $this->hey = 'artisan';
    }
);

it(
    'has home page',
    function ($url, $expected, $auth) {
        if ($auth) {
            $this->user = User::factory()->create();
            actingAs($this->user)->get($url)->assertStatus($expected);
        } else {
            $this->get($url)->assertStatus($expected);
        }
    }
)->with(
    [
        ['/', 200, false],
        ['/', 200, true],
    ]
);

it(
    'has articles page',
    function ($url, $expected, $auth) {
        if ($auth) {
            $this->user = User::factory()->create();
            actingAs($this->user, 'api')->get($url)->assertStatus($expected);
        } else {
            $this->get($url)->assertStatus($expected);
        }
    }
)->with(
    [
        ['/api/articles', 200, false],
        ['/api/articles', 200, true],
    ]
);

it(
    'has hubs page',
    function ($url, $expected, $auth) {
        if ($auth) {
            $this->user = User::factory()->create();
            actingAs($this->user, 'api')->get($url)->assertStatus($expected);
        } else {
            $this->get($url)->assertStatus($expected);
        }
    }
)->with(
    [
        ['/api/hubs?page=1&column=rating&order=desc&perPage=40', 200, false],
        ['/api/hubs?page=1&column=rating&order=desc&perPage=40', 200, true],
    ]
);

it(
    'has authors page',
    function ($url, $expected, $auth) {
        if ($auth) {
            $this->user = User::factory()->create();
            actingAs($this->user, 'api')->get($url)->assertStatus($expected);
        } else {
            $this->get($url)->assertStatus($expected);
        }
    }
)->with(
    [
        ['/api/authors', 200, false],
        ['/api/authors', 200, true],
    ]
);
