<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab = [
            1 => 'Dobór repertuaru',
            2 => 'Brzmienie orkiestry i intonacja',
            3 => 'Interpretacja utworów',
            4 => 'Rytm i artykulacja',
            5 => 'Ogólne wrażenie artystyczne',
        ];

        foreach ($tab as $key => $value) {
            Category::create([
                'name' => $value
            ]);
        }
    }
}
