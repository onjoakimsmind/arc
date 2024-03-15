<?php

namespace Onjoakimsmind\Arc\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ArcCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arc:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs Arc CMS';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->warn('This will break your current instance of Laravel');
        if ($this->confirm('Do you wish to continue?')) {
            $this->info('Installing Arc CMS...');
            File::copyDirectory('./themes', base_path('themes'), 0755, true);
            File::move(base_path('vite.config.js'), base_path('vite.config.js.bak'));
            File::copy('./stubs/vite.config.js', base_path('vite.config.js'));
            $this->info('Publishing configuration...');
            /* $this->call('vendor:publish', [
                '--provider' => "Onjoakimsmind\Arc\Providers\ArcServiceProvider",
                '--tag' => "arc-config"
            ]);
            $this->info('Publishing migrations...');
            $this->call('vendor:publish', [
                '--provider' => "Onjoakimsmind\Arc\Providers\ArcServiceProvider",
                '--tag' => "arc-migrations"
            ]);
            $this->info('Migrating database...');
            $this->call('migrate'); */
        }

        $this->info('Arc installed successfully.');
    }
}
