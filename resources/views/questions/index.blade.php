@extends('layouts.main')

@section('content')
 <style>
     .question{
         border: 1px solid lightgrey;
         padding: 20px;
     }
     .counters{
        display: flex;
        flex-direction: row;
        font-size: 20px;
     }
     .counters>div{
         padding: 10px;
     }
 </style>
<div class="container">
    <div class="card" style="margin-top: 10px; padding: 20px; ">
        <div class="">
            <h3>All Questions <a class="btn btn-small right-align" href="{{route('question.create')}}">Ask Question</a></h3>
            
        </div>
        @forelse ($questions as $question)
            <div class="row">
                <div class="col">
                    <div class="row question">
                        <div class="col">
                            <div class="">
                                <h4 class=""><a href="{{$question->url}}">{{$question->title}}</a></h4>
                            </div>
                            
                            <p class="lead">
                                Asked By
                                    <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                    <small class="text-muted">{{$question->created_date}}</small>
                            </p>
                            <div class="counters">
                                <div class="views">
                                    {{$question->views}} {{ __('view') }}
                                </div>
                                <div class="status {{$question->status}}">
                                    <strong>{{$question->answer}}</strong> {{ __('answers') }}
                                </div>
                                <div class="votes">
                                   <strong> {{$question->votes_count}}</strong> {{ __('votes') }}
                                </div>
                            </div>
                            {{print($question->question_body)}}
                            <div class="right-align">
                                @can('update', $question)
                                    <a href="{{route('question.edit', $question)}}" class="btn btn-small">Edit</a> 
                                @endcan
                                @can('delete', $question)
                                 <button type="submit" class="btn btn-small orange" onclick="document.getElementById('delete-question-form').submit(); return confirm('Are you sure?')">Delete</button>                           
                                @endcan
                                <form class="form-delete" id="delete-question-form" action="{{route('question.destroy', $question)}}" method="post" style="display: none;">
                                    @csrf
                                    @method("DELETE")
                                    
                                </form>
                            </div>
                    </div>
                </div>
                    
                </div>
                @empty
                    <p>Sorry! there is no Quetions Available</p>
                @endforelse
            </div>
    
    
    
           
    
    
    
    
    
    
    
    
    
    
    
    
        {{-- <div class="row justify-content-center">
            <div class="col m12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>{{ __('All Questions') }}</h2>
                            <div class="ml-auto">
                                <a href="{{route('question.create')}}">Ask Question</a>
                            </div>
        
                        </div>
                        
                    </div>
    
                    <div class="card-body">
                        @include('layouts._messages')
    
                       @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="views">
                                    {{$question->views}} {{ __('view') }}
                                </div>
                                <div class="status {{$question->status}}">
                                    <strong>{{$question->answers_count}}</strong> {{ __('answers') }}
                                </div>
                                <div class="votes">
                                   <strong> {{$question->votes_count}}</strong> {{ __('votes') }}
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                    <div class="ml-auto">
                                        @can('update', $question)
                                            <a href="{{route('question.edit', $question)}}" class="btn btn-sm btn-outline-info">Edit</a> 
                                        @endcan
                                        @can('delete', $question)
                                            <form class="form-delete" action="{{route('question.destroy', $question)}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>                                        
                                        @endcan
                                    </div>
                                </div>
                                <p class="lead">
                                    Asked By
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        <small class="text-muted">{{$question->created_date}}</small>
                                </p>
                                {{$question->body}}
                            </div>
                        </div>
                       @endforeach
                       <div class="pagination center-align">
                            {{$questions->links()}}
                       </div>
                    </div>
    
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
