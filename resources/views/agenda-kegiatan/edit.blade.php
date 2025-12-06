<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">Edit Agenda Kegiatan</h1>

    <form action="{{ route('agenda-kegiatan.update', $agenda) }}" method="POST" class="bg-white shadow p-6 rounded-lg">
        @csrf
        @method('PUT')

        {{-- Nama Kegiatan --}}
        <x-form-input label="Nama Kegiatan" name="nama_kegiatan" :value="old('nama_kegiatan', $agenda->nama_kegiatan)" />

        {{-- Jenis Agenda --}}
        <x-form-select label="Jenis Agenda" name="jenis_agenda_id" :options="$jenisAgenda->pluck('nama_jenis', 'id')"
            :selected="old('jenis_agenda_id', $agenda->jenis_agenda_id)" />

        {{-- Surat Masuk (opsional) --}}
        <x-form-select label="Surat Masuk (opsional)" name="surat_masuk_id"
            :options="$suratMasuk->pluck('nomor_agenda', 'id')->toArray()" :selected="old('surat_masuk_id', $agenda->surat_masuk_id ?? '')" />

        {{-- Surat Keluar (opsional) --}}
        <x-form-select label="Surat Keluar (opsional)" name="surat_keluar_id"
            :options="$suratKeluar->pluck('nomor_surat', 'id')->toArray()" :selected="old('surat_keluar_id', $agenda->surat_keluar_id ?? '')" />

        {{-- Waktu Mulai --}}
        <x-form-input label="Waktu Mulai" name="waktu_mulai" type="datetime-local" :value="old('waktu_mulai', \Carbon\Carbon::parse($agenda->waktu_mulai)->format('Y-m-d\TH:i'))" />

        {{-- Waktu Selesai --}}
        <x-form-input label="Waktu Selesai" name="waktu_selesai" type="datetime-local" :value="old('waktu_selesai', \Carbon\Carbon::parse($agenda->waktu_selesai)->format('Y-m-d\TH:i'))" />

        {{-- Tempat --}}
        <x-form-input label="Tempat" name="tempat" :value="old('tempat', $agenda->tempat)" />

        {{-- Keterangan (nullable) --}}
        <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan (opsional)</label>
            <textarea name="keterangan" id="keterangan" class="w-full border-gray-300 rounded-lg"
                rows="3">{{ old('keterangan', $agenda->keterangan) }}</textarea>
        </div>

        {{-- Status --}}
        <x-form-select label="Status" name="status" :options="[
        'terjadwal' => 'Terjadwal',
        'berlangsung' => 'Berlangsung',
        'selesai' => 'Selesai',
        'batal' => 'Batal',
    ]" :selected="old('status', $agenda->status)" />

        <div class="flex flex-col sm:flex-row justify-end mt-4 gap-3">
            <a href="{{ route('agenda-kegiatan.index') }}"
                class="px-6 py-2 bg-gray-400 text-white rounded-lg text-center">Batal</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg">Update</button>
        </div>

    </form>
</x-app-layout>