<x-layout>
  <!-- ************************MAIN**************************** -->

  <div class="w-100 d-flex justify-content-center main-category-container">
    <main class="w-75  bg-light">
      @foreach($categories as $category)
      @if($loop->iteration % 3==1)
        <div class="card-group bg-dark pb-4">
      @endif
            <a href="/category/{{$category->name}}" class="card card-h">
              <img class="card-img-top"  height='270' src="https://www.teahub.io/photos/full/97-971948_gaming-pc-wallpaper-lenovo-pro-gaming-pc-hd.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title" >{{$category->name}}</h5>
                <p class="card-text"></p>
              </div>
            </a>
            @if($loop->iteration % 3==0)
              </div>   
            @endif
          @endforeach
    </main>
  </div>
</x-layout>


