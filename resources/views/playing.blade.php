@extends('base')
@section('content')
    @foreach($questions as $ques)
        {{$ques->question}}<br>
        <input type="radio" name="option">{{$ques->option_I}}<br>
        <input type="radio" name="option">{{$ques->option_II}}<br>
        <input type="radio" name="option">{{$ques->option_III}}<br>
        <input type="radio" name="option">{{$ques->option_IV}}<br>
    @endforeach
    <div>
        
    <div>
@stop