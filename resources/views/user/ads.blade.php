@extends('layouts.app')

@section('content')
    @if(!$ads)
        <div class="container justify-content-center d-flex">
            <div class="row justify-content-center">
                <h2 class="col-9 mb-5 text-center">Похоже, что у вас нет объявлений</h2>
                <a class="col-4 btn btn-primary text-white" href="{{route('create-ad')}}">Давайте его создадим</a>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row justify-content-center">
        @foreach($ads as $ad)
            <div class="card ml-2 mr-2" style="width: 18rem;">
                <img class="card-img-top" src="https://shopandmall.ru/foto/logo/gb_653aaab2d08dc4ca7af2a44f1efd29c4.jpg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{ $ad->place->name }}</h3>
                    <p class="card-text">{{ $ad->place->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Адрес: {{ $ad->place->address }}</li>
                    <li class="list-group-item">
                        <a href = 'tel:{{ $ad->place->phone }}'></a>Телефон: {{ $ad->place->phone }}</li>
                    <li class="list-group-item">Время работы: {{ $ad->place->open_at }} - {{ $ad->place->closed_at }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ 'ad/'.$ad->id }}" class="btn btn-primary card-link">Подробнее</a>
                    <a href="{{ 'ad/'.$ad->id }}" class="btn btn-warning card-link">Изменить</a>
                </div>
            </div>
        @endforeach
            </div>
        </div>
    @endif
@endsection
