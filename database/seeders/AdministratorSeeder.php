<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Enums\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administrators')->insert([
            [
                'name' => 'SuperAdministrador',
                'last_name' => 'superadmin',
                'image' => 'avatar-5.png',
                'gender' => Gender::MALE->value,
                'status' => Status::ACTIVE->value,
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('12345'),
            ],
            [
                'name' => 'Administrador',
                'last_name' => 'admin',
                'image' => 'avatar-5.png',
                'gender' => Gender::MALE->value,
                'status' => Status::ACTIVE->value,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345'),
            ],
            [
                'name' => 'Journalist',
                'last_name' => 'journalist',
                'image' => 'avatar-5.png',
                'gender' => Gender::MALE->value,
                'status' => Status::ACTIVE->value,
                'email' => 'journalist@gmail.com',
                'password' => Hash::make('12345'),
            ],
        ]);
    }
}
