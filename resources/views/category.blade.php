<x-layout>

  <div class="w-100 d-flex justify-content-center mt-3">
    <main class="w-75">
      <h1 class="category-title">{{$title}}</h1>
      <x-sort-by />

      @foreach($products as $product)
    @if($loop->iteration % 3==1)
      <div class="card-group d-flex justify-content-around pb-5">
    @endif
        <div class="card card-h bg-dark">
          <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" height='270' width="200" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title" id="product-title">{{ $product->name }}</h5>
            
            <p class="card-text price-tag" id='price'><strong>Price:</strong> {{ $product->price }}</p>
            @if(Auth::check())
            <form action="/add-to-cart/{{$product->id}}" method="POST">
              @csrf
              <button class="btn btn-outline-toxic rounded mb-1 mt-2" type="submit">Add to cart</button>
            </form>
            @else
            <div>
              <a class="btn btn-outline-toxic rounded mb-1 mt-2" href='/log-in'>Add to cart</a>
            </div>
            @endif
            <a href="/product/{{$product->id}}" class="show-more-btn">Show more</a>
          </div>
        </div>
      @if($loop->iteration % 3 == 0)
        </div>
      @endif
    @endforeach
      </div>

    </main>
  </div>

</x-layout>