@extends('backend.layouts.master')

@section('title', 'Edit question')

@section('content')
<div class="span9">
    <div class="content">

        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <form action="{{ route('question.update', [$question->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="module">
                <div class="module-head">
                    <h3>Edit Question</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">

                        <label for="question" class="control-label">Choose Quiz</label>
                        <div class="controls">
                            <select name="quiz" class="span8" id="">
                                @foreach ($quizzes as $quiz)
                                <option value="{{ $quiz->id }}" @if($quiz->id==$question->quiz_id)
                                    selected
                                    @endif
                                    >{{ $quiz->name }}</option>
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
                                value="{{ $question->question }}">
                            @error('question')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="options" class="control-label">Options</label>
                        <div class="controls">
                            @foreach ($question->answers as $key=>$answer) <input type="text" name="options[]"
                                class="span7" value="{{$answer->answer}}" required>
                            <input type="radio" name="correct_answer" value="{{ $key }}" @if($answer->is_correct)
                            {{ 'checked' }} @endif> 
                            <span>is correct answer</span>
                            @endforeach
                            @error('options')
                            <div class=" invalid-feedback" role="alert">
                                {{ $message }} </div>
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