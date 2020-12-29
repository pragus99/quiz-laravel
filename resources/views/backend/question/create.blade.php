@extends('backend.layouts.master')

@section('title', 'create question')

@section('content')
<div class="span9">
    <div class="content">

        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <form action="{{ route('question.store') }}" method="POST">
            @csrf
            <div class="module">
                <div class="module-head">
                    <h3>Create Question</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">

                        <label for="question" class="control-label">Choose Quiz</label>
                        <div class="controls">
                            <select name="quiz" class="span8" id="">
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

                        <label for="question" class="control-label">Question name</label>
                        <div class="controls">
                            <input type="text" name="question" class="span8" placeholder="name of a question"
                                value="{{ old('question') }}">
                            @error('question')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="options" class="control-label">Options</label>
                        <div class="controls">
                            @for ($i=0;$i<4;$i++) <input type="text" name="options[]" class="span7"
                                placeholder="option {{ $i+1 }}" value="{{ old('options.[$i]') }}" required>
                                <input type="radio" name="correct_answer" value="{{ $i }}"> <span>is correct
                                    answer</span>
                                @endfor
                                @error('options')
                                <div class=" invalid-feedback" role="alert">
                                    {{ $message }}                                                                                                                                              </div>
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