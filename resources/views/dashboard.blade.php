<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#C5B358] leading-tight">
            {{ __('Pengaduan Sistem Informasi Mahasiswa Teknologi Informasi') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #1a0000; font-family: 'Figtree', sans-serif;">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-[#450000] text-white rounded-lg shadow-lg p-8 border border-gray-700">
                <p class="text-lg font-semibold text-green-300">
                    {{ __("You're logged in!") }}
                </p>
                <p class="mt-4 text-sm text-gray-300">
                    Selamat datang di dashboard! Silakan gunakan menu navigasi untuk mengakses fitur sistem pengaduan.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
