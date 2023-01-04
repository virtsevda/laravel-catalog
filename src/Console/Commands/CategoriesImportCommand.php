<?php

namespace Virtsevda\LaravelCatalog\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class CategoriesImportCommand extends Command
{
    protected $signature = 'categories:import';

    protected $description = 'Categories Import';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info("Command executed with config param value " . Config::get('catalog.products_per_page'));

        return 0;
    }
}