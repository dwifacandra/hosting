<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Optimizer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:optimizer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize System';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting system optimization...');

        $this->call('cache:clear');
        $this->call('filament:clear-cached-components');
        $this->info('Application cache cleared.');

        $this->call('route:clear');
        $this->info('Route cache cleared.');

        $this->call('config:clear');
        $this->info('Configuration cache cleared.');

        $this->call('view:clear');
        $this->info('View cache cleared.');

        $this->call('config:cache');
        $this->info('Configuration cached.');

        $this->call('route:cache');
        $this->info('Route cached.');

        $this->call('view:cache');
        $this->info('Views cached.');

        $this->call('filament:optimize');
        $this->info('Panel cached.');

        $this->info('System optimization completed successfully.');
    }
}
