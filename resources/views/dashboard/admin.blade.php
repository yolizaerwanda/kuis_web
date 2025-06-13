<x-app-layout>
   <x-slot name="header">
       <div class="flex justify-between items-center">
           <h2 class="font-semibold text-xl text-red-600 dark:text-red-400 leading-tight">
               Dashboard Admin
           </h2>
       </div>
   </x-slot>


   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 bg-white dark:bg-gray-800">
                   <div class="text-gray-900 dark:text-gray-100">
                       <h3 class="text-lg font-semibold mb-4">Selamat datang, Admin!</h3>
                       <p class="mb-6">Ini adalah panel admin. Anda bisa mengelola pengguna, melihat statistik, dll.</p>
                   </div>
               </div>
           </div>
       </div>
   </div>
</x-app-layout>
