<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;
use Tests\CreatesUsers;
use Tests\HttpAssertions;

abstract class BrowserKitTestCase extends BaseTestCase
{
    use CreatesApplication;
    use CreatesUsers;
    use HttpAssertions;

    public $baseUrl = 'http://127.0.0.1:8090';

    protected function setUpTraits()
    {
        $uses = parent::setUpTraits();

        if (isset($uses[WithFaker::class])) {
            $this->setUpFaker();
        }

        return $uses;
    }

    protected function dispatch($job)
    {
        return $job->handle();
    }
}
