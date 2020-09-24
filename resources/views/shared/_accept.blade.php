

@can('accept', $model)
<a href="" title="Click to mark as best answer" class="d-flex align-items-center {{$answer->model}}"
    onclick="event.preventDefault(); document.getElementById('accept-answer-{{$model->id}}').submit()"
    >
    <i class="material-icons">check</i>
</a>
<form 
    action="{{route('answer.accept', $model)}}" 
    id="accept-answer-{{$model->id}}" 
    method="post"
    style="display:none;">
    @csrf
</form>
@else 
    @if ($model->is_best)
        <a href="" title="Click to mark as best answer" class="{{$model->status}}">
            <i class="material-icons">check</i>
        </a>
    @endif                            
@endcan
