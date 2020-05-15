<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактор схемы</title>

</head>
<body>
<div id="helper" class="alert alert-success" role="alert">
    <!--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
    <!--            <span aria-hidden="true">&times;</span>-->
    <!--        </button>-->
    <h4 id="helperText" class="align-center">Нарисуйте стены без учета окон и дверей, затем нажмите далее</h4>
</div>


<div class="container-fluid justify-content-center">
    <div class="row">
        <canvas class="col-lg-7 col-md-8 col-sm-12 border border-top-0" style="margin-left:50px; margin-top:10px" id="canvas" resize></canvas>
        <div class="col-lg-3 col-md-12 justify-content-right">
            <div class="row">
                <button id="nextStage" class="btn btn-primary mt-2 col-12">Далее</button>
                <button id="previousStage" class="btn btn-warning mt-2 col-12">Назад</button>
                <button id="eraserBtn" class="btn btn-warning mt-2 col-12">Стерка</button>
                <!--                    <a href="#" class="btn btn-info text-align-bottom mt-2 col-12" onclick="app.lines.activate(); return false;">Lines</a>-->
                <!--                    <a href="#" onclick="app.rooms.activate(); return false;">Lines</a> <br>-->
                <button id="deleteProgressBtn" class="btn btn-danger text-align-bottom mt-5 col-12">Новая схема</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<!--    <div class="modal fade d-none" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    ...-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary">Understood</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<div class="modal fade" id="schemaCreator" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="staticBackdropLabel">Введите размеры помещения или Id</h5>
            </div>
            <div class="modal-body">
                <div class="container align-content-center align-self-center">
                    <div class="form-group row justify-content-md-center" id="settings">
                        <label for="x" class="col-form-label col-4">Ширина, м</label>
                        <input type="text" placeholder="Length" id="x" class="col-5 form-control mb-2">
                        <label for="y" class="col-form-label col-4">Высота, м</label>
                        <input type="text" placeholder="Width" id="y" class="col-5 form-control">
                        <label for="placeId" class="col-form-label col-4">ID помещения</label>
                        <input type="text" placeholder="ID" id="placeId" class="col-5 form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" id="beginPainting">Создать</button>
                <button type="button" class="btn btn-primary" id="loadSchema">Загрузить Схему</button>
            </div>
        </div>
    </div>
</div>
<!--    <div class="modal" tabindex="-1" role="dialog" id="addRoomModal">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title">Обнаружено новое помещение!</h5>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <p>Данное помещение будет сдаваться?</p>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-primary" id="confirmNewRoom">Да</button>-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<script src="{{ asset('js/main.js') }}" type="text/js"></script>
</body>
</html>
