<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuratMasukFactory extends Factory
{
    protected $model = \App\Models\SuratMasuk::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'nomor_agenda'     => 'SM-' . $faker->unique()->numberBetween(100, 999),
            'nomor_surat_asal' => $faker->numerify('###/ABC/2025'),
            'tanggal_surat'    => $faker->date(),
            'tanggal_diterima' => $faker->date(),
            'asal_surat'       => $faker->company(),
            'perihal'          => $faker->sentence(3),
            'isi_ringkas'      => $faker->paragraph(),
            'lampiran_file'    => null,
            'status_disposisi' => $faker->randomElement(['belum','proses','selesai']),
            // Will be overridden in DatabaseSeeder
            'kategori_id'      => 1,
            'created_by'       => 1,
            'created_at'       => now(),
            'updated_at'       => now(),
        ];
    }
}
