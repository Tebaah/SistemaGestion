<?php

// validamos el click del boton
if(!empty($_POST["btnRegistrar"]))
{
    // validamos que los campos tengan informacion 
    if(!empty($_POST["rutEmpresa"]) and !empty($_POST["nombreEmpresa"]))
    {
        $rutEmpresa = $_POST["rutEmpresa"];
        $nombreEmpresa = $_POST["nombreEmpresa"];

        $sql = $conn->query(" INSERT INTO `empresas`(`rut`, `nombre`) VALUES ('$rutEmpresa','$nombreEmpresa')");
        if($sql == 1)
        {
            echo '<div class="alert alert-success"> Empresa registrada</div>';
        }
        else
        {
            echo '<div class="alert alert-danger"> Empresa no registrada</div>';
        }
    }
    else
    {
        echo '<div class="alert alert-warning"> Campos incompletos</div>';
    }
}

?>
