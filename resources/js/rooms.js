import $ from 'jquery'
import formValidator from 'jquery-validation'
let name;
let roomCounter;
$(document).ready(function () {
   let rooms = $('path[id^=room]');
   let readyRooms = 0;
   roomCounter = rooms.length;
   console.log(roomCounter);
   rooms.attr('fill', 'red');
   rooms.click(function (event) {
      if ($(this).attr('fill') === 'red') {
         getInfoAboutRoom($(this).attr('id'));
         $(this).attr('fill', 'yellow');
         name = $(this).attr('id');
         $('#roomCreator').modal('show');
         $('#roomCreator').on('hidden.bs.modal', () => {
            $(this).attr('fill', 'green');
            readyRooms = $('path[fill="green"]').length;
            if (readyRooms === roomCounter) {
               $('#btnPosition').append('<button class="btn btn-primary justify-content-center" onclick=window.location.replace("/home");>Опубликовать!</button>');
            }
         });
      }
   });
});

async function fetchRoom (data) {
   fetch('/saveRoom',{
      method: 'POST',
      mode: "cors",
      body: data
   })
   .then(response => response.json())
   .then(body => {
      return body;
   })
}

async function getInfoAboutRoom (id) {
   return fetch("/getInfoAboutRoom", {
      crossDomain: true,
      method: 'POST',
      mode: 'cors',
      headers: {
         'Content-Type': 'application/json',
      },

      body: JSON.stringify({
         'name': id,
      })
   })
       .then(response => response.json())
       .then(body => {
          if (body === 0){
             $("input[name='area']").val("");
             $("input[name='price']").val("");
             $("input[name='floor']").val("");
          }
          else {
             $("input[name='area']").val(body.area);
             $("input[name='price']").val(body.price);
             $("input[name='floor']").val(body.floor);
             body.description? $("#description").val(body.description) : $("#description").val("");

          }
       })
}

// validation
$(function() {
   $("form[name='addRoom']").validate({
      rules: {
         area: {
            required: true,
            number: true,
            normalizer: function (value) {
               return value.replace(/ /g,'');
            }
         },
         price: {
            required: true,
            number: true,
            normalizer: function (value) {
               return value.replace(/ /g,'');
            }
         }
      },
      messages: {
         area: {
            required: "Введите площадь",
            number: "Некорректная площадь (Например: 24 или 25.6)"
         },
         price: {
            required: "Введите стоимость аренды помещения (в месяц)",
            number: "Некорректная стоимость"
         }

      },
      submitHandler: function(form) {
         let formData = new FormData();
         let fileList = $('#photos').get(0).files;
         console.log($('#photos').get(0).files);
         if (fileList.length > 0) {
            for (let i = 0; i < fileList.length; i++) {
               formData.append('photos[]', fileList[i]);
            }
         }
         formData.append ('name', name);
         formData.append ('area', $("input[name='area']").val());
         formData.append ('placeId', $('#placeId').val());
         formData.append ('price', $("input[name='price']").val().replace(/ /g,''));
         formData.append ('floor', $("input[name='floor']").val()? $("input[name='floor']").val(): 1);
         formData.append('description', $("#description").val()? $("#description").val(): "");
         fetchRoom(formData);
         $('#roomCreator').modal('hide');
      }
   });

   $.validator.methods.email = function( value, element ) {
      return this.optional( element ) || /[a-z]+@[a-z]+\.[a-z]+/.test( value );
   }

   $('form[name="addPlace"]').validate({
      rules: {
         name: {
            required: true
         },
         address: {
            required: true
         },
         phone: {
            required: true,
         },
         floors_num: {
            required: true,
            number: true
         },
         rooms_num: {
            required: true,
            number: true
         }
      },
      messages: {
         name: {
            required: 'Название обязательно'
         },
         address: {
            required: 'Адрес обязателен'
         },
         phone: {
            required: 'Номер обязателен',
         },
         floors_num: {
            required: 'Обязательное поле',
            number: 'Введите число'
         },
         rooms_num: {
            required: 'Обязательное поле',
            number: 'Введите число'
         }
      }
   });
});
