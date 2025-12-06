<x-app-layout>

    <h1 class="text-2xl font-semibold mb-6">Tambah Agenda Kegiatan</h1>

    <form action="{{ route('agenda-kegiatan.store') }}" method="POST" class="space-y-5 max-w-3xl">
        @csrf

        {{-- Nama Kegiatan --}}
        <x-form-input label="Nama Kegiatan" name="nama_kegiatan" />

        {{-- Jenis Agenda --}}
        <x-form-select label="Jenis Agenda" name="jenis_agenda_id" :options="$jenisAgenda->pluck('nama_jenis', 'id')"
            placeholder="-- Pilih Jenis Agenda --" />

        {{-- Surat Masuk --}}
        <x-form-select label="Surat Masuk (Opsional)" name="surat_masuk_id"
            :options="$suratMasuk->pluck('nomor_surat_asal', 'id')" placeholder="-- Pilih Surat Masuk Terkait --" />

        {{-- Surat Keluar --}}
        <x-form-select label="Surat Keluar (Opsional)" name="surat_keluar_id"
            :options="$suratKeluar->pluck('nomor_surat', 'id')" placeholder="-- Pilih Surat Keluar Terkait --" />

        {{-- Waktu Mulai --}}
        <x-form-input label="Waktu Mulai" name="waktu_mulai" type="datetime-local" />

        {{-- Waktu Selesai --}}
        <x-form-input label="Waktu Selesai" name="waktu_selesai" type="datetime-local" />

        {{-- Tempat --}}
        <x-form-input label="Tempat" name="tempat" />

        {{-- Keterangan --}}
        <div>
            <label class="block text-sm font-medium mb-1">Keterangan (opsional)</label>
            <textarea name="keterangan" class="w-full border-gray-300 rounded-lg"
                rows="3">{{ old('keterangan') }}</textarea>
        </div>

        {{-- Status --}}
        <x-form-select label="Status" name="status" :options="[
        'terjadwal' => 'Terjadwal',
        'berlangsung' => 'Berlangsung',
        'selesai' => 'Selesai',
        'batal' => 'Batal'
    ]" placeholder="-- Pilih Status --" />

        {{-- BUTTON --}}
        <div class="flex gap-4 mt-6">
            <x-primary-button>Simpan</x-primary-button>

            <a href="{{ route('agenda-kegiatan.index') }}" class="px-4 py-2 text-gray-700 rounded-lg">
                Batal
            </a>
        </div>

    </form>

</x-app-layout>