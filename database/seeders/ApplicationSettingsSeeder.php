<?php

namespace Database\Seeders;

use App\Models\ApplicationSettings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ApplicationSettings::create([
            'name' => 'default front end layout',
            'data' => [
                'main_slider' => 1,
                'services' => 1,
                'about' => 1,
                'courses' => 1,
                'notices' => 1,
                'events' => 1,
                'testimonials' => 1,
                'blogs' => 1,
                'subscribes' => 1,
            ],
            'description' => 'app des',
            'parent' => 'layout',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
