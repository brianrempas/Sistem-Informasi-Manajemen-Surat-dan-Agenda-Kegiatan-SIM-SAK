<x-app-layout>

    <h1 class="text-xl font-semibold mb-6">Tambah Kategori Surat</h1>

    <form method="POST" action="{{ route('kategori-surat.store') }}" class="max-w-xl space-y-4">
        @csrf

        {{-- Nama Kategori --}}
        <div>
            <x-input-label for="nama_kategori" value="Nama Kategori" />
            <x-text-input id="nama_kategori" name="nama_kategori" type="text"
                class="mt-1 block w-full"
                value="{{ old('nama_kategori') }}"
                required />
            @error('nama_kategori')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <x-input-label for="deskripsi" value="Deskripsi" />
            <textarea id="deskripsi" name="deskripsi"
                class="mt-1 w-full border-gray-300 rounded-lg">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="flex gap-3 mt-4">
            <x-primary-button>Simpan</x-primary-button>

            <a href="{{ route('kategori-surat.index') }}" class="px-4 py-2 text-gray-700">
                Batal
            </a>
        </div>
    </form>

</x-app-layout>
