

@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="padding: 20px">
                        <div class="card-title">
                            <h2>Editing Answer for Question : {{$question->title}}</h2>
                        </div>
                        <hr>
                        <form action="{{route('question.answer.update', [$question, $answer])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea" name="body">{{$answer->body}}</textarea>
                                <label for="textarea1">Edit Answer</label>
                              </div>

                                <button type="submit" class="btn orange">Update answer</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
