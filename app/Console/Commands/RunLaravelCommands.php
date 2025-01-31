<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunLaravelCommands extends Command
{
    protected $signature = 'run:laravel-commands';
    protected $description = 'Run common Laravel commands';

    public function handle()
    {
        $this->info('Running config:clear');
        \Artisan::call('config:clear');
        
        $this->info('Running cache:clear');
        \Artisan::call('cache:clear');
        
        $this->info('Running optimize');
        \Artisan::call('optimize');

        $this->info('Commands executed successfully!');
    }
}