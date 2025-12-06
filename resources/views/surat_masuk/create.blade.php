<x-app-layout>

    <h1 class="text-2xl font-semibold mb-6">Tambah Surat Masuk</h1>

    <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 max-w-3xl">
        @csrf

        {{-- Nomor Agenda (AUTO GENERATED) --}}
        <div>
            <x-input-label value="Nomor Agenda (Otomatis)" />
            <input type="text" disabled
                value="Akan dibuat otomatis"
                class="mt-1 block w-full bg-gray-100 rounded-lg border-gray-300" />
        </div>

        {{-- Nomor Surat Asal --}}
        <div>
            <x-input-label for="nomor_surat_asal" value="Nomor Surat Asal" />
            <x-text-input id="nomor_surat_asal" class="mt-1 block w-full"
                name="nomor_surat_asal" value="{{ old('nomor_surat_asal') }}" required />
            @error('nomor_surat_asal') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Tanggal Surat --}}
        <div>
            <x-input-label for="tanggal_surat" value="Tanggal Surat" />
            <x-text-input id="tanggal_surat" type="date" class="mt-1 block w-full"
                name="tanggal_surat" value="{{ old('tanggal_surat') }}" required />
            @error('tanggal_surat') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Tanggal Diterima --}}
        <div>
            <x-input-label for="tanggal_diterima" value="Tanggal Diterima" />
            <x-text-input id="tanggal_diterima" type="date" class="mt-1 block w-full"
                name="tanggal_diterima" value="{{ old('tanggal_diterima') }}" required />
            @error('tanggal_diterima') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Asal Surat --}}
        <div>
            <x-input-label for="asal_surat" value="Asal Surat" />
            <x-text-input id="asal_surat" class="mt-1 block w-full"
                name="asal_surat" value="{{ old('asal_surat') }}" required />
            @error('asal_surat') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Perihal --}}
        <div>
            <x-input-label for="perihal" value="Perihal" />
            <x-text-input id="perihal" class="mt-1 block w-full"
                name="perihal" value="{{ old('perihal') }}" required />
            @error('perihal') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Kategori --}}
        <div>
            <x-input-label for="kategori_id" value="Kategori Surat" />
            <select id="kategori_id" name="kategori_id"
                class="mt-1 block w-full rounded-lg border-gray-300">
                <option value="">-- Pilih Kategori --</option>

                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Isi Ringkas --}}
        <div>
            <x-input-label for="isi_ringkas" value="Isi Ringkas" />
            <textarea id="isi_ringkas" name="isi_ringkas"
                class="mt-1 w-full rounded-lg border-gray-300">{{ old('isi_ringkas') }}</textarea>
        </div>

        {{-- Lampiran File --}}
        <div>
            <x-input-label for="lampiran_file" value="Lampiran File (Opsional)" />
            <input id="lampiran_file" type="file" name="lampiran_file"
                class="mt-1 block w-full border-gray-300 rounded-lg">
            <p class="text-sm text-gray-500 mt-1">Maksimal 4 MB</p>
            @error('lampiran_file') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Status Disposisi --}}
        <div>
            <x-input-label for="status_disposisi" value="Status Disposisi" />
            <select id="status_disposisi" name="status_disposisi"
                class="mt-1 block w-full rounded-lg border-gray-300">
                <option value="belum" {{ old('status_disposisi') == 'belum' ? 'selected' : '' }}>Belum</option>
                <option value="proses" {{ old('status_disposisi') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ old('status_disposisi') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status_disposisi') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- BUTTON --}}
        <div class="flex gap-4 mt-6">
            <x-primary-button>Simpan</x-primary-button>

            <a href="{{ route('surat-masuk.index') }}" class="px-4 py-2 text-gray-700 rounded-lg">
                Batal
            </a>
        </div>
    </form>

</x-app-layout>
