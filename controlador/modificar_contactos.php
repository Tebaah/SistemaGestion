<?php

if(!empty($_POST["btnModificarContacto"]))
{
    if(!empty($_POST["nombreContacto"]) and !empty($_POST["telefonoContacto"]) and !empty($_POST["emailContacto"]))
    {
        $idContactoModificar = $_POST["id"];
        $nombreContacto = $_POST["nombreContacto"];
        $telefonoContacto = $_POST["telefonoContacto"];
        $emailContacto = $_POST["emailContacto"];


        $sql = $conn->query("UPDATE `contactos` SET `nombre_contacto`='$nombreContacto',`telefono_contacto`='$telefonoContacto',`email_contacto`='$emailContacto' WHERE `id_contacto` = $idContactoModificar ");    

        if($sql == 1)
        {
            header("location:clientes.php");
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