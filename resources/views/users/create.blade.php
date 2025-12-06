<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">Tambah User</h1>

    <form action="{{ route('users.store') }}" method="POST" class="bg-white shadow p-6 rounded-lg">
        @csrf

        {{-- Name --}}
        <x-form-input 
            label="Nama" 
            name="name" 
            placeholder="Masukkan nama lengkap"
        />

        {{-- Email --}}
        <x-form-input 
            label="Email" 
            name="email" 
            type="email"
            placeholder="Masukkan email pengguna"
        />

        {{-- Password --}}
        <x-form-input 
            label="Password" 
            name="password" 
            type="password"
            placeholder="Masukkan password"
        />

        {{-- Password Confirmation --}}
        <x-form-input 
            label="Konfirmasi Password" 
            name="password_confirmation" 
            type="password"
            placeholder="Masukkan ulang password"
        />

        {{-- Role --}}
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Role</label>
            <select name="role" required class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Pilih role...</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="user">User</option>
            </select>
        </div>

        <div class="flex justify-end mt-6">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Simpan
            </button>
        </div>
    </form>
</x-app-layout>
