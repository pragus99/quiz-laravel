@extends('backend.layouts.master')

@section('title', 'Edit quiz')

@section('content')
<div class="span9">
    <div class="content">

        <form action="{{ route('quiz.update', [$quiz->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="module">
                <div class="module-head">
                    <h3>Edit quiz</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">

                        <label for="name" class="control-label">Quiz name</label>
                        <div class="controls">
                            <input type="text" name="name" class="span8 @error('name') is-invalid @enderror"
                                placeholder="name of a quiz" value="{{ $quiz->name }}">
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="description" class="control-label">Quiz description</label>
                        <div class="controls">
                            <textarea name="description"
                                class="span8 @error('description') is-invalid @enderror">{{$quiz->description}}</textarea>
                            @error('description')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="minutes" class="control-label">Time(minutes)</label>
                        <div class="controls">
                            <input type="text" name="minutes" class="span8 @error('minutes') is-invalid @enderror"
                                placeholder="minutes of a quiz" value="{{ $quiz->minutes }}">
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