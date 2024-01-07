<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'surname' => 'testowy',
            'phone' => '123456789',
            'email' => 'admin.testowy@localhost',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}