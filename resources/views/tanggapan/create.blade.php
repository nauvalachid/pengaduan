<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-200 leading-tight">
            {{ __('Form Tanggapan') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="overflow-hidden shadow-sm sm:rounded-lg p-6"
                style="background-color: #C5B358;"
            >
                <form action="{{ route('tanggapan.store', $pengaduan->id) }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-black text-sm font-medium mb-2">Judul Pengaduan</label>
                        <input
                            type="text"
                            value="{{ $pengaduan->judul }}"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-gray-100 text-black"
                            disabled
                        >
                    </div>

                    <div class="mb-6">
                        <label class="block text-black text-sm font-medium mb-2">Isi Pengaduan</label>
                        <textarea
                            rows="4"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-gray-100 text-black"
                            disabled
                        >{{ $pengaduan->isi_pengaduan }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-black text-sm font-medium mb-2">Tanggapan</label>
                        <textarea
                            name="isi_tanggapan"
                            rows="4"
                            class="w-full px-3 py-2 rounded-lg border border-black bg-white text-black focus:outline-none focus:ring-2 focus:ring-[#9c8b33]"
                            required
                        ></textarea>
                    </div>

                    <div class="flex items-center gap-2">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm"
                        >
                            Kirim
                        </button>
                        <a
                            href="{{ route('pengaduan.index') }}"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm border border-red-700"
                        >
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
