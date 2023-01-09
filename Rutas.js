
    var map;
    map=L.map('map').setView([18.4578350067, -97.379520003], 16);
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
        dataType: 'json',
        data: data,
        success: callback,
        success: function (object){
           object = L.marker(['posicionY', 'posicionX']).addTo(map)
           
        }
       
     
    });
}
            
            

/*init()

function init(){
  var map;
  map=L.map('map').setView([18.4578350067, -97.379520003], 16);

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
    function getAlliances(data) {
    $.ajax({
        type: 'POST',
        url: 'Prueba.php',
        data: data,
        cache:false,
        processData: false,
        contentType: false,
        dataType: 'html',
        success: function (data) {
            console.log(data);
                
        },
        error: function (MLHttpRequest, textStatus, errorThrown) {
            console.log("ERROR", errorThrown);
        }
    });

    }
}*/