<x-app-layout>
    <h1 class="text-xl font-semibold mb-6">Tambah Surat Keluar</h1>

    <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-2xl space-y-5">
        @csrf

        <div>
            <x-input-label value="Nomor Agenda (Otomatis)" />
            <input type="text" disabled value="Akan dibuat otomatis"
                class="mt-1 block w-full bg-gray-100 rounded-lg border-gray-300" />
        </div>

        {{-- Nomor Surat --}}
        <div>
            <x-input-label for="nomor_surat" value="Nomor Surat" />
            <x-text-input id="nomor_surat" name="nomor_surat" type="text" class="mt-1 block w-full"
                value="{{ old('nomor_surat') }}" required />
            @error('nomor_surat') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Tanggal --}}
        <div>
            <x-input-label for="tanggal_surat" value="Tanggal Surat" />
            <x-text-input id="tanggal_surat" name="tanggal_surat" type="date" class="mt-1 block w-full"
                value="{{ old('tanggal_surat') }}" required />
        </div>

        {{-- Tujuan --}}
        <div>
            <x-input-label for="tujuan_surat" value="Tujuan Surat" />
            <x-text-input id="tujuan_surat" name="tujuan_surat" type="text" class="mt-1 block w-full"
                value="{{ old('tujuan_surat') }}" required />
        </div>

        {{-- Perihal --}}
        <div>
            <x-input-label for="perihal" value="Perihal" />
            <x-text-input id="perihal" name="perihal" type="text" class="mt-1 block w-full" value="{{ old('perihal') }}"
                required />
        </div>

        {{-- Kategori --}}
        <div>
            <x-input-label for="kategori_id" value="Kategori Surat" />
            <select id="kategori_id" name="kategori_id" class="mt-1 block w-full rounded-lg border-gray-300">
                <option value="">-- Pilih Kategori --</option>

                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Isi Ringkas --}}
        <div>
            <x-input-label for="isi_ringkas" value="Isi Ringkas" />
            <textarea id="isi_ringkas" name="isi_ringkas"
                class="mt-1 w-full border-gray-300 rounded-lg">{{ old('isi_ringkas') }}</textarea>
        </div>

        {{-- File Lampiran --}}
        <div>
            <x-input-label for="lampiran_file" value="Lampiran (Opsional)" />
            <input id="lampiran_file" name="lampiran_file" type="file"
                class="mt-1 block w-full border-gray-300 rounded-lg" />
        </div>

        <div>
            <x-input-label for="status" value="Status" />
            <select id="status" name="status" class="mt-1 block w-full rounded-lg border-gray-300">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="ditandatangani" {{ old('status') == 'ditandatangani' ? 'selected' : '' }}>Ditanda tangani</option>
                <option value="dikirim" {{ old('status') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
            </select>
            @error('status') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Submit --}}
        <div class="flex gap-3 mt-4">
            <x-primary-button>Simpan</x-primary-button>
            <a href="{{ route('surat-keluar.index') }}" class="px-4 py-2 text-gray-700">Batal</a>
        </div>

    </form>
</x-app-layout>