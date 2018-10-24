<?php

namespace Fideism\DatabaseLog\Tests;

use Fideism\DatabaseUuid\DatabaseUuidServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            DatabaseUuidServiceProvider::class
        ];
    }
}