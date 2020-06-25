@extends('layouts.app')

@section('content')
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width='720' height='720' viewBox="0,0,788.07813,720">
        @if ($schema->paths) {!! $schema->paths !!}
        @else
            <h2 class="align-center">Похоже, что схема к данному помещению не создана или не завершена</h2>
        @endif
        @if ($schema->rooms) {!! $schema->rooms !!} @endif
        @if ($schema->doors) {!! $schema->doors !!} @endif
        @if ($schema->windows) {!! $schema->windows !!} @endif
    </svg>
    <button id="example" type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
        Tooltip with HTML
    </button>
@endsection
