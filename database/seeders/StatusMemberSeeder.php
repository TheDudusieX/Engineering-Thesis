<?php

namespace Database\Seeders;

use App\Models\StatusMember;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab = [
            1 => 'Zaakceptowany',
            2 => 'Oczekujący',
            3 => 'Odrzucony'
        ];

        foreach ($tab as $key => $value) {
            StatusMember::create([
                'name' => $value
            ]);
        }
    }
}
