@extends('layout')

@section('body')
    
    School {{ $seminar['school'] }}<br>
    date {{ $seminar['date'] }}<br>
    Description {{ $seminar['description'] }}<br>
    
    @foreach($pics as $pic)

        <img src="/image/seminar/{{ $pic->pic }}" alt="">

        <br>

    @endforeach


@endsection