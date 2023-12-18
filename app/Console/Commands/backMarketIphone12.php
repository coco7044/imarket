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
    protected $signature = 'backMarket:iphone {model}';

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
        $model = $this->argument('model');
            $path = __DIR__.'\..\..\Python\BackMarket\\'.$model.'.py';
            $command = "python " . $path;
            exec('export LANG=ja_JP.UTF-8');
            exec($command,$output);
            return $output;
    }
}
