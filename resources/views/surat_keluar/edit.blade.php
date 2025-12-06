<x-app-layout>
    <h1 class="text-xl font-semibold mb-6">Edit Surat Keluar</h1>

    <form action="{{ route('surat-keluar.update', $suratKeluar) }}" method="POST" enctype="multipart/form-data"
        class="max-w-2xl space-y-5">
        @csrf
        @method('PUT')

        <div>
            <x-input-label value="Nomor Agenda" />
            <input type="text" disabled value="{{ $suratKeluar->nomor_agenda }}"
                class="mt-1 block w-full bg-gray-100 rounded-lg border-gray-300" />
        </div>

        {{-- Nomor --}}
        <div>
            <x-input-label for="nomor_surat" value="Nomor Surat" />
            <x-text-input id="nomor_surat" name="nomor_surat" type="text" class="mt-1 block w-full"
                value="{{ old('nomor_surat', $suratKeluar->nomor_surat) }}" required />
        </div>

        {{-- Tanggal --}}
        <div>
            <x-input-label for="tanggal_surat" value="Tanggal Surat" />
            <x-text-input id="tanggal_surat" name="tanggal_surat" type="date" class="mt-1 block w-full"
                value="{{ old('tanggal_surat', $suratKeluar->tanggal_surat) }}" required />
        </div>

        {{-- Tujuan --}}
        <div>
            <x-input-label for="tujuan_surat" value="Tujuan Surat" />
            <x-text-input id="tujuan_surat" name="tujuan_surat" type="text" class="mt-1 block w-full"
                value="{{ old('tujuan_surat', $suratKeluar->tujuan_surat) }}" required />
        </div>

        {{-- Perihal --}}
        <div>
            <x-input-label for="perihal" value="Perihal" />
            <x-text-input id="perihal" name="perihal" type="text" class="mt-1 block w-full"
                value="{{ old('perihal', $suratKeluar->perihal) }}" required />
        </div>

        {{-- Kategori --}}
        <div>
            <x-input-label for="kategori_id" value="Kategori Surat" />
            <select id="kategori_id" name="kategori_id" class="mt-1 block w-full rounded-lg border-gray-300">
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $suratKeluar->kategori_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Isi Ringkas --}}
        <div>
            <x-input-label for="isi_ringkas" value="Isi Ringkas" />
            <textarea id="isi_ringkas" name="isi_ringkas"
                class="mt-1 w-full border-gray-300 rounded-lg">{{ old('isi_ringkas', $suratKeluar->isi_ringkas) }}</textarea>
        </div>

        {{-- File --}}
        <div>
            <x-input-label value="Lampiran (Opsional)" />
            <input type="file" name="lampiran_file" class="mt-1 border-gray-300 rounded-lg">

            @if ($suratKeluar->lampiran_file)
                <p class="text-sm text-gray-600 mt-1">
                    File saat ini:
                    <a href="{{ asset('storage/' . $suratKeluar->lampiran_file) }}" target="_blank"
                        class="text-blue-600 underline">
                        Lihat Lampiran
                    </a>
                </p>
            @endif
        </div>

        <div>
            <x-input-label for="status" value="Status" />
            <select id="status" name="status" class="mt-1 block w-full rounded-lg border-gray-300">
                <option value="draft" {{ old('status', $suratKeluar->status) == 'draft' ? 'selected' : '' }}>Draft
                </option>
                <option value="ditandatangani" {{ old('status', $suratKeluar->status) == 'ditandatangani' ? 'selected' : '' }}>Ditanda tangani</option>
                <option value="dikirim" {{ old('status', $suratKeluar->status) == 'dikirim' ? 'selected' : '' }}>Dikirim
                </option>
            </select>
            @error('status_disposisi') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Submit --}}
        <div class="flex gap-3">
            <x-primary-button>Update</x-primary-button>
            <a href="{{ route('surat-keluar.index') }}" class="px-4 py-2 text-gray-700">Batal</a>
        </div>
    </form>
</x-app-layout>