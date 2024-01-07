<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab = [
            1 => 'Aktywny',
            2 => 'Anulowany',
            3 => 'Zakończony'
        ];

        foreach ($tab as $key => $value) {
            Status::create([
                'name' => $value
            ]);
        }
    }
}