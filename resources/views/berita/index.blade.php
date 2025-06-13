<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Daftar Berita
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('berita.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none transition ease-in-out duration-150">
                    Tambah Berita
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Judul</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Detail</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Penulis</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Foto</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($beritas as $berita)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal break-words max-w-xs">
                                            {{ Str::limit($berita->judul, 50) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal break-words max-w-xs">
                                            {{ Str::limit($berita->detail, 50) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal break-words max-w-xs">
                                            {{ Str::limit($berita->penulis, 50) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto" class="w-24 rounded shadow">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('berita.edit', $berita) }}"
                                                   class="inline-flex items-center px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded">
                                                    Edit
                                                </a>
                                                <form action="{{ route('berita.destroy', $berita) }}" method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            Belum ada berita ditambahkan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
