<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $tab = [
                1 => 'user',
                2 => 'jury',
            ];
    
            foreach ($tab as $key => $value) {
                Role::create([
                    'name' => $value
                    
                ]);
            }
        }
    }
}
