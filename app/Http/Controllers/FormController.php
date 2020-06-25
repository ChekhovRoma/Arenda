<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FieldRequest;
use Mpdf\Mpdf;
use phpDocumentor\Reflection\File;


class FormController extends Controller
{
    public function authUser()
    {
        if($_POST['login'] == "lera" && $_POST['password'] == "12345"){
            return 'token: ' . 'ea135929105c4f29a0f5117d2960926f';
        }
        return 'errors';
    }

    public function getUsers()
    {
        if($_POST['id'] == 23) {
            return "УДАЛИЛ ДОЛБАЕБА НОМЕР - " . $_POST['id'];
        }
            return 'error';
    }

    public function create()
    {


        $mpdf = new Mpdf();
        $name = "SEVAKkkkkkkkkkkkkk ";
        $sex = "atacking helicoppter";
        $sex2 = "Moto-Moto";
        $name1 = "SEVAKkkkkkkkkkkkkk ";


            $test = '
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
    $(document).ready(function(){
        console.log($(document));
    }
</script>
<div>
    <p>
        <strong> </strong>
    </p>
    <p align="right">
        Приложение №__
    </p>
    <p align="right">
        к договору аренды
    </p>
    <p align="right">
        №____ от «__» _______ 20__ года
    </p>
    <p>
        <strong> </strong>
    </p>
    <p>
        <strong> </strong>
    </p>
</div>
<div >
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin-top: -50px;" width="750" height="750" viewBox="0,0,788.07813,720">

                <g xmlns="http://www.w3.org/2000/svg" id="paths" fill="none" fill-rule="nonzero" stroke="#000000" stroke-width="none" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M50,700v-650h650v650z" id="area" stroke-width="5"></path><path d="M419,50v220.00227" stroke-width="3"></path><path d="M419,270.00227v154.206" stroke-width="3"></path><path d="M419,424.20827h125.71782" stroke-width="3"></path><path d="M544.71782,424.20827v105.43114" stroke-width="3"></path><path d="M544.71782,529.63942l155.28218,0z" stroke-width="3"></path></g>
                <g xmlns="http://www.w3.org/2000/svg" fill="#008000" fill-rule="nonzero" stroke="#000000" stroke-width="0" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M419,50h281v479.63942l-155.28218,0v-105.43114h-125.71782z" id="room0" opacity="0.5" fill="red"></path></g>
                </svg>
</div>
<div style="width: 45%; float: left ">
    <div style="margin-left: 50%">
        <strong>Арендодатель</strong>
    </div>
    <div style="margin-left: 35%">
        <p>
            ______________________________
        </p>
        <p>
            ______________________________
        <div >
            <p>
                <strong></strong>
                _________________ <strong> (__________) </strong>
            <p style="margin-left: 31%">
                Подпись
            </p>
            </p>
        </div>
    </div>
</div>
<div style="width: 45%;  float: left">
    <div style="margin-left: 50%">
        <strong>Арендатор</strong>
    </div>
    <div style="margin-left: 35%">
        <p>
            ______________________________
        </p>
        <p>
            ______________________________
        </p>
        
        <div >
            <p>
                <strong></strong>
                _________________ <strong> (__________) </strong>
            <p style="margin-left: 31%">
                Подпись
            </p>
            </p>
        </div>
    </div>
</div>';

        $mpdf->WriteHTML($test);
        $mpdf->Output("test.pdf" );
    }

    public function store(FieldRequest $request)
    {
        $validatedData = $request->validated();
         \App\Form::create($validatedData);

       // return response()->json('Данные сохранены успешно');
        return response()->json('Данные сохранены успешно');
    }


}
