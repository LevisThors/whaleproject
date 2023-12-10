<x-admin-nav>
    <link rel="stylesheet" href='{{ asset('css/main.css')}}'>
    <div class="w-100 d-flex justify-content-center color-white">
    <form class="p-5 w-50" method="POST" action="/admin/products/add" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="details">Details</label>
            <input type="text" class="form-control" id="details" name="details" >
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" class="form-control-file" id="image" name='image' style="color:white !important;"> 
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control w-25" name='price' id="price" >
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select class="form-control" id="category" name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{ ucwords($category->name) }}</option>
            @endforeach
          </select>
        </div>
        <x-form-submit-button text='Submit' ></x-form-submit-button>
        
      </form>
    </div>
</x-admin-nav>