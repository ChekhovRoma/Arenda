@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form class="mb-3 p-3 border-0" method='post' action="{{route('filterAds')}}">
            <div class="row justify-content-center">
                <select id="city" name='placeType' class="form-control col-2">
                    <option  value="">Тип помещения</option>
                    @foreach($placeTypes as $placeType)
                        <option value="{{$placeType->id}}"> {{$placeType->name}}</option>
                    @endforeach

                </select>
                <input type="text" name="name" class="col-3 form-control" placeholder="Поиск по объявлениям">
                <input type="text" name="minPrice" class=" form-control col-1" placeholder="Цена min">
                <input type="text" name="maxPrice" class="form-control col-1" placeholder="Цена max">
                <select name="orderBy" class="form-control col-2">
                    <option value="">Сортировать</option>
                    <option value="pricesAscending">Цена по возрастанию</option>
                    <option value="pricesDescending">Цена по убыванию</option>
                </select>
                <select id="city" name='city' class="form-control col-2">
                    <option value="">Населенный пункт</option>
                    <option value="Симферополь">Симферополь</option>
                    <option value="Севастополь">Севастополь</option>
                    <option value="London">Лондон</option>
                </select>
                <input type="submit" value="Поиск"  class="btn btn-primary col-1">
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        {{$ad->room->name}}, {{$ad->room->area}} м², {{$ad->room->floor}} эт.
                    </h1>
                </div>
                <div class="col-md-6">
                    <h1>
                        {{$ad->room->price}} ₽ в месяц
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            @php $img = json_decode($ad->room->photos) @endphp
                            <img class="card-img col-sm-12 " alt="Bootstrap Image Preview" src="{{asset('images/room_photos/' . $img[0] )}}" />
                        </div>
                    </div>
                    <ul>
                        <li class="list-item">
                            Lorem ipsum dolor sit amet
                        </li>
                        <li class="list-item">
                            Consectetur adipiscing elit
                        </li>
                        <li class="list-item">
                            Integer molestie lorem at massa
                        </li>
                        <li class="list-item">
                            Facilisis in pretium nisl aliquet
                        </li>
                        <li class="list-item">
                            Nulla volutpat aliquam velit
                        </li>
                        <li class="list-item">
                            Faucibus porta lacus fringilla vel
                        </li>
                        <li class="list-item">
                            Aenean sit amet erat nunc
                        </li>
                        <li class="list-item">
                            Eget porttitor lorem
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{$ad->room->description}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Расположено в : {{$ad->room->place->name}}, {{$ad->room->place->city}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Этаж: {{$ad->room->floor}}</h3>
                        </div>
                    </div></br>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            </br>
                            <h3>Контактные данные: </h3>
                        </br>

                                @php $date = $timestamp = strtotime( $ad->user->created_at) @endphp
                                <h3>Арендодатель:<p>{{$ad->user->name}}</p>  на сайте с {{date('d-M-Y', $date)}}</h3>

                            <h3>Тел: {{$ad->room->place->phone}} </h3>
                            <h3>email: {{$ad->user->email}} </h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">

        <div class="col-6">
            <p >{{$ad->room->name}}</p>
        </div>

{{--                <div class="card border-0 container ">--}}
                    <div class="card-body ">
                        <div class="row justify-content-center">
                            <img style="width: 18rem;" class="card-img col-sm-12 col-md-4" src="https://shopandmall.ru/foto/logo/gb_653aaab2d08dc4ca7af2a44f1efd29c4.jpg" alt="{{$ad->room->name}}">
                            <div class="row col-sm-12 col-md-8 ">
                                <a href="home.blade.php" class="card-title col-md-12 stretched-link h4">{{$ad->room->name}}</a>
                                <p class="card-text col-md-12">{{$ad->room->description}}</p>
                                <p class="card-text col-md-12">Цена в месяц: {{$ad->room->price}}</p>
                                <p class="card-text col-md-12">Площадь: {{$ad->room->area}}</p>
                                <ul class="list-group list-group-flush align-content-around">
                                    <li class="list-group-item">Расположено в : {{ $ad->room->place->name }}</li>
                                    <li class="list-group-item">Адрес: {{ $ad->room->place->address }}</li>
                                    <li class="list-group-item">Время работы: {{ $ad->room->place->open_at }} - {{ $ad->room->place->closed_at }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="container mt-3">
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
