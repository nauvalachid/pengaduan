<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight">
            {{ __('Edit Tanggapan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="overflow-hidden shadow-sm sm:rounded-lg p-6"
                style="background-color: #C5B358;"
            >

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 dark:text-red-400">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tanggapan.update', $tanggapan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Judul Pengaduan (readonly) --}}
                    <div class="mb-6">
                        <label for="judul_pengaduan" class="block text-black text-sm font-medium mb-2">
                            Judul Pengaduan
                        </label>
                        <input
                            type="text"
                            id="judul_pengaduan"
                            value="{{ $tanggapan->pengaduan->judul }}"
                            readonly
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                        >
                    </div>

                    {{-- Isi Tanggapan --}}
                    <div class="mb-6">
                        <label for="isi_tanggapan" class="block text-black text-sm font-medium mb-2">
                            Isi Tanggapan
                        </label>
                        <textarea
                            name="isi_tanggapan"
                            id="isi_tanggapan"
                            rows="5"
                            required
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                        >{{ old('isi_tanggapan', $tanggapan->isi_tanggapan) }}</textarea>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('tanggapan.index') }}"
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
