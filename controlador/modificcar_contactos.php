<?php

if(!empty($_POST["btnModificar"]))
{
    if(!empty($_POST["nombreContacto"]) and !empty($_POST["telefonoContacto"]) and !empty($_POST["emailContacto"]))
    {
        $idContacto = $_POST["idContacto"];
        $nombreContacto = $_POST["nombreContacto"];
        $telefonoContacto = $_POST["telefonoContacto"];
        $emailContacto = $_POST["emailContacto"];

        $sql = $conn->query("UPDATE `contactos` SET `nombre`='$nombreContacto',`telefono`='$telefonoContacto',`email`='$emailContacto' WHERE `id_contacto` = $idContacto");
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