<x-admin-nav>
    <div class="container-fluid" id='main-cont'>

        <table class="table darker rounded">
          <thead>
          <tr class='table-head'>
              <th scope="col">ID</th>
              <th scope="col">User</th>
              <th scope="col">Payment</th>
              <th scope="col">Status</th>
          </tr>
          </thead>
          <tbody>
              
              @foreach($transactions as $transaction)
              <tr class='table-field'>
                  <th scope="row">{{ $transaction->id }}</th>
                  <td><a href="/admin/transaction/{{$transaction->id}}">{{ $transaction->user->email }}</a></td>
                  <td>{{ $transaction->amount }}</td>
                  <td>{{ $transaction->status }}</td>
              </tr>
              @endforeach
          </tbody>
         </table>
         
  </div>
</x-admin-nav>