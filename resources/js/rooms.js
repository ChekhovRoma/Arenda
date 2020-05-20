import $ from 'jquery'
import formValidator from 'jquery-validation'

$(document).ready(function () {
   let rooms = $('path[id^=room]');
   let name;
   rooms.attr('fill', 'red');
   rooms.click(function (event) {
      $(this).attr('fill', 'yellow');
      name = $(this).attr('id');
      $('#roomCreator').modal('show');
   });

   $('#roomFormSubmit').click(function (event) {
      let response = fetchRoom();
      console.log(response);
   });

   async function fetchRoom () {
      let area = $('#roomArea').val();
      let floor = $('#floor').val();
      let price = $('#price').val();
      let description = $('#description').val();
      let placeId = $('#placeId').val();
      console.log(area, floor, price,description,placeId);
      console.log(name);
      fetch('http://127.0.0.1:8000/saveRoom',{
         method: 'POST',
         headers: {
            'Content-Type': 'application/json'
         },
         body: JSON.stringify({
            'name': name,
            'placeId': placeId,
            'floor': floor,
            'price': price,
            'description': description,
            'area': area
         })
      })
      .then(response => response.json())
      .then(body => {
          console.log(body)
      })
      .catch((reject)=>{
         console.log(reject);
      })
   }
});
// validation
$(function() {
   $("form[name='addRoom']").validate({
      rules: {
         area: {
            required: true,
            number: true
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
         },
      },
      submitHandler: function(form) {
         console.log('Hello');
      }
   });
});
