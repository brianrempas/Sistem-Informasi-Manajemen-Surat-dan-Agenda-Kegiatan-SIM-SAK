<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuratKeluarFactory extends Factory
{
    protected $model = \App\Models\SuratKeluar::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'nomor_agenda'  => 'SK-' . $faker->unique()->numberBetween(100, 999),
            'nomor_surat'   => $faker->numerify('###/DIS/2025'),
            'tanggal_surat' => $faker->date(),
            'tujuan_surat'  => $faker->company(),
            'perihal'       => $faker->sentence(3),
            'status'        => $faker->randomElement(['draft','ditandatangani','dikirim']),
            // Will be overridden in DatabaseSeeder
            'kategori_id'   => 1,
            'created_by'    => 1,
            'isi_ringkas'   => $faker->paragraph(),
            'lampiran_file' => null,
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
