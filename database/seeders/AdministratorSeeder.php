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
            'name' => 'Juan Francisco',
            'last_name' => 'Salas Alba',
            'image' => 'photo.jpg',
            'gender'=> Gender::MALE->value,
            'status'=> Status::ACTIVE->value,
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
