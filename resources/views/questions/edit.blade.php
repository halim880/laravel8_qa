@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding: 20px">
                
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('Edit Question') }}</h2>
                        <div class="ml-auto">
                            <a href="{{route('question.index')}}">Back to Question</a>
                        </div>
    
                    </div>
                    
                </div>

                <div class="card-body">
                   <form action="{{route('question.update', $question)}}" method="post" class="form">
                    {{method_field('PUT')}}
                        @include('questions._form')
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
