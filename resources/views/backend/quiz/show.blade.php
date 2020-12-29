@extends('backend.layouts.master')

@section('title', 'question')

@section('content')
<div class="span9">
    <div class="content">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @foreach ($quizzes as $quiz)

        <div class="module">
            <div class="module-head">
                <h3>{{ $quiz->name }}</h3>
            </div>
            <div class="module-body">
                <div>
                    <p><strong>About : {{ $quiz->description }} <span class="pull-right">Time Allocated : {{ $quiz->minutes }} minutes</strong></span> </p>
                </div>
                <div class="module-body table">
                    @foreach ($quiz->questions as $question)
                    <table class="table table-message">
                        <tbody>
                            <tr class="read">
                                {{ $question->question }}
                                <td class="cell-author hidden-phone hidden-tablet">
                                    @foreach ($question->answers as $answer)
                                    <p>
                                        {{ $answer->answer }}
                                        @if ($answer->is_correct)
                                        <span class="badge badge-success pull-right">Correct</span>
                                        @endif
                                    </p>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>
                @endforeach
                <div class="module-foot">
                    <a href="{{ route('quiz.edit', [$quiz->id] )}}">
                        <button class="btn btn-primary"> Edit </button>
                    </a>
                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal"
                        data-target="#exampleModal{{ $quiz->id }}">
                        Delete
                    </button>
                    @include('backend.quiz.alert.modal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection