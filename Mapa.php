<!--DOCTYPE html>
<html>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recoridos de las Unidades</title>
        <--?php include_once "../Ubiexpress/lib/lib.php"?>
        <--link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"->
    </head>
    <body>

    <--div id="map" style="width:1000px; height: 800px; border: solid; border-color: #00FFFF  "></div->
    
    <main class="mt-5 pt-3">
    <div class="container-fluid" style="height: auto;">
               <div class="row justify-content-sm-center mt-5">
                   <div class="col-sm-auto text-center">
                       <label class="form-label text-uppercase fw-bold fs-3">Recoridos de las Unidades</label>
                   </div>
               </div>
               <div class="d-flex">
                    <div id="sidebar">
                        <div class="contenedor columna">
                             <ul class="list-group">
                                 Unidades: <select class="btn btn-secondary Yelow" id="units"><option>Unidades</option></select>

                                 Color : <select class=" btn btn-secondary dropdown-toggle" href="#" id="color">
                                    <option value="ff0000">Rojo</option>
                                 </select>
                                 <div style="text-align: center;">
                                    <button type="button" class="btn btn-secondary" 
                                     style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .70rem; --bs-btn-font-size: .90rem;" 
                                     id="build" value="Ejecutae">Ejecutar</button>
                                </div>
                                <div>
                                    Consulta de ruta <input class="contenedor" type="datetime-local" id="fecha" ></input>

                                </div>
                                <div>
                                    <ul class="list-grup">
                                        <div class="contenedor column">
                                            <table id="tracks">
                                                <thead>
                                                    <td>Unidad</td>
                                                    <td>Informacion</td>
                                                    <td>Color</td>
                                                    <td>Eliminar</td>
                                                </thead>
                                            </table>
                                        </div> 
                                    </ul>
                                </div>
                                
                                 
                             </ul>
                    </div>
        
    </main>
            <div id="map" style="height: 580px; width: 580px; position:relative; top: 310px; left: 1100;"></div>
  </body>

 <script src="Rutas.js">
  /*var map;
  map=L.map('map').setView([18.4578350067, -97.379520003], 16);
  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 30
    }).addTo(map);*/
 </script>
  </head>
</html-->
<!DOCTYPE html>
<html lang="en">

    <head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recoridos de las Unidades</title>
        <?php include_once "../Ubiexpress/lib/lib.php"?>
        <link rel="stylesheet" href="../styles/style_gasolina.css">
        
    </head>
   
    <body>

        
        
        <main class="mt-5 pt-3">
            <div class="container-fluid" style="height: auto;">
               <div class="row justify-content-sm-center mt-5">
                   <div class="col-sm-auto text-center">
                       <label class="form-label text-uppercase fw-bold fs-3">Recoridos de las Unidades</label>
                   </div>
               </div>
               <div class="d-flex">
                    <div id="sidebar">
                        <div class="contenedor columna">
                             <ul class="list-group">
                                 Unidades: <select class="btn btn-secondary Yelow" id="units"><option>Unidades</option></select>

                                 Color : <select class=" btn btn-secondary dropdown-toggle" href="#" id="color">
                                    <option value="ff0000">Rojo</option>
                                 </select>
                                 <div style="text-align: center;">
                                    <button type="button" class="btn btn-secondary" 
                                     style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .70rem; --bs-btn-font-size: .90rem;" 
                                     id="build" value="Ejecutae">Ejecutar</button>
                                </div>
                                <div>
                                    Consulta de ruta <input class="contenedor" type="datetime-local" id="fecha" ></input>

                                </div>
                                <div>
                                    <ul class="list-grup">
                                        <div class="contenedor column">
                                            <table id="tracks">
                                                <thead>
                                                    <td>Unidad</td>
                                                    <td>Informacion</td>
                                                    <td>Color</td>
                                                    <td>Eliminar</td>
                                                </thead>
                                            </table>
                                        </div> 
                                    </ul>
                                </div>
                                <!--div id="log">
                                    <div class="content w-100">
                                        <div class="container-xl">
                                            <section class="p-3">
                                                <div class="container">
                                                    <div class="col-md-12">
                                                        <div id="map" style="height: 580px; width: 580px;"></div>    
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div-->
                                 
                             </ul>
                        </div>
                    </div>
               </div>
                 
        </main>
        <aside id="log">
              <div  style="height: 580px; width: 580px; position:relative;  left:500px" id="map"></div>
        </aside>
    </body>
    <script src="coor.js"></script>
    </head>
</html>