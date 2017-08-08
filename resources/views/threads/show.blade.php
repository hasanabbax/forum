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
                    <form action="{{$thread->}}" method="post" role="form">
                        <legend>Form Title</legend>

                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" class="form-control" name="" id="" placeholder="Input...">
                        </div>

                        

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
