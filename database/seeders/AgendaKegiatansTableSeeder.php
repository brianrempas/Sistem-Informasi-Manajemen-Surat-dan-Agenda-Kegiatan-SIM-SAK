<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgendaKegiatansTableSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('agenda_kegiatans')->insert([
            [
                'nama_kegiatan'    => 'Rapat Penyusunan Program',
                'jenis_agenda_id'  => 1,
                'waktu_mulai'      => '2025-01-10 09:00:00',
                'waktu_selesai'    => '2025-01-10 11:00:00',
                'tempat'           => 'Ruang Rapat Utama',
                'keterangan'       => 'Rapat penyusunan program kerja tahun 2025',
                'status'           => 'terjadwal',
                'surat_masuk_id'   => 1,
                'surat_keluar_id'  => 1,
                'created_by'       => 1,
                'created_at'       => now(),
            ],
        ]);
    }
}
