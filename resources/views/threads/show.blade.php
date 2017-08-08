@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">
                            {{$thread->creator->name}}
                        </a> posted:
                        {{$thread->title}}
                    </div>

                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
        @if(auth()->check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{$thread->path() . '/replies'}}" method="post" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="body"></label>
                            <textarea name="body" id="body" class="form-control" placeholder="Have Something to say?" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Reply</button>
                    </form>
                </div>
            </div>
        @else
            <p class="text-center">Please <a href="{{route('login')}}">Sign In</a> in order to participate in discussion</p>

        @endif
    </div>
@endsection
