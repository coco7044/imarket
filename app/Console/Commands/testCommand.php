<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'python:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pythonテストファイルの実行';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = __DIR__.'\..\..\Python\test.py';
        $command = "python " . $path;
        exec('export LANG=ja_JP.UTF-8');
        exec($command,$output);
        dump($output);
    }
}
