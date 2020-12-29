@extends('backend.layouts.master')

@section('title', 'create user')

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
                <h3>Update User</h3>
            </div>
            <div class="module-body">

                <form action="{{ route('user.update', [$user->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="control-group">
                        <label for="name" class="control-label">Full Name</label>
                        <div class="controls">
                            <input type="text" name="name" class="span8" placeholder="name of a user"
                                value="{{ $user->name }}" required>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                            <input type="text" name="password" class="span8" placeholder="password of a user"
                                value="{{ $user->visible_password }}" required>
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="occupation" class="control-label">Occupation/Job (Optional)</label>
                        <div class="controls">
                            <input type="text" name="occupation" class="span8" placeholder="Occupation/Job of a user"
                                value="{{ $user->occupation }}">
                            @error('occupation')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="address" class="control-label">Address (Optional)</label>
                        <div class="controls">
                            <input type="text" name="address" class="span8" placeholder="address of a user"
                                value="{{ $user->address }}">
                            @error('address')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="phone" class="control-label">Phone Number (Optional)</label>
                        <div class="controls">
                            <input type="text" name="phone" class="span8" placeholder="Phone number of a user"
                                value="{{ $user->phone }}">
                            @error('phone')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="controls">
                            <button type="submit" class="btn btn-success">Edit User</button>
                        </div>
                    </div>

            </div>
        </div>
        </form>

    </div>
</div>

@endsection