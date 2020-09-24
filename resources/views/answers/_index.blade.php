
@if ($answersCount>0)
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" style="padding: 20px">
                <div class="card-title">
                    <h2>{{$answersCount}} Answers</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach ($answers as $answer)
                    <div class="row">

                        @include('shared._vote', [
                            'model'=> $answer,
                        ])

                        <div class="col s10">
                            
                            {{$answer->body}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="right-align">
                                        @can('update', $answer)
                                            <a href="{{route('question.answer.edit', [$question, $answer])}}" class="btn btn-small green">Edit</a> 
                                        @endcan
                                        @can('delete', $answer)
                                            <form class="form-delete" style="display: inline-block" action="{{route('question.answer.destroy', [$question, $answer])}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-small red" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>                                        
                                        @endcan
                                    </div>
                                </div>

                            </div>
                           
                            <div class="float-right mt-3">
                                @include('shared._author', [
                                    'model'=> $answer,
                                    'label'=> 'Answered',
                                ])
                            </div>  
                        </div>
                                          
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif