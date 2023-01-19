var map;
/*map=L.map('map').setView([18.4578350067, -97.379520003], 16);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 30
}).addTo(map);
    L.marker([18.457981, -97.380343]).addTo(map)
    .bindPopup('Abarrotera Hidalgo')
    .openPopup();
    L.marker([18.457885011,  -97.3794599851]).addTo(map)
    L.marker([18.4578666687, -97.3796066602]).addTo(map)
    L.marker([18.4578099887, -97.3799649874]).addTo(map)
    L.marker([18.4578716596, -97.3800250053]).addTo(map)
    function getAlliances(data){
$.ajax({
   //type: 'post',
    url: 'Prueba.php',
    data: parametros,
    type: 'post'  
    },
    columns[
        {data: 'id'},
        {data: 'Unidad'},
        {data: 'PosicionY'},
        {data: 'PosicionX'}
    ]);
}*/
init ()
function init()
{
    var map;
    map=L.map('map').setView([18.4578350067, -97.379520003], 5);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
        maxZoom: 60
    }).addTo(map);

    /*L.marker([18.457981, -97.380343]).addTo(map)
    .bindPopup('Abarrotera Hidalgo')
    .openPopup()
    var PosicionY=  18.457981;
    var PosicionX= -97.380343;
    L.marker([PosicionY, PosicionX]).addTo(map)
    .bindPopup('Unidad')
    .openPopup()*/

    $.ajax ({
        url: '../Respuesta.php?opcion=9',
        data: parametros,
        type: 'post'
    },
    columns [
        {data: 'id'},
        {data: 'unidad'},
        {data: 'posicionY'},
        {data: 'posicionX'}
    ]);
    L.marker([columns, 'PosicionX']).addTo(map)
    .bindPopup('Unidad')
    .openPopup()

}