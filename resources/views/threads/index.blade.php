@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @forelse ($threads as $thread)
            <div class="media">
                <div class="media-body">
                    <div class="level">
                        <h4 class="flex">
                            <a href="{{ $thread->path() }}">
                                {{ $thread->title }}
                            </a>
                        </h4>
                        
                        <a href="{{ $thread->path() }}">
                            <strong>
                                {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
                            </strong>
                        </a>
                    </div>
                    
                    {{ $thread->body }}
                </div>
            </div>
            <hr>

            @empty
                <p>Threre are no relevant results at this time.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection