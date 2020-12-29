@extends('backend.layouts.master')

@section('title', 'All user')

@section('content')
<div class="span9">
    <div class="content">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="module">
            <div class="module-head">
                <h3>All users</h3>
            </div>
            <div class="module-body">
                @if (count($users)>0)
                <table class="table table-striped">
                    <thead class="thead">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key=>$user)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->visible_password }}</td>
                            <td>{{ $user->occupation }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{ route('user.edit', [$user->id] )}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a> --|--
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $user->id }}">
                                    Delete
                                </button>
                            </td>
                            @include('backend.user.alert.modal')
                        </tr>
                        @endforeach
                        @else
                        <td>There no user</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination pagination-centered">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection