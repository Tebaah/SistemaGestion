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
<body>
    <head>
        <nav class="navbar bg-body-tertiary">
            <form class="container-fluid justify-content-end">
                <a class="btn btn-secondary m-1" href="../index.php" role="button">HOME</a>
                <a class="btn btn-secondary m-1" href="#" role="button">COTIZACIONES</a>
                <a class="btn btn-secondary m-1" href="clientes.php" role="button">CLIENTES</a>
            </form>
            </nav>
    </head>
    <div class="container-fluid p-4">
        <div class="row justify-content-center">
            <!-- Formulario de ingreso clientes -->
            <div class="col-7 m-1 border border-5 border-primary rounded-4">
                <h2 class="text-center">Modificar contactos</h2>
                <form method="POST">
                    <?php
                    include "../controlador/modificcar_contactos.php";
                    while($datos=$sql->fetch_object())
                    { ?>

                    <!-- casilla para obtener id empresa y referenciar -->
                    <div class="mb-3 col">
                        <input type="text" name="idContacto" value="<?= $_GET["id"] ?>">
                        <!-- <div id="rutHelp" class="form-text">Sin punto y con guion.</div> -->
                    </div>
                    <!-- casilla nombre -->
                    <div class="mb-3 col-6">
                        <label for="rutEmpresa" class="form-label">Nombre contacto</label>
                        <input type="text" class="form-control" name="nombreContacto" value="<?= $datos->nombre ?>">
                        <div id="rutHelp" class="form-text">Ejemplo: Carlos Contreras.</div>
                    </div>
                    <!-- casilla telefono -->
                    <div class="mb-3 col-6">
                        <label for="nombreEmpresa" class="form-label">Telefono contacto</label>
                        <input type="text" class="form-control" name="telefonoContacto" value="<?= $datos->telefono ?>">
                        <div id="rutHelp" class="form-text">Maximimo 9 caracteres ejemplo: 912345678.</div>
                    </div>
                    <!-- casilla email -->
                    <div class="mb-3 col-6">
                        <label for="nombreEmpresa" class="form-label">Email contacto</label>
                        <input type="email" class="form-control" name="emailContacto" value="<?= $datos->email ?>">
                        <div id="rutHelp" class="form-text">Recuerde caracter fundamental "@".</div>
                    </div>
                    <?php
                    }
                    ?>

                    <!-- Botones acciones formulario -->
                    <button type="submit" class="btn btn-primary mb-3" name="btnModificar" value="ok">Modificar</button>
                    <!-- <button type="submit" class="btn btn-primary" name="btnBuscar">Buscar</button> -->
                </form>
            </div>
            
        </div>
    </div> 
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>