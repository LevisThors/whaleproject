<x-admin-nav>
    <div class="container-fluid" id='main-cont'>

          <a href='/admin/products-add/' class='btn btn-outline-success mb-3 '>Add Product</a>
          <table class="table darker rounded color-white">
            <thead>
            <tr class='table-head'>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class='table-field'>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td><a href='/admin/edit-product/{{ $product->id }}'><i class="fas fa-edit "></i></a> / 
                        <form method='POST' action='/admin/delete-product/{{ $product->id }}' style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class='buttton' type="submit"><i class="fas fa-trash"></i></button></td>
                        </form>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
           </table>
    </div>
</x-admin-nav>