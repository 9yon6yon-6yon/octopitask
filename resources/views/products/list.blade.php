<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $product->imagepath) }}" class="card-img-top" alt="{{ $product->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                    <p class="font-weight-bold">Price: {{ $product->price }}৳</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@if ($products->isEmpty())
    <p>No products found.</p>
@endif
