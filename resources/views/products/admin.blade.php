<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nos produits') }}
            </h2>
            @auth
                <a href="{{ route('product.add') }}" style="background: cornflowerblue"
                    class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2">
                    Nouveau produit
                </a>
            @endauth
        </div>
    </x-slot>
    <div class="flex justify-center">
        @if (session('success'))
            <strong class="rounded-md mt-4 px-2 py-2"
                style="color: green; font-weight: bold;background: rgba(174, 248, 167, 0.705)">
                {{ session('success') }}
            </strong>
        @endif
    </div>

    <div class="flex sm:px-6 lg:px-8 px-4 py-2">
        <!-- Remove py-8 -->
        <div class="flex justify-center items-center" style="flex-wrap: wrap">
            @foreach ($products as $product)
                <!-- Card 1 -->
                <div tabindex="0" class="focus:outline-none my-4" style="width: 295px; margin-right: 14px">
                    <div>
                        <img alt="person capturing an image" src="{{ asset($product->image) }}" tabindex="0"
                            class="focus:outline-none w-full h-44" />
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center justify-between px-4 pt-4">
                            {{-- <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                    </svg>
                                </div> --}}
                            <div class="bg-yellow-200 py-1.5 px-6 rounded-full">
                                <p tabindex="0" class="focus:outline-none text-xs text-yellow-700">
                                    {{ $product->formatted_price }}</p>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">
                                    {{ $product->name }}</h2>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5"></p>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">
                                {{ $product->description }}</p>
                            {{-- <div class="flex mt-4">
                                    <div>
                                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">12 months warranty</p>
                                    </div>
                                    <div class="pl-2">
                                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Complete box</p>
                                    </div>
                                </div> --}}
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="flex items-center justify-between py-4">
                                    <button type="submit"
                                        class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2"
                                        style="background: rgba(253, 4, 4, 0.87)">
                                        Supprimer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Card 1 Ends -->
            @endforeach
        </div>
    </div>
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <div class="flex justify-center py-4">
        {!! $products->links() !!}
    </div>
</x-app-layout>
