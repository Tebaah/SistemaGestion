<?php

// validamos el click del boton
if(!empty($_POST["btnRegistrar"]))
{
    // validamos que los campos tengan informacion 
    if(!empty($_POST["fechaCotizacion"]) and !empty($_POST["contactoCotizacion"]) and !empty($_POST["ejecutivosCotizacion"]) and !empty($_POST["direccionCotizacion"]) and !empty($_POST["detalleCotizacion"]) and !empty($_POST["notasCotizacion"]))
    {
        $fecha = $_POST["fechaCotizacion"];
        $contacto = $_POST["contactoCotizacion"];
        $ejecutvio = $_POST["ejecutivosCotizacion"];
        $direccion = $_POST["direccionCotizacion"];
        $detalle = $_POST["detalleCotizacion"];
        $notas = $_POST["notasCotizacion"];

        $sql = $conn->query(" INSERT INTO `cotizacion`(`fecha`, `id_contactos`, `id_ejecutivos`, `direccion`, `detalle`, `notas`) VALUES ('$fecha','$contacto','$ejecutvio','$direccion','$detalle','$notas')");
        if($sql == 1)
        {
            echo '<div class="alert alert-success"> Cotizacion registrada</div>';
        }
        else
        {
            echo '<div class="alert alert-danger"> Cotizacion no registrada</div>';
        }
    }
    else
    {
        echo '<div class="alert alert-warning"> Campos incompletos</div>';
    }
}

?>
