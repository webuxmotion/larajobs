<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        $user = User::factory()->create([
            'name' => '$kaidan$',
            'email' => 'evilsmile@skaidans.com',
            'password' => bcrypt('evilsmile')
        ]);

        Listing::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}
