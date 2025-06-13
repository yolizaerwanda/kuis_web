<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            {{-- Tombol Kembali --}}
            <a href="{{ route('user.index') }}" 
            class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 text-2xl">
                ←
            </a>

            {{-- Judul dengan jarak jauh --}}
            <h2 class="ml-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Berita
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            {{-- Judul --}}
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $berita->judul }}</h1>

            {{-- Gambar --}}
            <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto" class="w-full max-w-3xl h-auto object-contain rounded mb-4">

            {{-- Penulis dan Tanggal --}}
            <div class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                Ditulis oleh <strong>{{ $berita->penulis }}</strong> pada {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
            </div>

            {{-- Detail berita --}}
            <div class="text-gray-800 dark:text-gray-100 leading-relaxed">
                {!! nl2br(e($berita->detail)) !!}
            </div>

        </div>
    </div>
</x-app-layout>
