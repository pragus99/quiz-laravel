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

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="module">
                <div class="module-head">
                    <h3>Create User</h3>
                </div>
                <div class="module-body">

                    <div class="control-group">
                        <label for="name" class="control-label">Full Name</label>
                        <div class="controls">
                            <input type="text" name="name" class="span8" placeholder="name of a user"
                                value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="email" class="control-label">Email</label>
                        <div class="controls">
                            <input type="email" name="email" class="span8" placeholder="email of a user"
                                value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" class="span8" placeholder="password of a user"
                                required>
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="occupation" class="control-label">Occupation/Job (Optional)</label>
                        <div class="controls">
                            <input type="text" name="occupation" class="span8" placeholder="Occupation/Job of a user"
                                value="{{ old('occupation') }}">
                            @error('occupation')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="address" class="control-label">Address (Optional)</label>
                        <div class="controls">
                            <input type="text" name="address" class="span8" placeholder="address of a user"
                                value="{{ old('address') }}">
                            @error('address')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="phone" class="control-label">Phone Number (Optional)</label>
                        <div class="controls">
                            <input type="text" name="phone" class="span8" placeholder="Phone number of a user"
                                value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="controls">
                            <button type="submit" class="btn btn-success">Create User</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>

@endsection