<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                        <a href="{{ route('agenda-kegiatan.index') }}"
                            class="block px-6 py-4 bg-indigo-600 text-white rounded-lg text-center font-semibold hover:bg-indigo-700">
                            Agenda Kegiatan
                        </a>
                        <a href="{{ route('surat-masuk.index') }}"
                            class="block px-6 py-4 bg-green-600 text-white rounded-lg text-center font-semibold hover:bg-green-700">
                            Surat Masuk
                        </a>

                        <a href="{{ route('surat-keluar.index') }}"
                            class="block px-6 py-4 bg-red-600 text-white rounded-lg text-center font-semibold hover:bg-red-700">
                            Surat Keluar
                        </a>

                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('jenis-agenda.index') }}"
                                class="block px-6 py-4 bg-yellow-500 text-white rounded-lg text-center font-semibold hover:bg-yellow-600">
                                Jenis Agenda
                            </a>

                            <a href="{{ route('kategori-surat.index') }}"
                                class="block px-6 py-4 bg-purple-600 text-white rounded-lg text-center font-semibold hover:bg-purple-700">
                                Kategori Surat
                            </a>

                            <a href="{{ route('profile.edit') }}"
                                class="block px-6 py-4 bg-gray-600 text-white rounded-lg text-center font-semibold hover:bg-gray-700">
                                Edit Profile
                            </a>

                            <a href="{{ route('users.index') }}"
                                class="block px-6 py-4 bg-black text-white rounded-lg text-center font-semibold hover:bg-gray-800">
                                Manajemen User
                            </a>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>