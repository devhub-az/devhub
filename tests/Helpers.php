<?php

namespace Tests;

use Illuminate\Contracts\Auth\Authenticatable;

function actingAs(Authenticatable $user, string $driver = null): TestCase
{
    return test()->actingAs($user, $driver);
}
