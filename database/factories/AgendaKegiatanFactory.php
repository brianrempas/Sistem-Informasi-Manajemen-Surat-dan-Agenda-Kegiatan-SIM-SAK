<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaKegiatanFactory extends Factory
{
    protected $model = \App\Models\AgendaKegiatan::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        $start = $faker->dateTimeBetween('+1 days', '+30 days');
        $end = (clone $start)->modify('+2 hours');

        return [
            'nama_kegiatan'    => $faker->sentence(3),
            // Will be overridden in DatabaseSeeder
            'jenis_agenda_id'  => 1,
            'waktu_mulai'      => $start,
            'waktu_selesai'    => $end,
            'tempat'           => $faker->address(),
            'keterangan'       => $faker->paragraph(),
            'status'           => $faker->randomElement(['terjadwal','berlangsung','selesai','batal']),
            'surat_masuk_id'   => 1,
            'surat_keluar_id'  => 1,
            'created_by'       => 1,
            'created_at'       => now(),
            'updated_at'       => now(),
        ];
    }
}
