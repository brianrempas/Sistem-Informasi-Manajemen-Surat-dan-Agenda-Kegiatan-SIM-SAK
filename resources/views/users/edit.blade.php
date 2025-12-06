<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white shadow p-6 rounded-lg">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <x-form-input label="Nama" name="name" value="{{ $user->name }}" placeholder="Masukkan nama lengkap" />

        {{-- Email --}}
        <x-form-input label="Email" name="email" type="email" value="{{ $user->email }}"
            placeholder="Masukkan email pengguna" />

        {{-- Password (Opsional) --}}
        <x-form-input label="Password Baru (Opsional)" name="password" type="password"
            placeholder="Kosongkan jika tidak diganti" />

        {{-- Password Confirmation --}}
        <x-form-input label="Konfirmasi Password Baru" name="password_confirmation" type="password"
            placeholder="Masukkan ulang password baru" />

        {{-- Role --}}
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Role</label>
            <select required name="role"
                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Pilih role...</option>
                <option value="admin" @selected($user->role == 'admin')>Admin</option>
                <option value="staff" @selected($user->role == 'staff')>Staff</option>
                <option value="user" @selected($user->role == 'user')>User</option>
            </select>
        </div>

        <div class="flex justify-end mt-6">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Update
            </button>
        </div>
    </form>
</x-app-layout>