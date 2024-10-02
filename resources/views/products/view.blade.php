<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-4">
                        @if ($product->imagepath)
                            <img src="{{ asset('storage/' . $product->imagepath) }}" alt="{{ $product->title }}"
                                class="w-full h-auto">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>

                    <h3 class="text-2xl font-bold mb-4">{{ $product->title }}</h3>
                    <p class="text-lg mb-4">{{ $product->description }}</p>

                    <p class="text-xl font-semibold text-green-600 mb-4">{{ number_format($product->price, 2) }} ৳</p>

                    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Back to Products</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
