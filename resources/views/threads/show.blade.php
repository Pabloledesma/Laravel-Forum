@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="media">
                <div class="media-body">
                    
                    <h4> <a href="#">{{$thread->creator->name}}</a> posted: {{ $thread->title }}</h4>
                    {{ $thread->body }}
                
                    <ul class="list-unstyled">
                        @foreach($thread->replies as $reply)
                           @include('threads.reply')
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection