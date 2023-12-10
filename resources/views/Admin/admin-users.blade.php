<x-admin-nav>
    <div class="container-fluid" id='main-cont'>

          <table class="table darker rounded">
            <thead>
            <tr class='table-head'>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Transaction Total</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                
                @foreach($users as $user)
                <tr class='table-field'>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->transactions->sum(function($transaction) {
                        return $transaction->amount;
                        })
                    }}</td>
                    <td><a href='#'><i class="fas fa-edit "></i></a> / 
                        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a> /
                        <form method='POST' action='/admin/delete-user/{{ $user->id }}' style="display: inline-block">
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