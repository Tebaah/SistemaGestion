<?php
// TODO actualizar a los valores de la pagina
if(!empty($_POST["btnModificarValores"]))
{
    if(!empty($_POST["minimoServicio"]) and !empty($_POST["valorServicio"]))
    {   
        $idModificar = $_POST["id"];
        $minimoServicio = $_POST["minimoServicio"];
        $valorServicio = $_POST["valorServicio"];

        $sql = $conn->query("UPDATE `cotizacion_tonelaje` SET `minimo`='$minimoServicio',`valor`='$valorServicio' WHERE `id_cotizacion_tonelaje` = $idModificar");
        if($sql == 1)
        {
            header("location:cotizacion.php");
        }
        else
        {
            echo '<div class="alert alert-danger"> Error al modificar</div>';
        }
    }
    else
    {
        echo '<div class="alert alert-warning"> Campos incompletos</div>';
    }
}
?>