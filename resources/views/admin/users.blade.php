
@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center"><strong>All Users</strong></h1>
  <table class="table border">
      <thead class="thead-dark">
          <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Type</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  @if ($user->is_admin == 0)
                      <td>User</td>
                  @else
                      <td>Admin</td>
                  @endif
              </tr>
          @endforeach
      </tbody>
  </table>
  <a href="{{route('home')}}"><button class="btn btn-secondary">Back</button></a>
</div>
@endsection


