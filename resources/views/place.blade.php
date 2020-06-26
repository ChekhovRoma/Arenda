@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width='720' height='720'
                     viewBox="0,0,788.07813,720">
                    @if ($schema->paths) {!! $schema->paths !!}
                    @else
                        <h2 class="align-center">Похоже, что схема к данному помещению не создана или не завершена</h2>
                    @endif
                    @if ($schema->rooms) {!! $schema->rooms !!} @endif
                    @if ($schema->doors) {!! $schema->doors !!} @endif
                    @if ($schema->windows) {!! $schema->windows !!} @endif
                </svg>
            </div>
            <div class="col-sm-10 col-md-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h1>{{$place->name}}</h1>
                        </div>
                        <div class="col-12 mb-5">
                            <a class="btn btn-primary" href="tel: {{$place->phone}}">{{$place->phone}} {{$user->name}}</a>
                        </div>
                        <div class="col-12">
                            <h3>{{$place->city}}</h3>
                        </div>
                        <div class="col-12 mb-5">
                            <h3>{{$place->address}}</h3>
                        </div>
                        @if ($place->description)
                            <div class="col-12 mb-5">
                                <p>{{$place->description}}</p>
                            </div>
                        @endif
                        @if (Auth::id() === $user->id)
                            <div class="col-12 mt-5">
                                <a class="btn btn-warning" href="/editor/{{$place->id}}">Изменить схему</a>
                                <a class="btn btn-warning" href="/addRooms/{{$place->id}}">Изменить информацию</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
