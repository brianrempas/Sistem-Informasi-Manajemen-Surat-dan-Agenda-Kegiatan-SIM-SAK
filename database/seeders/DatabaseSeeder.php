<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            /*
            JenisAgendasTableSeeder::class,
            KategoriSuratsTableSeeder::class,
            SuratMasuksTableSeeder::class,
            SuratKeluarsTableSeeder::class,
            AgendaKegiatansTableSeeder::class,
            */
        ]);

        $users = \App\Models\User::all();

        // Seed parent tables first
        $jenisAgendas = \App\Models\JenisAgenda::factory(5)->create();
        $kategoriSurats = \App\Models\KategoriSurat::factory(5)->create();
        $users = \App\Models\User::factory(10)->create();

        // Seed children with valid FK references
        \App\Models\SuratMasuk::factory(50)->create([
            'kategori_id' => function () use ($kategoriSurats) {
                return $kategoriSurats->random()->id;
            },
            'created_by' => function () use ($users) {
                return $users->random()->id;
            },
        ]);

        \App\Models\SuratKeluar::factory(50)->create([
            'kategori_id' => function () use ($kategoriSurats) {
                return $kategoriSurats->random()->id;
            },
            'created_by' => function () use ($users) {
                return $users->random()->id;
            },
        ]);

        \App\Models\AgendaKegiatan::factory(100)->create([
            'jenis_agenda_id' => function () use ($jenisAgendas) {
                return $jenisAgendas->random()->id;
            },
            'surat_masuk_id' => function () {
                return \App\Models\SuratMasuk::inRandomOrder()->first()->id;
            },
            'surat_keluar_id' => function () {
                return \App\Models\SuratKeluar::inRandomOrder()->first()->id;
            },
            'created_by' => function () use ($users) {
                return $users->random()->id;
            },
        ]);
    }
}
