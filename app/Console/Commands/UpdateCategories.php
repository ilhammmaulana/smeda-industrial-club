<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\CategoryController;
use App\Jobs\CategoriesJobs;
use Illuminate\Console\Command;

class UpdateCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $controller = new CategoryController();
        // $this->info('Payment methods updated successfully.');
    }
}
