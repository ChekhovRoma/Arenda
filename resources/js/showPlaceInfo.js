import $ from 'jquery';

let name;
$(document).ready(function () {
    let svg = $('svg')[0];
    $(svg).attr('width', 'auto');
    $(svg).attr('height', 'auto');
    $(svg).css('background', '#e8f1e3');
    console.log(svg);
    let rooms = $('path[id^=room]');
    rooms.hover(async function () {
        name = $(this).attr('id');
        let info = await getInfoAboutRoom(name);
        if (info) {
            $(this).popover({
                html: true,
                trigger: 'hover',
                placement: 'bottom',
                title: `<ul><li>Площадь: ${info.area} м²</li><li>Цена: ${info.price} рублей</li><li>Этаж: ${info.floor}</li><li>О помещении: ${info.description?? ''}</li></ul>`,
            });
        }
        $(this).on('hide.bs.popover', function () {
            info = null;
            $(this).attr('fill', 'green');
        });
        $(this).on('show.bs.popover', function () {
            $(this).attr('fill', '#86eb34');
        });
    });
    
});

async function getInfoAboutRoom(id) {
    return fetch('/getInfoAboutRoom', {
        crossDomain: true,
        method: 'POST',
        mode: 'cors',
        headers: {
            'Content-Type': 'application/json',
        },
        
        body: JSON.stringify({
            'name': id,
        }),
    })
    .then(response => response.json())
}
