<?php
include "../conexiones/conexion.php";
$idCotizacionTonelaje = $_GET["id"];

$consulta = $conn->query("SELECT * FROM cotizacion_tonelaje WHERE id_cotizacion_tonelaje = $idCotizacionTonelaje")

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
    <main>
        <!-- Contenedor pagina -->
        <div class="d-flex row justify-content-center align-items-stretch m-5">
            <!-- Contenedor ingreso contacto -->
            <div class="col-xxl-5 m-1">
                <!-- Formulario de ingreso contactos -->
                <div class="col m-1 p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                    <!-- Titulo formulario -->
                    <h2 class="text-center">Modificar informacion</h2>
                    <!-- Formulario -->
                    <form class= "row" method="POST">                         
                        <input type="hidden" class="form-control" name="id" value="<?=$idCotizacionTonelaje ?>">                               
                        <?php
                        include "../controlador/modificar_tonelaje.php";
                        include "../controlador/eliminar_tonelajes.php";

                        while($datos = $consulta->fetch_object()) { ?>
                        <!-- Casilla minimo de servicio -->
                        <div class="mb-3 col-4">
                            <label for="minimoServicio" class="form-label">Minimo</label>
                            <input type="text" class="form-control" name="minimoServicio" value="<?= $datos->minimo ?>">
                            <div id="rutHelp" class="form-text"> Cantidad de horas minimas.</div>
                        </div>
                            <!-- Casilla valor del servicio -->
                        <div class="mb-3 col-4">
                            <label for="valorServicio" class="form-label">Valor</label>
                            <input type="text" class="form-control" name="valorServicio" value="<?= $datos->valor ?>">
                            <div id="rutHelp" class="form-text">Valore del tonelaje.</div>
                        </div>
                        <?php } ?>                                                                                         
              
                        <div>                    
                        <!-- Boton registrar contacto -->
                        <button type="submit" class="btn btn-primary mb-3" name="btnModificarValores" value="ok">Modificar</button>
                        <button type="submit" class="btn btn-primary mb-3" name="btnEliminarValores" value="ok">Eliminar</button>
                        </div>
                    </form>
                </div>            
            </div>
        </div>           
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>