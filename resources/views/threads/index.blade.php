@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach ($threads as $thread)
            <div class="media">
                <div class="media-body">
                    <h4>
                        <a href="{{ $thread->path() }}">
                            {{ $thread->title }}
                        </a>
                    </h4>
                    
                    {{ $thread->body }}
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection