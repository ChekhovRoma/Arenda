@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <form class="mb-3 p-3 border-0" method='post' action="{{route('filter')}}">
            <div class="row justify-content-center">
                <select id="city" name='placeType' class="form-control col-2">
                    <option disabled selected>Тип помещения</option>
                    <option value="Симферополь">Торговый центр</option>
                    <option value="Севастополь">Коммерческая недвижимость</option>
                </select>
                <input type="text" name="name" class="col-7 form-control" placeholder="Поиск по объявлениям">
                <select id="city" name='city' class="form-control col-2">
                    <option disabled selected>Населенный пункт</option>
                    <option value="Симферополь">Симферополь</option>
                    <option value="Севастополь">Севастополь</option>
                </select>
                <input type="submit" value="Поиск" class="btn btn-primary col-1">
{{--                <div class="col-1 dropdown">--}}
{{--                    --}}
{{--                    <div class="btn-group">--}}
{{--                        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Ещё--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right">--}}
{{--                            <button class="dropdown-item" type="button">Another action</button>--}}
{{--                            <button class="dropdown-item" type="button">Something else here</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="row justify-content-center">

            </div>
        </form>
    <div class="row justify-content-center">
        @foreach($ads as $ad)
            <div class="card border-0 container ">
                <div class="card-body ">
                    <div class="row justify-content-center">
                        <img style="width: 18rem;" class="card-img col-sm-12 col-md-4" src="https://shopandmall.ru/foto/logo/gb_653aaab2d08dc4ca7af2a44f1efd29c4.jpg" alt="{{$ad->place->name}}">
                        <div class="row col-sm-12 col-md-8 ">
                            <a href="home.blade.php" class="card-title col-md-12 stretched-link h4">{{$ad->place->name}}</a>
                            <p class="card-text col-md-12">{{$ad->place->description}}</p>
                            <ul class="list-group list-group-flush align-content-around">
                                <li class="list-group-item">Адрес: {{ $ad->place->address }}</li>
                                <li class="list-group-item">Время работы: {{ $ad->place->open_at }} - {{ $ad->place->closed_at }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        <div class="container mt-3">
            <div class="row justify-content-center">
                {{ $ads->links() }}
            </div>
        </div>
    </div>
{{--    <div class="card ml-2 mr-2" style="width: 18rem;">--}}
{{--        <img class="card-img-top" src="https://shopandmall.ru/foto/logo/gb_653aaab2d08dc4ca7af2a44f1efd29c4.jpg" alt="Card image cap">--}}
{{--        <div class="card-body">--}}
{{--            <h3 class="card-title">{{ $ad->place->name }}</h3>--}}
{{--            <p class="card-text">{{ $ad->place->description }}</p>--}}
{{--        </div>--}}
{{--        <ul class="list-group list-group-flush">--}}
{{--            <li class="list-group-item">Адрес: {{ $ad->place->address }}</li>--}}
{{--            <li class="list-group-item">--}}
{{--                <a href = 'tel:{{ $ad->place->phone }}'></a>Телефон: {{ $ad->place->phone }}</li>--}}
{{--            <li class="list-group-item">Время работы: {{ $ad->place->open_at }} - {{ $ad->place->closed_at }}</li>--}}
{{--        </ul>--}}
{{--        <div class="card-body">--}}
{{--            <a href="{{ 'ad/'.$ad->id }}" class="btn btn-primary card-link">Подробнее</a>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
@endsection
