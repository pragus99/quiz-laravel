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
        <div class="module">
            <div class="module-head">

            </div>
            <div class="module-body">
                <h3 class="heading">{{ $question->question }}</h3>
                <div class="module-body table">
                    <table class="table table-message">
                        <tbody>
                            @foreach ($question->answers as $key=>$answer)


                            <tr class="read">
                                <td class="cell-author hidden-phone hidden-tablet">
                                    {{ $key+1 }}. {{ $answer->answer }}
                                    @if ($answer->is_correct)
                                    <span class="badge badge-success pull-right">Correct</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="module-foot">
                    <a href="{{ route('question.edit', [$question->id] )}}">
                        <button class="btn btn-primary"> Edit </button>
                    </a>
                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal"
                        data-target="#exampleModal{{ $question->id }}">
                        Delete
                    </button>
                    @include('backend.question.alert.modal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection