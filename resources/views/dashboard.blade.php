<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Success message after actions -->
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Add New Product Button -->
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4"
                        onclick="document.getElementById('product-modal').style.display='block'">
                        Add New Product
                    </button>

                    <!-- Product Modal -->
                    <div id="product-modal" style="display:none;" class="fixed z-10 inset-0 overflow-y-auto">
                        <div class="flex items-center justify-center min-h-screen">
                            <div class=" dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-lg mx-auto">
                                <h2 class="text-lg font-semibold mb-4">Add New Product</h2>

                                <!-- Form for adding new product -->
                                <form action="{{ route('products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                            Product Title
                                        </label>
                                        <input type="text" name="title"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                            Product Description
                                        </label>
                                        <textarea name="description"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            required></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                            Product Price
                                        </label>
                                        <input type="number" name="price"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                            Product Image
                                        </label>
                                        <input type="file" name="image"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="button"
                                            class="bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2"
                                            onclick="document.getElementById('product-modal').style.display='none'">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Script to handle modal display
    window.onclick = function(event) {
        var modal = document.getElementById('product-modal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
