<x-app-layout>
    <!-- Page Heading -->
    <x-slot name="header">
        Bienvenu sur la page d'acceuil de votre site de commerce en ligne.
    </x-slot>
     <div class="flex justify-center">
        @if (session('echec'))
            <strong class="rounded-md mt-4 px-2 py-2"
                style="color: red; font-weight: bold;background: rgba(253, 234, 211, 0.705)">
                {{ session('echec') }}
            </strong>
        @endif
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
