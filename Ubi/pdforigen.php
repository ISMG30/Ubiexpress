<!doctype html>
<html lang="es">
    <head>
        <title>Ejemplo FPDF</title>
        <style>
            #cuadro{
                width: 50%;
                height: 500px;
            }
        </style>
        
    </head>
    <body>
        <!--iframe id="cuadro" src="makepdf.php"></iframe-->
        <iframe id="cuadro" src ="pdf.php"></iframe>

        <div class="row justify-content-sm-end mt-3">
                <div class="col-sm-auto text-right">
                    <a href="pdf.php?Descargar=Informe.pdf"><button  type="button" class="btn btn-danger">DESCARGAR PDF</button></a>
                    <a href="pdf.php?Descargar=fichero.png">Descargar fichero</a>
                    
                </div>
            </div>
    </body>
</html>