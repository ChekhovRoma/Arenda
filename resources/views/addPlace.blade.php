<!-- create.blade.php -->

@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Создание обьявления
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
            <form method="post" enctype="multipart/form-data" action="{{ route('place.save') }}" >
                <div class="form-group">
                    @csrf
                    <label for="name">Название помещения:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="city">Город :</label>
                    <input type="text" class="form-control" name="city"/>
                </div>
                <div class="form-group">
                    <label for="address">Адрес :</label>
                    <input type="text" class="form-control" name="address"/>
                </div>
                <div class="form-group">
                    <label for="place_type_id">Тип помещения :</label>
                    <input type="text" class="form-control" name="place_type_id"/>
                </div>
                <div class="form-group">
                    <label for="floor_num">Количество этажей :</label>
                    <input type="text" class="form-control" name="floors_num"/>
                </div>
                <div class="form-group">
                    <label for="rooms_num">Количество комнат :</label>
                    <input type="text" class="form-control" name="rooms_num"/>
                </div>
                <div class="form-group">
                    <label for="phone">Контактный телефон :</label>
                    <input type="text" class="form-control" name="phone"/>
                </div>
                <div class="form-group">
                    <label for="description">Описание :</label>
                    <input type="text" class="form-control" name="description"/>
                </div>
                <div class="form-group">
                    <label for="photos">Фото :</label>
                    <input type="file" class="form-control" name="photos[]" multiple />
                </div>
                <button type="submit" class="btn btn-primary">Create Item</button>
            </form>
        </div>
    </div>
@endsection
