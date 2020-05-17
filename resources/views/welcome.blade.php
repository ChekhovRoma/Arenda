@extends('layouts.app')
@section('content')
<div class="container">
        <form class="mb-3 p-3 border border-info" method='post' action="{{route('filter')}}">
            <div class="row justify-content-center">
                <input type="text" name="name" class="col-10 form-control" placeholder="Вводите название помещения здесь">
                <div class="col-1 dropdown">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ещё
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2 ml-3">
                <div class="col-4">
                    <label for="city" class="col-form-label">Город: </label>
                    <select id="city" name='city' class="form-control-sm">
                        <option value="Симферополь">Симферополь</option>
                        <option value="Севастополь">Севастополь</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" value="Поиск" class="btn btn-primary col-4">
            </div>
        </form>
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
                </div>
            </div>
        @endforeach
        <div class="container mt-3">
            <div class="row justify-content-center">
                {{ $ads->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
