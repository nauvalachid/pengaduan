<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-200 leading-tight">
            {{ __('Tambah Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div
                class="overflow-hidden shadow-sm sm:rounded-lg p-6"
                style="background-color: #C5B358;"
            >
                <form method="POST" action="{{ route('mahasiswa.store') }}">
                    @csrf

                    <div class="mb-6">
                        <label
                            class="block text-black text-sm font-medium mb-2"
                        >
                            Nama Mahasiswa
                        </label>
                        <input
                            type="text"
                            name="nama"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                            placeholder="Masukkan Nama Mahasiswa"
                            required
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            class="block text-black text-sm font-medium mb-2"
                        >
                            Email
                        </label>
                        <input
                            type="text"
                            name="email"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                            placeholder="Masukkan Email Mahasiswa"
                            required
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            class="block text-black text-sm font-medium mb-2"
                        >
                            NIM
                        </label>
                        <input
                            type="text"
                            name="nim"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                            placeholder="Masukkan NIM"
                            required
                        >
                    </div>

                    <div class="mb-6">
                        <label
                            class="block text-black text-sm font-medium mb-2"
                        >
                            Jurusan
                        </label>
                        <input
                            type="text"
                            name="jurusan"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                            placeholder="Masukkan Jurusan"
                            required
                        >
                    </div>

                    <div class="flex items-center gap-2">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm"
                        >
                            Save
                        </button>
                        <a
                            href="{{ route('mahasiswa.index') }}"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm border border-red-700"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
