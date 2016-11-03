@extends('layout')

@section('title', 'register user')

@section('body')

    <pre>
        {{ print_r($question->body) }}

        @foreach($question->tags as $tag)

            <li>{{ $tag->name }}</li>

        @endforeach

        @foreach($question->answer as $ans)

            <li>{{ $ans->body }}</li>

        @endforeach


    </pre>

    @if(Auth::check())
        {{ Auth::user()['name'] }}
        {!! Form::open(['route' => 'answers.store']) !!}


        {{ Form::hidden('user_id', Auth::user('id')['id']) }}
        {{ Form::hidden('question_id', $question->id ) }}
        {{ Form::label('body','Add your Answer') }}
        {{ Form::textarea('body', null, ['class' => '']) }}

        {{ Form::submit('Submit', ['class' => '']) }}

        {!! Form::close() !!}
    @else
        Cannot add anwser
    @endif
@endsection