<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-200 leading-tight">
            {{ __('Edit Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="overflow-hidden shadow-sm sm:rounded-lg p-6"
                style="background-color: #C5B358;"
            >
                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 dark:text-red-400">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-6">
                        <label
                            for="judul"
                            class="block text-black text-sm font-medium mb-2"
                        >
                            Judul
                        </label>
                        <input
                            type="text"
                            name="judul"
                            id="judul"
                            value="{{ old('judul', $pengaduan->judul) }}"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                        >
                    </div>

                    {{-- Bagian --}}
                    <div class="mb-6">
                        <label
                            for="bagian"
                            class="block text-black text-sm font-medium mb-2"
                        >
                            Bagian
                        </label>
                        <input
                            type="text"
                            name="bagian"
                            id="bagian"
                            value="{{ old('bagian', $pengaduan->bagian) }}"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                        >
                    </div>

                    {{-- Isi Pengaduan --}}
                    <div class="mb-6">
                        <label
                            for="isi_pengaduan"
                            class="block text-black text-sm font-medium mb-2"
                        >
                            Isi Pengaduan
                        </label>
                        <textarea
                            name="isi_pengaduan"
                            id="isi_pengaduan"
                            rows="5"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                        >{{ old('isi_pengaduan', $pengaduan->isi_pengaduan) }}</textarea>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('pengaduan.index') }}"
                           class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm border border-red-700">
                            Cancel
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-600 transition ease-in-out duration-150">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
