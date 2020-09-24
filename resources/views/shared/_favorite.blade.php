

<a href="" title="Click to mark as a favorite question" 
    class="d-flex align-items-center favorite {{Auth::guest() ? 'off':($model->is_favorited ? 'favorited':'')}}"
    onclick="event.preventDefault(); document.getElementById('favorite-question-{{$model->id}}').submit()">

    <i class="material-icons small">favorite_border</i>
</a>
<form 
    action="/question/favorites/{{$model->id}}" 
    id="favorite-question-{{$model->id}}" 
    method="post"
    style="display:none;">
    @csrf
    @if ($model->is_favorited)
        @method("DELETE");
    @else
        @method('POST')
    @endif
</form>
<span class="favorite-count">{{$model->favorites_count}}</span>