<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RatingSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\StatusShowSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StatusSeeder::class,
            StatusMemberSeeder::class,
            StatusShowSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            RatingSeeder::class,
        ]);
    }
}
