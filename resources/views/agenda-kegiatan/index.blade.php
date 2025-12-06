<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda Kegiatan') }}
        </h2>
    </x-slot>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">

        {{-- Left: Search + Filter --}}
        <form method="GET" action="{{ route('agenda-kegiatan.index') }}"
            class="flex flex-col sm:flex-row gap-3 flex-wrap w-full md:w-auto">

            <input name="search" placeholder="Cari nama kegiatan..." value="{{ request('search') }}"
                class="w-full sm:w-64 rounded-lg border-gray-300 px-3 py-2" />

            <select name="status" class="rounded-lg border-gray-300 px-4 py-2 w-full sm:w-40">
                <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status</option>
                <option value="terjadwal" {{ request('status') == 'terjadwal' ? 'selected' : '' }}>Terjadwal</option>
                <option value="berlangsung" {{ request('status') == 'berlangsung' ? 'selected' : '' }}>Berlangsung
                </option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="batal" {{ request('status') == 'batal' ? 'selected' : '' }}>Batal</option>
            </select>

            <div class="flex gap-3 flex-wrap">
                <button type="submit" class="px-4 py-2 bg-gray-700 text-white rounded-lg">Filter</button>
                <a href="{{ route('agenda-kegiatan.index') }}"
                    class="px-4 py-2 bg-gray-400 text-white rounded-lg">Reset</a>
            </div>
        </form>

        {{-- Right: Button --}}
        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
        <a href="{{ route('agenda-kegiatan.create') }}"
            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            + Tambah Agenda
        </a>
        @endif

    </div>



    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full min-w-[900px] table-auto">
            <thead class="bg-gray-100 text-left text-sm text-gray-700">
                <tr>
                    <x-table-sortable-header label="Kegiatan" sortField="nama_kegiatan" />
                    <x-table-sortable-header label="Jenis Agenda" sortField="jenis_agenda_id" />
                    <x-table-sortable-header label="Waktu Mulai" sortField="waktu_mulai" />
                    <x-table-sortable-header label="Waktu Selesai" sortField="waktu_selesai" />
                    <th class="p-3">Surat Masuk</th>
                    <th class="p-3">Surat Keluar</th>
                    <th class="p-3">Dibuat Oleh</th>
                    <x-table-sortable-header label="Status" sortField="status" />
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
                    <th class="p-3 w-20 text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $agenda)
                    <tr class="border-t">
                        <td class="p-3 break-words">{{ $agenda->nama_kegiatan }}</td>
                        <td class="p-3 break-words">{{ $agenda->jenisAgenda->nama_jenis ?? '-' }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($agenda->waktu_mulai)->format('d M Y H:i') }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($agenda->waktu_selesai)->format('d M Y H:i') }}</td>
                        <td class="p-3">
                            @if($agenda->suratMasuk)
                                <div class="text-sm">
                                    <div class="font-semibold">{{ $agenda->suratMasuk->nomor_agenda }}</div>
                                    <div class="text-gray-600 text-xs">{{ $agenda->suratMasuk->perihal }}</div>
                                </div>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="p-3">
                            @if($agenda->suratKeluar)
                                <div class="text-sm">
                                    <div class="font-semibold">{{ $agenda->suratKeluar->nomor_agenda }}</div>
                                    <div class="text-gray-600 text-xs">{{ $agenda->suratKeluar->perihal }}</div>
                                </div>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="p-3">{{ $agenda->user->name ?? '-' }}</td>
                        <td class="p-3"><x-badge-status :status="$agenda->status" /></td>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
                        <td class="p-3 flex gap-2 justify-center">
                            <a href="{{ route('agenda-kegiatan.edit', $agenda) }}" class="text-yellow-600">Edit</a>
                            <form method="POST" action="{{ route('agenda-kegiatan.destroy', $agenda) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')"
                                    class="text-red-600">Hapus</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center p-3 text-gray-400">Tidak ada agenda ditemukan.</td>
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