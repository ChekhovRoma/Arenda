<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактор схемы</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="helper" class="alert alert-success" role="alert">
    <!--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
    <!--            <span aria-hidden="true">&times;</span>-->
    <!--        </button>-->
    <h4 id="helperText" class="align-center">Заполните информацию о всех помещениях, которые будут сданы в аренду.</h4>
</div>

    <div class="container">
        <div class="text-center" id="btnPosition">
        </div>
        <div class="row justify-content-center">
            <div>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width='720' height='720' viewBox="0,0,788.07813,720">
                    @if ($schema->paths) {!! $schema->paths !!}
                    @else
                        <h2 class="align-center">Похоже, что схема к данному помещению не создана или не завершена</h2>
                    @endif
                    @if ($schema->rooms) {!! $schema->rooms !!} @endif
                    @if ($schema->doors) {!! $schema->doors !!} @endif
                    @if ($schema->windows) {!! $schema->windows !!} @endif
                </svg>
            </div>
        </div>
    </div>
    <div class="modal fade" id="roomCreator" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="staticBackdropLabel">Введите информацию о выбранном помещении</h5>
                </div>
                <input type="hidden" value="{{ $schema->place_id }}" id="placeId">
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <div class="container align-content-center align-self-center">
                        <form name="addRoom" method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group row justify-content-md-center" id="settings">
                                <div class="form-group col-12 justify-content-center">
                                    <label for="roomArea">Площадь в м2 <span style="color: red">*</span></label>
                                    <input id="roomArea" type="text" class="form-control" name="area" required />
                                </div>
                                <div class="form-group col-12">
                                    <label for="price">Стоимость аренды (в месяц)<span style="color: red">*</span></label>
                                    <input type="text" class="form-control " name="price" required id="price"/>
                                </div>
                                <div class="form-group col-12">
                                    <label for="floor">Этаж</label>
                                    <input type="number" class="form-control " name="floor" id="floor"/>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description">Описание :</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Опишите помещение" id="description"></textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="photos">Фото :</label>
                                    <input id="photos" type="file" class="form-control" name="photos[]" multiple />
                                </div>
                                <button type="submit" id="roomFormSubmit" class="btn btn-primary ">Создать</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/room.js') }}"></script>
</body>
</html>
