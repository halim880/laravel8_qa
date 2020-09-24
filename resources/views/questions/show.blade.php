@extends('layouts.main')

@section('content')
<style>
    
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="padding: 20px;">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h2>{{$question->title}}</h2>
                            <div class="ml-auto">
                                <a href="{{route('question.index')}}">Goto Questions</a>
                            </div>        
                        </div>
                    </div>
                    <hr>
    
                    <div class="row">
                        
                        @include('shared._vote', [
                            'model'=>$question,
                        ])

                        <div class="col s10 m9 l9">
                            {!! $question->body !!}
                            <div class="right-align">
                                @include('shared._author', [
                                    'model'=> $question,
                                    'label'=> "Asked",
                                ])
                            </div> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('answers._index', [
        'answers'=> $question->answers,
        'answersCount'=> $question->answer,
    ])
    @include('answers._create')
</div>
@endsection
