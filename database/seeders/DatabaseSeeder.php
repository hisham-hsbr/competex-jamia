<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(DeveloperUserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(ApplicationSettingsSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(TimeZoneSeeder::class);
        $this->call(AddressSeeder::class);




        // end
        $this->call(TestDemoSeeder::class);
        $this->call(UpdateDataSeeder::class);
    }
}
