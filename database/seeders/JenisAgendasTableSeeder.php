<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisAgendasTableSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('jenis_agendas')->insert([
            [
                'nama_jenis' => 'Rapat',
                'deskripsi' => 'Kegiatan rapat internal dan eksternal',
                'created_at' => now(),
            ],
            [
                'nama_jenis' => 'Pelatihan',
                'deskripsi' => 'Kegiatan pelatihan untuk pegawai',
                'created_at' => now(),
            ],
            [
                'nama_jenis' => 'Kunjungan',
                'deskripsi' => 'Kunjungan kerja oleh pihak lain',
                'created_at' => now(),
            ],
        ]);
    }
}
