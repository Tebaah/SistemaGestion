<?php
if(!empty($_POST["btnEliminarValores"]))
{
        $idTonelajeEliminar = $_GET["id"];

        $eliminarTonelaje = $conn->query("DELETE FROM `cotizacion_tonelaje` WHERE id_cotizacion_tonelaje = $idTonelajeEliminar");


        if($eliminarTonelaje == 1)
        {
            echo '<div class="alert alert-success"> Informacion eliminada </div>';
        }
        else
        {
            echo '<div class="alert alert-danger"> Informacion sin eliminar</div>';
        }
}

?>