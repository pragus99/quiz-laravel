@extends('backend.layouts.master')

@section('title', 'All question')

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
                <h3>All Questions</h3>
            </div>
            <div class="module-body">
                @if (count($questions)>0)
                <table class="table table-striped">
                    <thead class="thead">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Quiz</th>
                            <th scope="col">Created</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $key=>$question)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $question->question }}</td>
                            <td>{{ $question->quiz->name }}</td>
                            <td>{{ date('d F, Y', strtotime($question->created_at)) }}</td>
                            <td>
                                <a href="{{route('question.show', [$question->id])}}">
                                    <button class="btn btn-info">View</button>
                                </a> --|--
                                <a href="{{ route('question.edit', [$question->id] )}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a> --|--
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $question->id }}">
                                    Delete
                                </button>
                            </td>
                            @include('backend.question.alert.modal')
                        </tr>
                        @endforeach
                        @else
                        <td>There no Question</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination pagination-centered">
            {{ $questions->links() }}
        </div>
    </div>
</div>
@endsection