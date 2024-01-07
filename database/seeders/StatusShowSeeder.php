<?php

namespace Database\Seeders;

use App\Models\StatusShow;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab = [
            1 => 'Zakończony',
            2 => 'Niezakończony'
        ];

        foreach ($tab as $key => $value) {
            StatusShow::create([
                'name' => $value
            ]);
        }
    }
}
