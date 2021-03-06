@extends('backend.layouts.master')

@section('title', 'exam assigned user')

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
                <h3>User Exam</h3>
            </div>
            <div class="module-body">
                @if (count($quizzes)>0)
                <table class="table table-striped">
                    <thead class="thead">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col" colspan="2">Quiz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                        @foreach ($quiz->users as $key=>$user)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $quiz->name }}</td>
                            <td>
                                <a href="{{ route('quiz.show', [$quiz->id] )}}">
                                    <button class="btn btn-info">View Question</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('exam.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                                    <button class="btn btn-danger" type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                        @else
                        <td>There no Quiz</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection