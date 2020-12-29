@extends('backend.layouts.master')

@section('title', 'create exam assigned user')

@section('content')
<div class="span9">
    <div class="content">

        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <form action="{{ route('exam.assign') }}" method="POST">
            @csrf
            <div class="module">
                <div class="module-head">
                    <h3>Create Exam to User</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">

                        <label for="question" class="control-label">Assign Quiz</label>
                        <div class="controls">
                            <select name="quiz_id" class="span8" id="">
                                @foreach ($quizzes as $quiz)
                                <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
                                @endforeach
                            </select>
                            @error('question')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                        <label for="question" class="control-label">List User</label>
                        <div class="controls">
                            <select name="user_id" class="span8" id="">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('question')
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