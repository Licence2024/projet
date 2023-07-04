<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Récapitulatif de votre panier') }}
        </h2>
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
            <!-- Remove py-8 -->
            <div class="mx-auto container py-8">
                <shopping-cart></shopping-cart>
            </div>
        </div>
    </div>
</x-app-layout>
