import $ from 'jquery'

$(document).ready(function () {
   let rooms = $('path[id^=room]');
   let name;
   rooms.attr('fill', 'red');
   rooms.click(function (event) {
      $(this).attr('fill', 'yellow');
      name = $(this).attr('id');
      $('#roomCreator').modal('show');
   });

   $('#roomFormSubmit').click(function () {
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
