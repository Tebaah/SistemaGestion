<?php

// validamos el click del boton
if(!empty($_POST["btnIngresarTonelaje"]))
{
    // validamos que los campos tengan informacion 
    if(!empty($_POST["idCotizacion"]) and !empty($_POST["codigoTonelaje"]) and !empty($_POST["detalleTonelaje"]) and !empty($_POST["unidadMedida"]) and !empty($_POST["minimoServicio"]) and !empty($_POST["valorServicio"]))
    {
        $idCotizacion = $_POST["idCotizacion"];
        $codigoTonelaje = $_POST["codigoTonelaje"];
        $detalleTonelaje = $_POST["detalleTonelaje"];
        $unidadMedida = $_POST["unidadMedida"];
        $minimoServicio = $_POST["minimoServicio"];
        $valorServicio = $_POST["valorServicio"];

        $sql = $conn->query(" INSERT INTO `cotizacion_tonelaje`(`id_cotizaciones`, `id_tonelaje`, `detalle`, `unidad`, `minimo`, `valor`) VALUES ('$idCotizacion','$codigoTonelaje','$detalleTonelaje','$unidadMedida','$minimoServicio','$valorServicio')");
        if($sql == 1)
        {
            echo '<div class="alert alert-success"> Servicio registrado</div>';
        }
        else
        {
            echo '<div class="alert alert-danger"> Servicio no registrada</div>';
        }
    }
    else
    {
        echo '<div class="alert alert-warning"> Campos incompletos</div>';
    }
}

?>
