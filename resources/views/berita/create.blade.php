<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Berita
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="judul" value="Judul" />
                        <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" required autofocus value="{{ old('judul') }}" />
                        <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="penulis" value="Penulis" />
                        <x-text-input id="penulis" name="penulis" type="text" class="mt-1 block w-full" required value="{{ old('penulis') }}" />
                        <x-input-error :messages="$errors->get('penulis')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="tanggal" value="Tanggal" />
                        <x-text-input id="tanggal" name="tanggal" type="date" class="mt-1 block w-full" required value="{{ old('tanggal') }}" />
                        <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="foto" value="Foto" />
                        <input id="foto" name="foto" type="file" class="mt-1 block w-full text-sm text-gray-500 file:border file:rounded file:px-4 file:py-2" required>
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="detail" value="Detail Berita" />
                        <textarea id="detail" name="detail" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('detail') }}</textarea>
                        <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                    </div>

                    <x-primary-button>Simpan</x-primary-button>
                    <a href="{{ route('berita.index') }}" class="ml-3 inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:underline">
                        Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
