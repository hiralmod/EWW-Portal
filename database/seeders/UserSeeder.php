<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->where('role', '1')->first();

		if (empty($users)) {
			DB::table('users')->insert([
				'role' => '1',
				'name' => 'Super Admin',
				'email' => 'admin.eww@gmail.com',
				'password' => Hash::make('12345678'),
                'phone_number' => '1234567890',
			]);
		}
    }
}
