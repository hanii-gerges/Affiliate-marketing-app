<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'John Doe',
          'email' => 'doejohn@gmail.com',
          'password' => Hash::make('12345678'),
          'phone_number' => '0799999999',
          'role' => 'admin',
          'affiliate_id' => Str::random(10),
        ]);
    }
}
