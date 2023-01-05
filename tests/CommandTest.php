<?php

namespace Virtsevda\LaravelCatalog\Test;

class CommandTest extends FeatureTestCase
{
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('catalog.products_per_page', 200);
    }

    /**
     * @test
     */
    public function it_executes_example_command()
    {
        $output = $this->artisan('categories:import');

        $output->assertExitCode(0);

        $output->expectsOutput("Command executed with config param value 200");
    }
}