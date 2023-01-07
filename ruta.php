<?php
   if($_POST) { 
    $geocodeData = getGeocodeData($_POST['searchAddress']); 
    if($geocodeData) {         
       $latitude = $geocodeData[0];
       $longitude = $geocodeData[1];
       $address = $geocodeData[2];                     
?> 
<div id="gmap">Cargando mapa...</div>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=API-KEY"></script> 
<script type="text/javascript">
 function init_map() {
    var options = {
       zoom: 14,
       center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
       mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($("#gmap")[0], options);
    marker = new google.maps.Marker({
       map: map,
       position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
    });
    infowindow = new google.maps.InfoWindow({
        content: "<?php echo $address; ?>"
    });
    google.maps.event.addListener(marker, "click", function () {
         infowindow.open(map, marker);
    });
 }
 google.maps.event.addDomListener(window, 'load', init_map);
</script> 
<?php 
   } else {
      echo "Detalles incorrectos!";
   }
}
?>