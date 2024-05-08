<?php

namespace Database\Seeders;

use App\Enums\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Arqueología de Tabasco', 'slug' => Str::slug('Arqueología de Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Artesanías', 'slug' => Str::slug('Artesanías'), 'status' => Status::ACTIVE],
            ['name' => 'Arte Tabasco', 'slug' => Str::slug('Arte Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Cacao Tabasco', 'slug' => Str::slug('Cacao Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Chamanismo', 'slug' => Str::slug('Chamanismo'), 'status' => Status::ACTIVE],
            ['name' => 'Danzas', 'slug' => Str::slug('Danzas'), 'status' => Status::ACTIVE],
            ['name' => 'Ecología', 'slug' => Str::slug('Ecología'), 'status' => Status::ACTIVE],
            ['name' => 'Ecoturismo en Tabasco', 'slug' => Str::slug('Ecoturismo en Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Gastronomía', 'slug' => Str::slug('Gastronomía'), 'status' => Status::ACTIVE],
            ['name' => 'Historia de Tabasco', 'slug' => Str::slug('Historia de Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Indígenas', 'slug' => Str::slug('Indígenas'), 'status' => Status::ACTIVE],
            ['name' => 'Jaguar Tabasco', 'slug' => Str::slug('Jaguar Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Museos de Tabasco', 'slug' => Str::slug('Museos de Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Música Tabasco', 'slug' => Str::slug('Música Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Olmecas', 'slug' => Str::slug('Olmecas'), 'status' => Status::ACTIVE],
            ['name' => 'Pantanos de Centla', 'slug' => Str::slug('Pantanos de Centla'), 'status' => Status::ACTIVE],
            ['name' => 'Sitio Arqueológico Comalcalco', 'slug' => Str::slug('Sitio Arqueológico Comalcalco'), 'status' => Status::ACTIVE],
            ['name' => 'Sitio Arqueológico Pomoná', 'slug' => Str::slug('Sitio Arqueológico Pomoná'), 'status' => Status::ACTIVE],
            ['name' => 'Teatro Tabasco', 'slug' => Str::slug('Teatro Tabasco'), 'status' => Status::ACTIVE],
            ['name' => 'Yumká', 'slug' => Str::slug('Yumká'), 'status' => Status::ACTIVE],
            ['name' => 'Zoques', 'slug' => Str::slug('Zoques'), 'status' => Status::ACTIVE],
        ]);
    }
}
