<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Ajout d'un nouveau produit") }}
            </h2>
        </div>
    </x-slot>
    <div class="flex justify-center">
        @if (session('echec'))
            <strong class="rounded-md mt-4 px-2 py-2"
                style="color: red; font-weight: bold;background: rgba(253, 234, 211, 0.705)">
                {{ session('echec') }}
            </strong>
        @endif
    </div>
    <div class="py-12 flex justify-center">
        <div class="flex flex-col w-full p-8 text-gray-800 pin-r pin-y md:w-4/5 lg:w-4/5">
            <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}"
                class="bg-white overflow-hidden shadow-lg rounded-md sm:px-6 px-2 lg:px-10 py-8">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-boldmb-2">Nom du produit
                        <span>*</span></label>
                    <div class="mt-2">
                        <input type="text" name="name"
                            class="shadow appearance-none border-0 rounded-md text-gray-700 leading-tight w-full ring-1 ring-insetfocus:outline-none focus:shadow-outline"
                            id="name">
                        @error('name')
                            <strong class="rounded-md mt-4 px-2 py-2"
                                style="color: red; font-weight: ">
                                {{ $message }}
                            </strong>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-boldmb-2">Prix (Fcfa) <span
                            style="color: red; font-weight: bold">*</span></label>
                    <div class="mt-2">
                        <input type="number" min="0" name="price"
                            class="shadow appearance-none border-0 rounded-md text-gray-700 leading-tight w-full ring-1 ring-insetfocus:outline-none focus:shadow-outline"
                            id="price">
                        @error('price')
                            <strong class="rounded-md mt-4 px-2 py-2"
                                style="color: red; font-weight: ">
                                {{ $message }}
                            </strong>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-boldmb-2">Description <span
                            style="color: red; font-weight: bold">*</span></label>
                    <div class="mt-2">
                        <textarea name="description" id="description" cols="30" rows="3"
                            class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset sm:leading-6"></textarea>
                        @error('description')
                            <strong class="rounded-md mt-4 px-2 py-2"
                                style="color: red; font-weight: ">
                                {{ $message }}
                            </strong>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-span-full">
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image <span
                                style="color: red; font-weight: bold">*</span></label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="image"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file or drag and drop</span>
                                        <input id="image" name="image" type="file" required
                                            class="block sr-only shadow appearance-none border-0 rounded-md text-gray-700 leading-tight w-full ring-1 p-6 ring-insetfocus:outline-none focus:shadow-outline">
                                    </label>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                @error('image')
                                    <strong class="rounded-md mt-4 px-2 py-2"
                                        style="color: red; font-weight: bold;">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 text-center">
                    <button type="submit"
                        class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2 bg-indigo-700">
                        Ajouter le produit
                    </button>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
</x-app-layout>
