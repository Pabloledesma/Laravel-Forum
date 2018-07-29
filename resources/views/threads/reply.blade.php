<li class="media mt-3">
    <div class="media-body">
        <h5><a href="#">{{ $reply->owner->name }}</a> 
        said {{ $reply->created_at->diffForHumans() }}</h5>
        {{ $reply->body }}
    </div>
</li>