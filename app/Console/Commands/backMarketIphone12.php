<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class backMarketIphone12 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backMarket:iphone {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'backMarketのスクレイピング';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
    }
}
