<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JenisAgendaFactory extends Factory
{
    protected $model = \App\Models\JenisAgenda::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'nama_jenis' => $faker->unique()->word(),
            'deskripsi' => $faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
