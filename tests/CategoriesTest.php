<?php

namespace Virtsevda\LaravelCatalog\Test;

use Virtsevda\LaravelCatalog\Models\Category;

class ItemsTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function it_gets_all_items()
    {
        Category::forceCreate(['name' => 'Name 1','slug'=>'name1']);
        Category::forceCreate(['name' => 'Name 2','slug'=>'name2']);

        $response = $this->get('categories');

        $response->assertStatus(200);

        $response->assertExactJson([
            'items' => [
                ['name' => 'Name 1'],
                ['name' => 'Name 2'],
            ]
        ]);
    }
}