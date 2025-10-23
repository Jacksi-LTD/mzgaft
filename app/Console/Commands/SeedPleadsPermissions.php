<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\PleadsPermissionsSeeder;

class SeedPleadsPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pleads:seed-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed pleads permissions to the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Seeding pleads permissions...');
        
        $seeder = new PleadsPermissionsSeeder();
        $seeder->run();
        
        $this->info('Pleads permissions seeded successfully!');
        
        return Command::SUCCESS;
    }
}