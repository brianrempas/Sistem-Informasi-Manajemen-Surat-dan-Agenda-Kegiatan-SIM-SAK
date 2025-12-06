<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Surat Keluar') }}
        </h2>
    </x-slot>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">

        {{-- Left: Search --}}
        <form method="GET" action="{{ route('surat-keluar.index') }}"
            class="flex flex-col sm:flex-row gap-3 flex-wrap w-full md:w-auto">

            <input name="search" placeholder="Cari nomor agenda atau perihal..." value="{{ request('search') }}"
                class="w-full sm:w-64 rounded-lg border-gray-300 px-3 py-2" />

            <select name="status" class="rounded-lg border-gray-300 px-3 py-2 sm:w-40">
                <option value="">Semua Status</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="ditandatangani" {{ request('status') == 'ditandatangani' ? 'selected' : '' }}>
                    Ditandatangani</option>
                <option value="dikirim" {{ request('status') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
            </select>

            <div class="flex gap-3 flex-wrap">
                <button type="submit" class="px-4 py-2 bg-gray-700 text-white rounded-lg">Cari</button>
                <a href="{{ route('surat-keluar.index') }}"
                    class="px-4 py-2 bg-gray-400 text-white rounded-lg">Reset</a>
            </div>
        </form>

        {{-- Right: Button --}}
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
            <a href="{{ route('surat-keluar.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                + Tambah Surat Keluar
            </a>
        @endif

    </div>


    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full min-w-[1000px] table-auto">
            <thead class="bg-gray-100 text-left text-sm text-gray-700">
                <tr>
                    <x-table-sortable-header label="Nomor Agenda" sortField="nomor_agenda" />
                    <x-table-sortable-header label="Nomor Surat" sortField="nomor_surat" />
                    <x-table-sortable-header label="Tanggal" sortField="tanggal_surat" />
                    <x-table-sortable-header label="Tujuan" sortField="tujuan_surat" />
                    <x-table-sortable-header label="Perihal" sortField="perihal" />
                    <x-table-sortable-header label="Kategori" sortField="kategori_id" />
                    <x-table-sortable-header label="Status" sortField="status" />
                    <th class="p-3">Isi Ringkas</th>
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
                        <th class="p-3">Lampiran</th>
                        <th class="p-3 w-24 text-center">Aksi</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $item)
                    <tr class="border-t">
                        <td class="p-3 break-words">{{ $item->nomor_agenda }}</td>
                        <td class="p-3 break-words">{{ $item->nomor_surat }}</td>
                        <td class="p-3">{{ $item->tanggal_surat }}</td>
                        <td class="p-3 break-words">{{ $item->tujuan_surat }}</td>
                        <td class="p-3 break-words">{{ $item->perihal }}</td>
                        <td class="p-3 break-words">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-xs bg-gray-100">{{ $item->status ?? 'draft' }}</span>
                        </td>
                        <td class="p-3 max-w-xs break-words">{{ Str::limit($item->isi_ringkas, 50) ?? '-' }}</td>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
                            <td class="p-3">
                                @if ($item->lampiran_file)
                                    <a href="{{ asset('storage/' . $item->lampiran_file) }}" target="_blank"
                                        class="text-indigo-600 underline">
                                        Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>

                            <td class="p-3 flex gap-2 justify-center">
                                <a href="{{ route('surat-keluar.edit', $item) }}" class="text-yellow-600">Edit</a>
                                <form action="{{ route('surat-keluar.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Hapus surat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center p-3 text-gray-400">Belum ada data surat keluar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $items->withQueryString()->links() }}
    </div>
</x-app-layout>