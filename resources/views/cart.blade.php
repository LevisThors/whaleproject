<x-layout>
    <div>

    </div>
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card ">
                <div class="card-body p-4">
      
                  <div class="row">
      
                    <div class="col-lg-7" style="width:100%">
                      <h5 class="mb-3" ><a href="/"  style="color:rgba(255, 255, 255, 0.582) !important" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                      <hr>
      
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                          <p class="mb-1">Shopping cart</p>
                          <p class="mb-0">You have {{ $cartItems->count() }} items in your cart</p>
                        </div>
                        <x-sort-by />
                      </div>


                      @foreach($cartItems as $cartItem) 
                      <div class="card mb-3 card-h">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <div> 
                                <img
                                  src="{{$cartItem->product->image}}"
                                  class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                              </div>
                              <div class="ms-3">
                                <h5>{{$cartItem->product->name}}</h5>
                                <p class="small mb-0">{{$cartItem->product->details}}</p>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <div style="width: 50px;">
                                <h5 class="fw-normal mb-0">2</h5>
                              </div>
                              <div style="width: 80px;">
                                <h5 class="mb-0">${{$cartItem->price}}</h5>
                              </div>
                              <form action="/delete-cart-item/{{ $cartItem->product->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" style="color: #cecece; background: transparent; border:none;"><i class="fas fa-trash-alt"></i></button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach

                          <hr class="my-4">
      
                          <div class="d-flex justify-content-between">
                            <p class="mb-2">Subtotal</p>
                            <p class="mb-2">${{$totalprice}}</p>
                          </div>
      
                          <form action='/add-transaction' method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-toxic btn-block btn-lg w-25">
                              <div class="d-flex justify-content-between">
                                <span>${{$totalprice}}</span>
                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                              </div>
                            </button>
                          </form>
      
                        </div>
                      </div>
      
                    </div>
      
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-layout> 