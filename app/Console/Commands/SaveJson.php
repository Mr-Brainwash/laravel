<?php

namespace App\Console\Commands;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SaveJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(News $news, Categories $categories)
    {
        File::put(storage_path() . '/news.json', json_encode($news->getNews(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        File::put(storage_path() . '/categories.json', json_encode($categories->getCategories(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        return Command::SUCCESS;
    }
}
