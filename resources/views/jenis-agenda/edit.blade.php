<x-app-layout>
    <h1 class="text-xl font-semibold mb-6">Edit Jenis Agenda</h1>

    <form method="POST" action="{{ route('jenis-agenda.update', $jenisAgenda) }}" class="max-w-xl space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama Jenis --}}
        <div>
            <x-input-label for="nama_jenis" value="Nama Jenis" />
            <x-text-input id="nama_jenis" name="nama_jenis" type="text"
                class="mt-1 block w-full"
                value="{{ old('nama_jenis', $jenisAgenda->nama_jenis) }}"
                required />

            @error('nama_jenis')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <x-input-label for="deskripsi" value="Deskripsi" />
            <textarea id="deskripsi" name="deskripsi"
                class="mt-1 w-full border-gray-300 rounded-lg">{{ old('deskripsi', $jenisAgenda->deskripsi) }}</textarea>
        </div>

        <div class="flex gap-3 mt-4">
            <x-primary-button>Update</x-primary-button>

            <a href="{{ route('jenis-agenda.index') }}" class="px-4 py-2 text-gray-700">
                Batal
            </a>
        </div>
    </form>
</x-app-layout>
