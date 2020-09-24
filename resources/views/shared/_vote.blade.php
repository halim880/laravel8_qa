
@if ($model instanceof App\Models\Question)
    @php
        $name = 'question';
        $firstURI = 'question';
    @endphp
@elseif($model instanceof App\Models\Answer)
    @php
        $name = 'answer';
        $firstURI = 'answer';
    @endphp
@endif

@php
    $formId = $name. '-' .$model->id;
    $formAction = $firstURI.'/vote/'.$model->id;
@endphp



<div class="col s2 m2 l2 vote-controls">
    <a href="" title="This is a useful {{$name}}" 
        onclick="event.preventDefault(); document.getElementById('up_vote-{{$formId}}').submit()"
        class="vote-up {{Auth::guest() ? 'off':''}}">
        <i class="material-icons medium">keyboard_arrow_up</i>
    </a>
    <span class="votes-count">{{$model->votes_count}} votes</span>
    <a href="" title="This is not useful" class="vote-down {{Auth::guest() ? 'off':''}}"
        onclick="event.preventDefault(); document.getElementById('down_vote-{{$formId}}').submit()"
    >
        <i class="material-icons medium">keyboard_arrow_down</i>
    </a>
    
    <form 
        action="/{{$formAction}}" 
        id="up_vote-{{$formId}}" 
        method="post"
        style="display:none;"> 
        @csrf
        @method('POST')
        <input type="hidden" name="vote" value="1">
    </form>
    <form 
        action="/{{$formAction}}" 
        id="down_vote-{{$formId}}" 
        method="post"
        style="display:none;">
        @csrf
        @method('POST')
        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model instanceof App\Models\Question)
        @include('shared._favorite', $model)
    @elseif($model instanceof App\Models\Answer)
        @include('shared._accept')
    @endif
</div>