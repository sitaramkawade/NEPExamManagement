<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class allcls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'allcls';

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
        Artisan::call('view:clear');
        Artisan::call('schedule:clear-cache');
        Artisan::call('route:clear');
        Artisan::call('queue:clear');
        Artisan::call('optimize:clear');
        Artisan::call('event:clear');
        Artisan::call('debugbar:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('auth:clear-resets');
        Artisan::call('optimize');
        $this->info('Clearing Done ( * ^ * )');
    }
}
