<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'apellido' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'username' => 'admin',
            'password' => Hash::make('admin2023'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
