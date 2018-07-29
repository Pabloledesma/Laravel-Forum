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
    @if(auth()->check())
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ $thread->path() . '/replies' }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <textarea 
                        name="body" 
                        id="body" 
                        class="form-control"
                        rows="5" 
                        placeholder="Have something to say?"></textarea>
                </div>

                <button type="submit" class="btn btn-default">Post</button>
            </form>
        </div>
    </div>
    @else
        <p>Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
    @endif
</div>
@endsection