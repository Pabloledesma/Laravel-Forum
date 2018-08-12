@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="media">
                <div class="media-body">
                    
                    <div class="level">
                        <h4 class="flex"> 
                            <a href="/profiles/{{ $thread->creator->name }}">
                                {{$thread->creator->name}}
                            </a> 
                            posted: {{ $thread->title }}
                        </h4>

                        @if(Auth::check())
                        <form action="{{ $thread->path() }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-link">Delete Thread</button>
                        </form>
                        @endif
                    
                    </div>

                    {{ $thread->body }}
                
                    <ul class="list-unstyled">
                        @foreach($thread->replies as $reply)
                           @include('threads.reply')
                        @endforeach
                    </ul>
                </div>
            </div>

            {{ $replies->links() }}

            @if(auth()->check())
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
            @else
                <p>Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
            @endif

        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        This thread was published {{ $thread->created_at->diffForHumans() }}
                        by <a href="#">{{ $thread->creator->name }}</a>, and currently has 
                        {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection