<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Berita Terbaru
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($beritas->count())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($beritas as $berita)
                        <div class="bg-white dark:bg-gray-800 rounded shadow overflow-hidden">
                            <img src="{{ asset('storage/' . $berita->foto) }}" class="w-full h-48 object-cover" alt="Foto">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">{{ $berita->judul }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ Str::limit($berita->detail, 100) }}
                                </p>
                                <a href="{{ route('user.show', $berita->id) }}" class="text-indigo-600 hover:underline text-sm mt-2 inline-block">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400">Belum ada berita tersedia.</p>
            @endif
        </div>
    </div>
</x-app-layout>
