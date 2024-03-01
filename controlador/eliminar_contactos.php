<?php
if(!empty($_POST["btnEliminarContacto"]))
{
        $idContactoEliminar = $_GET["id"];

        $eliminarContacto = $conn->query("DELETE FROM `contactos` WHERE id_contacto = $idContactoEliminar");


        if($eliminarContacto == 1)
        {
            echo "<div>Contacto eliminado</div>";
        }
        else
        {
            echo "<div>Contacto no eliminado</div>";
        }
}

?>
