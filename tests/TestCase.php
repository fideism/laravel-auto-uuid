<?php

namespace Fideism\DatabaseUuid\Tests;

use Fideism\DatabaseUuid\DatabaseUuidServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            DatabaseUuidServiceProvider::class
        ];
    }
    
    public function testEvents()
    {
        $this->assertTrue(true);
    }
}
