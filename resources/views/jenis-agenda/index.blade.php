<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jenis Agenda') }}
        </h2>
    </x-slot>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">

        {{-- Left: Search --}}
        <form method="GET" action="{{ route('jenis-agenda.index') }}"
            class="flex flex-col sm:flex-row gap-3 flex-wrap w-full md:w-auto">

            <input name="search" placeholder="Cari nama jenis..." value="{{ request('search') }}"
                class="w-full sm:w-64 rounded-lg border-gray-300 px-3 py-2" />

            <div class="flex gap-3 flex-wrap">
                <button type="submit" class="px-4 py-2 bg-gray-700 text-white rounded-lg">Cari</button>
                <a href="{{ route('jenis-agenda.index') }}"
                    class="px-4 py-2 bg-gray-400 text-white rounded-lg">Reset</a>
            </div>
        </form>

        {{-- Right: Button --}}
        <a href="{{ route('jenis-agenda.create') }}"
            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            + Tambah Jenis
        </a>

    </div>


    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full min-w-[600px] table-auto">
            <thead class="bg-gray-100 text-left text-sm text-gray-700">
                <tr>
                    <x-table-sortable-header label="Nama Jenis" sortField="nama_jenis" />
                    <x-table-sortable-header label="Deskripsi" sortField="deskripsi" />
                    <th class="p-3 w-24 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $jenis)
                    <tr class="border-t">
                        <td class="p-3 break-words">{{ $jenis->nama_jenis }}</td>
                        <td class="p-3 break-words text-gray-700">{{ $jenis->deskripsi ?? '-' }}</td>
                        <td class="p-3 flex gap-2 justify-center">
                            <a href="{{ route('jenis-agenda.edit', $jenis) }}" class="text-yellow-600">Edit</a>

                            <form action="{{ route('jenis-agenda.destroy', $jenis) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')"
                                    class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-3 text-gray-400">Belum ada data jenis agenda.</td>
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