@extends('backend.layouts.master')

@section('title', 'create quiz')

@section('content')
<div class="span9">
    <div class="content">

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <form action="{{ route('quiz.store') }}" method="POST">
            @csrf
            <div class="module">
                <div class="module-head">
                    <h3>Create quiz</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">

                        <label for="name" class="control-label">Quiz name</label>
                        <div class="controls">
                            <input type="text" name="name" class="span8" placeholder="name of a quiz"
                                value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="description" class="control-label">Quiz description</label>
                        <div class="controls">
                            <textarea name="description" class="span8">{{old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="minutes" class="control-label">Time(minutes)</label>
                        <div class="controls">
                            <input type="text" name="minutes" class="span8" placeholder="minutes of a quiz"
                                value="{{ old('minutes') }}">
                            @error('minutes')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="controls">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection