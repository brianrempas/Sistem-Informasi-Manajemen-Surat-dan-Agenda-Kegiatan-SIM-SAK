<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriSuratFactory extends Factory
{
    protected $model = \App\Models\KategoriSurat::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'nama_kategori' => $faker->unique()->word(),
            'deskripsi' => $faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
