@extends('backend.layouts.master')

@section('title', 'All quiz')

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
                <h3>All Quizzes</h3>
            </div>
            <div class="module-body">
                @if (count($quizzes)>0)
                <table class="table table-striped">
                    <thead class="thead">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Time(minutes)</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $key=>$quiz)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $quiz->name }}</td>
                            <td>{{ $quiz->description }}</td>
                            <td>{{ $quiz->minutes }}</td>
                            <td>
                                <a href="{{ route('quiz.show', [$quiz->id] )}}">
                                    <button class="btn btn-info">View</button>
                                </a> --|--
                                <a href="{{ route('quiz.edit', [$quiz->id] )}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a> --|--
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $quiz->id }}">
                                    Delete
                                </button>
                            </td>
                            @include('backend.quiz.alert.modal')
                        </tr>
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