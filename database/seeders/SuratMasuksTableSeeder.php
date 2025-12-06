<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuratMasuksTableSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('surat_masuks')->insert([
            [
                'nomor_agenda'     => 'SM-001',
                'nomor_surat_asal' => '001/ABC/2025',
                'tanggal_surat'    => '2025-01-02',
                'tanggal_diterima' => '2025-01-03',
                'asal_surat'       => 'Dinas Pendidikan',
                'perihal'          => 'Undangan Rapat Koordinasi',
                'kategori_id'      => 1,
                'isi_ringkas'      => 'Ringkasan isi surat masuk.',
                'lampiran_file'    => null,
                'status_disposisi' => 'belum',
                'created_by'       => 1,
                'created_at'       => now(),
            ],
        ]);
    }
}
