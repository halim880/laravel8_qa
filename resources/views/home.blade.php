
@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>{{Auth::user()->questions[0]->title}}</h1>
        <p>{{Auth::user()->questions[0]->body}}</p>
    </div>
@endsection