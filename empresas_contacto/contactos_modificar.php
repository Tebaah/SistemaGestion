<?php
include "../conexiones/conexion.php";
$idContacto = $_GET["id"];

$sql = $conn->query("SELECT * FROM `contactos` WHERE id_contacto = $idContacto ")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Sistema de Gestion</title>
</head>
<body class="bg-dark">
    <head>
        <nav class="navbar bg-dark">
            <form class="container-fluid justify-content-end">
                <a class="btn btn-secondary m-1" href="../index.php" role="button">HOME</a>
                <a class="btn btn-secondary m-1" href="../cotizacion/cotizacion.php" role="button">COTIZACIONES</a>
                <a class="btn btn-secondary m-1" href="clientes.php" role="button">CLIENTES</a>
            </form>
            </nav>
    </head>
    <!-- Contenedor pagina -->
    <div class="d-flex row  justify-content-center align-items-stretch m-5">
        <!-- Contenedor formuario -->
        <div class="col-xxl-8 m-1">
            <!-- Formulario de ingreso clientes -->
            <div class="col m-1 p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                <!-- Titulo formulario -->
                <h2 class="text-center">Modificar contactos</h2>


                <!-- Fromulario -->
                <form method="POST">
                    <!-- Casilla para obtener id empresa y referenciar -->
                   <input type="text" name="id" value="<?= $_GET["id"] ?>">
                    <?php
                    include "../controlador/modificar_contactos.php";
                    include "../controlador/eliminar_contactos.php";

                    while($datos=$sql->fetch_object()) { ?>
                    <!-- Casilla nombre -->
                    <div class="mb-3 col-6">
                        <label for="nombreContacto" class="form-label">Nombre contacto</label>
                        <input type="text" class="form-control" name="nombreContacto" value="<?= $datos->nombre_contacto ?>">
                        <div id="rutHelp" class="form-text">Ejemplo: Carlos Contreras.</div>
                    </div>
                    <!-- Casilla telefono -->
                    <div class="mb-3 col-6">
                        <label for="telefonoContacto" class="form-label">Telefono contacto</label>
                        <input type="text" class="form-control" name="telefonoContacto" value="<?= $datos->telefono_contacto ?>">
                        <div id="rutHelp" class="form-text">Maximimo 9 caracteres ejemplo: 912345678.</div>
                    </div>
                    <!-- Casilla email -->
                    <div class="mb-3 col-6">
                        <label for="emailContacto" class="form-label">Email contacto</label>
                        <input type="email" class="form-control" name="emailContacto" value="<?= $datos->email_contacto ?>">
                        <div id="rutHelp" class="form-text">Recuerde caracter fundamental "@".</div>
                    </div>
                    <?php
                    }
                    ?>

                    <!-- Boton modificar contacto -->
                    <button type="submit" class="btn btn-primary mb-3" name="btnModificarContacto" value="ok">Modificar</button>
                    <!-- Boton elimianr contacto TODO revisar si es necesario-->
                    <!-- <button type="submit" class="btn btn-primary mb-3" name="btnEliminarContacto" value="ok">Eliminar</button> -->
                </form>
            </div>
            
        </div>
    </div> 
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>