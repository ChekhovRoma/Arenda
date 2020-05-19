@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Создание объявления</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 col-md-3 col-lg-4"></div>
                    <form class="row col-sm-10 col-md-6 col-lg-4 justify-content-center" method="post" enctype="multipart/form-data" action="{{ route('place.save') }}" >
                        <div class="form-group col-12 justify-content-center">
                            @csrf
                            <label for="name">Название помещения:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group col-12">
                            <label for="city">Город :</label>
                            <input type="text" class="form-control " name="city"/>
                        </div>
                        <div class="form-group col-12">
                            <label for="address">Адрес :</label>
                            <input type="text" class="form-control " name="address"/>
                        </div>
                        <div class="form-group col-12">
                            <label for="place_type_id">Тип помещения :</label>
                            <select name="place_type_id" class="form-control col-12">
                                @foreach($placeTypes as $placeType)
                                    <option value="{{$placeType->id}}">{{$placeType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="floor_num">Количество этажей :</label>
                            <input type="number" class="form-control" name="floors_num"/>
                        </div>
                        <div class="form-group col-6">
                            <label for="rooms_num">Количество комнат :</label>
                            <input type="number" class="form-control" name="rooms_num"/>
                        </div>
                        <div class="form-group col-12">
                            <label for="phone">Контактный телефон :</label>
                            <input type="text" class="form-control" name="phone" placeholder="+7988888888"/>
                        </div>
                        <div class="form-group col-12">
                            <label for="description">Описание :</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Опишите помещение"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label for="photos">Фото :</label>
                            <input type="file" class="form-control" name="photos[]" multiple />
                        </div>
                        <button type="submit" class="btn btn-primary ">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
