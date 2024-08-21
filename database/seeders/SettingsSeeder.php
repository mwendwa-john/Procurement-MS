<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Valuestore\Valuestore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Global Settings
        // $valuestore = Valuestore::make($pathToFile);
        $valuestore = Valuestore::make(config_path('global_settings.json'));

        $valuestore->put('pagination', '15');

        
        //System Settings
        $valuestore = Valuestore::make(config_path('system_settings.json'));

        $valuestore->put('vat_rate', '16');
    }
}
