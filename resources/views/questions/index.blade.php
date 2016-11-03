@extends('layout')

@section('body')

    <ul>
    @foreach($questions as $que)

        <li>Title : {{ $que->title }}</li>
        <li>body : {{ $que->body }}</li>

            <br>
    @endforeach
    </ul>
@endsection