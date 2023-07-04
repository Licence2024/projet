
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les commandes') }}
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
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    @forelse ($orders as $order)
                    <table class="table-auto bg-white w-full my-4">
                        <thead class="border-b">
                            <h2 style="color: indigo">Commande n° {{ $order->id }} passée le {{ $order->created_at->format('d M Y') }}</h2>
                        </thead>
                        <tbody>
                            <tr class="border-b text-gray-600 hover:bg-gray-50">
                                <td class="p-4">
                                    Nom
                                </td>
                                <td class="p-4">
                                    Prix
                                </td>
                                <td class="p-4">
                                    Quantité
                                </td>
                            </tr>
                            @foreach($order->products as $product)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">
                                    {{ $product->name }}
                                </td>
                                <td class="p-4">
                                    {{ str_replace('.', ',', $product->pivot->price / 1000) . ' XAF' }}
                                </td>
                                <td class="p-4">
                                    {{ $product->pivot->quantity }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @empty
                    <td class="p-4">
                        Aucune commande
                    </td>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
