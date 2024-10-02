<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <form id="filter-form">
                        <div class="flex items-center">
                            <input type="text" name="search" id="search" placeholder="Search by title..."
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <input type="number" name="min_price" id="min_price" placeholder="Min Price"
                                class="ml-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <input type="number" name="max_price" id="max_price" placeholder="Max Price"
                                class="ml-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </form>

                    <!-- Products listing -->
                    <div class="mt-6" id="product-list">
                        <!-- Product list loads here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadProducts() {
            let search = document.getElementById('search').value;
            let min_price = document.getElementById('min_price').value;
            let max_price = document.getElementById('max_price').value;

            if (search === '' && min_price === '' && max_price === '') {
                $('#product-list').html('');
                return;
            }
            if (search !== '') {
                search = search.replace(/</g, "&lt;").replace(/>/g, "&gt;");
            }

            $.ajax({
                url: "{{ route('products.filter') }}",
                method: "GET",
                data: {
                    search: search,
                    min_price: min_price,
                    max_price: max_price,
                },
                success: function(data) {
                    $('#product-list').html(data);
                }
            });
        }

        document.getElementById('search').addEventListener('keyup', loadProducts);
        document.getElementById('min_price').addEventListener('input', loadProducts);
        document.getElementById('max_price').addEventListener('input', loadProducts);

        loadProducts();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</x-app-layout>
