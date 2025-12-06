<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuratKeluarsTableSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('surat_keluars')->insert([
            [
                'nomor_agenda'  => 'SK-001',
                'nomor_surat'   => '002/DIS/2025',
                'tanggal_surat' => '2025-01-05',
                'tujuan_surat'  => 'Camat Kota Barat',
                'perihal'       => 'Pemberitahuan Musyawarah',
                'status'        => 'draft',
                'kategori_id'   => 2,
                'isi_ringkas'   => 'Isi ringkas surat keluar.',
                'lampiran_file' => null,
                'created_by'    => 1,
                'created_at'    => now(),
            ],
        ]);
    }
}
