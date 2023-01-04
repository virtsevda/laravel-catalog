<?php

namespace Virtsevda\LaravelCatalog\Test;

use PHPUnit\Framework\TestCase;
use Virtsevda\LaravelCatalog\Services\CategoriesService;

class CategoriesServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets_some_result()
    {
        $sut = new CategoriesService;
        $this->assertEquals('bar', $sut->getSomeResult());
    }
}