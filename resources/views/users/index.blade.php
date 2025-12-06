<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">

        {{-- Left: Search + Filter --}}
        <form method="GET" action="{{ route('users.index') }}"
            class="flex flex-col sm:flex-row gap-3 flex-wrap w-full md:w-auto">

            <input name="search" placeholder="Cari nama atau email..." value="{{ request('search') }}"
                class="w-full sm:w-64 rounded-lg border-gray-300 px-3 py-2" />

            <select name="role" class="rounded-lg border-gray-300 px-3 py-2 sm:w-40">
                <option value="">Semua Role</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ request('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
            </select>

            <div class="flex gap-3 flex-wrap">
                <button type="submit" class="px-4 py-2 bg-gray-700 text-white rounded-lg">Filter</button>
                <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Reset</a>
            </div>
        </form>

        {{-- Right: Button --}}
        <a href="{{ route('users.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            + Tambah User
        </a>

    </div>


    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full min-w-[700px]">
            <thead class="bg-gray-100 text-left text-sm text-gray-700">
                <tr>
                    <x-table-sortable-header label="Name" sortField="name" />
                    <x-table-sortable-header label="Email" sortField="email" />
                    <x-table-sortable-header label="Role" sortField="role" />
                    <x-table-sortable-header label="Created At" sortField="created_at" />
                    <th class="p-3 w-20 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="border-t">
                        <td class="p-3 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="p-3 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="p-3 whitespace-nowrap">{{ $user->role ?? '-' }}</td>
                        <td class="p-3 whitespace-nowrap">{{ $user->created_at->format('d M Y H:i') }}</td>
                        <td class="p-3 flex gap-2 justify-center">
                            <a href="{{ route('users.edit', $user) }}" class="text-yellow-600">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $user) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')"
                                    class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-3 text-gray-400">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $users->withQueryString()->links() }}
    </div>
</x-app-layout>