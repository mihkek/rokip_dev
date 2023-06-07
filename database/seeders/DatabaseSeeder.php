<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateRoleSeeder::class);
        $this->call(CreateStatusSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(CreateTypeSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     '_email' => 'test@example.com',
        // ]);
    }
}
