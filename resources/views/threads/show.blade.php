@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="media">
                <div class="media-body">
                    
                    <h4>{{ $thread->title }}</h4>
                    {{ $thread->body }}
                
                    <ul class="list-unstyled">
                        @foreach($thread->replies as $reply)
                            <li class="media mt-3">
                                <div class="media-body">
                                    <h5><a href="#">{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}</h5>
                                    {{ $reply->body }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection