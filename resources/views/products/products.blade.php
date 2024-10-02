<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Success message after actions -->
                    @if(session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add New Product Button -->
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('products.create') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Product
                        </a>
                    </div>

                    <!-- Product Table -->
                    <table class="min-w-full  dark:bg-gray-800 rounded-lg">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Image</th>
                                <th class="py-2 px-4 border-b">Title</th>
                                <th class="py-2 px-4 border-b">Description</th>
                                <th class="py-2 px-4 border-b">Price (৳)</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="py-2 px-4 border-b">
                                        <img src="{{ asset('storage/' . $product->imagepath) }}" 
                                             alt="{{ $product->title }}" class="w-20 h-20 object-cover rounded-lg">
                                    </td>
                                    <td class="py-2 px-4 border-b">{{ $product->title }}</td>
                                    <td class="py-2 px-4 border-b">{{ Str::limit($product->description, 50) }}</td>
                                    <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <!-- View Button -->
                                        <a href="{{ route('products.show', $product->id) }}" 
                                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                            View
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('products.edit', $product->id) }}" 
                                           class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded ml-2">
                                            Edit
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" 
                                              class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" 
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
