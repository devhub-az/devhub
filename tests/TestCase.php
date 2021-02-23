<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use CreatesUsers;
    use HttpAssertions;

    protected function dispatch($job)
    {
        return $job->handle();
    }
}
