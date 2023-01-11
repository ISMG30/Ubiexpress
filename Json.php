<?php
    

    //$json = '[{"id":"1","nombre":"Jose","edad":"25","genero":"masculino","email":"josegonzales9871@gmail.com","localidad":"Madrid","telefono":"912546524"},{"id":"2","nombre":"Juan","edad":"31","genero":"masculino","email":"juanrodriguez65465@gmail.com","localidad":"Barcelona","telefono":"934654654"},{"id":"3","nombre":"Antonio","edad":"43","genero":"masculino","email":"antoni654654@gmail.com","localidad":"Valencia","telefono":"214748366"},{"id":"4","nombre":"Angelina","edad":"35","genero":"femenino","email":"angelina654456@gmail.com","localidad":"New York","telefono":"247483647"}]';
    $json ='[{"id":"341","user":"C. ROJA SN-75-862","com":"49.5","km":"28140"},{"id":302,"user":"C. ROJA SN-75-866","com":"48.5","km":"29569"},{"id":"103","user":"TRAILER CASCADIA SN-88-974","com":"220","km":"39760"}]';
    
    $datosclientes = json_decode($json, true);
    
    
    $server = "localhost";
    $user = "root";
    $pass = "1234";
    $bd = "pruebacront";
    
    //Creamos la conexión
    $conexion = mysqli_connect($server, $user, $pass,$bd) 
    or die("Ha sucedido un error inexperado en la conexion de la base de datos");
    
    
    /*foreach ($datosclientes as $cliente) {
            
        mysqli_query($conexion,"INSERT INTO clientes (nombre,edad,genero,email,localidad,telefono) 
        VALUES ('".$cliente['nombre']."',".$cliente['edad'].",'".$cliente['genero']."','".$cliente['email']."','".$cliente['localidad']."',".$cliente['telefono'].")");	
            
    }*/
    foreach($datosclientes as $clientes){
        mysqli_query($conexion, "INSERT INTO ubiexpress(id, Unidad, combustible, km) VALUES ('".$cliente['id']."','".$cliente['user']."','".$cliente['com']."', '".$cliente['km']."')");
    }
    
    
    mysqli_close($conexion);
    
   
?>