<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriSuratsTableSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('kategori_surats')->insert([
            [
                'nama_kategori' => 'Undangan',
                'deskripsi' => 'Surat undangan resmi',
                'created_at' => now(),
            ],
            [
                'nama_kategori' => 'Pemberitahuan',
                'deskripsi' => 'Surat pemberitahuan kegiatan',
                'created_at' => now(),
            ],
            [
                'nama_kategori' => 'Rahasia',
                'deskripsi' => 'Surat bersifat rahasia',
                'created_at' => now(),
            ],
        ]);
    }
}
