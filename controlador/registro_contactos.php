<?php

// validamos el click del boton
if(!empty($_POST["btnRegistrar"]))
{
    // validamos que los campos tengan informacion 
    if(!empty($_POST["nombreContacto"]) and !empty($_POST["telefonoContacto"]) and !empty($_POST["emailContacto"]))
    {
        $idEmpresa = $_POST["idEmpresa"];
        $nombreContacto = $_POST["nombreContacto"];
        $telefonoContacto = $_POST["telefonoContacto"];
        $emailContacto = $_POST["emailContacto"];

        $sql = $conn->query(" INSERT INTO `contactos`(`id_empresas`, `nombre_contacto`, `telefono_contacto`, `email_contacto`) VALUES ('$idEmpresa','$nombreContacto','$telefonoContacto','$emailContacto')");
        if($sql == 1)
        {
            echo '<div class="alert alert-success"> Contacto registrado</div>';
        }
        else
        {
            echo '<div class="alert alert-danger"> Contacto no registrada</div>';
        }
    }
    else
    {
        echo '<div class="alert alert-warning"> Campos incompletos</div>';
    }
}

?>
