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
         $(this).attr('fill', 'yellow');
         name = $(this).attr('id');
         $('#roomCreator').modal('show');
         $('#roomCreator').on('hidden.bs.modal', () => {
            $(this).attr('fill', 'green');
            readyRooms = $('path[fill="green"]').length;
            if (readyRooms === roomCounter) {
               console.log('все готово');
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
      console.log(body)
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


});
