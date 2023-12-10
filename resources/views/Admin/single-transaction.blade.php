<x-admin-nav>
    <div class="px-5">
        <h1 class="mb-3 color-white"><i class="fa fa-user mr-3" aria-hidden="true"></i>{{ $transaction->user->email }}</h1>
        <hr>
        <div class="container-fluid single-trans-table pb-3">
            <table class="table darker rounded">
            <thead>
            <tr class='table-head'>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
            </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr class='table-field'>
                    <th scope="row">{{ $item->product->id }}</th>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->product->category->name }}</td>

                </tr>
                @endforeach
            </tbody>
            </table>
    </div>
    <hr>

        <p class='color-white text-xl'>Total: <strong class="ml-3">${{$transaction->amount}}</strong></p>
        @if($transaction->comment)
        <p class='color-white'>Comment: {{$transaction->comment}}</p>
        @endif

        <form method="POST" action="/admin/transaction-status/{{$transaction->id}}">
            @csrf
            <div class="form-group">
                <label for="status">Status</label>
                <select class=' ml-2' id="status" name="status">
                    <option value='pending'>Pending</option>
                    <option value='success'>Approve</option>
                    <option value='failed'>Decline</option>
                </select>
            </div>
            <x-form-submit-button text="Save"/>
        </form>

    </div>

      

</x-admin-nav>