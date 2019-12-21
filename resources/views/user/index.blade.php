@extends('layouts.app')

@section('content')

<h1>Contact List</h1>
 
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->contact }}</td>
        <td>
            <form action="{{ route('destroy-user',$user->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('user',$user->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('edit-user',$user->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $users->links() !!}

@endsection