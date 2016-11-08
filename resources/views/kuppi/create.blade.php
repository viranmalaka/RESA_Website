@extends('layout')

@section('body')

    {!! Form::open(['route' => 'kuppi.store']) !!}

    {{ Form::hidden('created_by', Auth::user('id')['id']) }}


    {{ Form::label('subject' , 'Subject :') }}
    {{ Form::text('subject' , isset($input) ? $input['subject'] : null, ['class' => '']) }}
    {{ isset($message) ? $message->has('subject') ? $message->first('subject'): "" : ""  }}
    <br>

    {{ Form::label('date' , 'Date :') }}
    {{ Form::date('date', \Carbon\Carbon::now()) }}
    {{ isset($message) ? $message->has('date') ? $message->first('date'): "" : ""  }}
    <br>

    {{ Form::label('time' , 'time :') }}
    {{ Form::time('time', '08:00') }}
    {{ isset($message) ? $message->has('time') ? $message->first('time'): "" : ""  }}
    <br>

    {{ Form::label('place' , 'Place :') }}
    {{ Form::text('place' , isset($input) ? $input['place'] : null, ['class' => '']) }}
    {{ isset($message) ? $message->has('place') ? $message->first('place'): "" : ""  }}

    <br>

    {{ Form::label('message' , 'Message :') }}
    {{ Form::textarea('message' , isset($input) ? $input['message'] : null, ['class' => '']) }}
    {{ isset($message) ? $message->has('message') ? $message->first('message'): "" : ""  }}
    <br>

    {{ Form::submit('Submit', ['class' => '']) }}
    {!! Form::close() !!}

@endsection