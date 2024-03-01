<?php
$idCotizacion = $_GET["id"];

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
                    <h2 class="text-center">Ingreso de servicios</h2>
                    <!-- Formulario -->
                    <form class= "row" method="POST">
                        <?php
                        include "../conexiones/conexion.php";
                        include "../controlador/registro_tonelajes.php";
                        ?>
                        <!-- Casilla id cotizacion -->
                        <div class="mb-3 col-2">
                            <label for="idCotizacion" class="form-label">Numero cotizacion</label>
                            <input type="text" class="form-control" name="idCotizacion" value="<?= $_GET["id"] ?>" disable readonly>
                        </div>

                        <!-- Select option para buscar codigo de tonelaje -->
                        <div class="mb-3 col-2">
                                <label for="buscadorCodigo" class="form-label">Codigo tonelaje</label>
                                <select class="form-select" name="buscadorCodigo" id="" required>
                                    <option>Selecciona un codigo</option>
                                    <?php
                                        $codigoTonelaje = $conn->query(" SELECT * FROM valor_tonelaje ");
                                        while($datosTonelaje = $codigoTonelaje->fetch_object()){
                                    ?>
                                    <option value="<?php echo $datosTonelaje->id_tonelaje?>"><?php echo $datosTonelaje->id_tonelaje?></option>
                                    <?php }?>
                                </select>
                                <div id="rutHelp" class="form-text">Selecciona el codigo.</div>
                        </div>
                        <div class="mb-3 col-1">                  
                        <!-- Boton registrar contacto -->
                        <label for="" class="form-label">Agregar</label>
                        <button type="submit" class="btn btn-primary" name="btnBuscar" value="ok"><i class="bi bi-plus-square-fill"></i></button>
                        </div>
                        <?php
                        if(isset($_POST['btnBuscar']) and !empty($_POST["buscadorCodigo"]))
                        {
                            $valorBuscado = $conn->query("SELECT * FROM valor_tonelaje WHERE id_tonelaje LIKE '%$datosTonelaje->id_tonelaje%'");
                            $insertarInputs = $valorBuscado->fetch_object();
                        }
                        ?>



                        <!-- Casilla detalle tonelaje -->
                        <div class="mb-3 col-6">
                            <label for="detalleTonelaje" class="form-label">Detalle del tonelaje</label>
                            <input type="text" class="form-control" name="detalleTonelaje" value="<?= $insertarInputs->detalle ?>" disable readonly>
                        </div>
                        <!-- Casilla unidad de medida -->
                        <div class="mb-3 col-4">
                            <label for="unidadMedida" class="form-label">Unidad de medida</label>
                            <input type="text" class="form-control" name="unidadMedida" value="<?= $insertarInputs->unidad ?>" disable readonly>
                            <div id="rutHelp" class="form-text">Horas o unidades.</div>
                        </div>
                        <!-- Casilla minimo de servicio -->
                        <div class="mb-3 col-4">
                            <label for="minimoServicio" class="form-label">Minimo de horas</label>
                            <input type="text" class="form-control" name="minimoServicio" value="<?= $insertarInputs->minimo ?>">
                            <div id="rutHelp" class="form-text">Minimo de horas o unidad del servicio.</div>
                        </div>
                            <!-- Casilla valor del servicio -->
                        <div class="mb-3 col-4">
                            <label for="valorServicio" class="form-label">Valor del servicio</label>
                            <input type="text" class="form-control" name="valorServicio" value="<?= $insertarInputs->valor ?>">
                            <div id="rutHelp" class="form-text">Valor hora o unidad del servicio.</div>
                        </div>
                        <div>    
                        <!-- Casilla codigo tonelaje -->
                        <div>
                            <input type="hidden" class="form-control" name="codigoTonelaje" value="<?= $insertarInputs->id_tonelaje ?>">
                        </div>                
                        <!-- Boton registrar contacto -->
                        <button type="submit" class="btn btn-primary mb-3" name="btnIngresarTonelaje" value="ok">Ingresar</button>
                        </div>
                    </form>
                </div>            
            </div>
            <!--Contendor resumen contactos  -->
            <div class="col-xxl-5 m-1">
                <!-- Tabla de resumen de contactos -->
                <div class="col m-1 p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                    <!-- Titulo tabla -->
                    <h2 class="text-center">Servicios ingresados</h2>
                    <!-- Tabla -->
                    <table class="table">
                        <thead">
                            <tr>
                            <th scope="col">COD. TONELAJE</th>
                            <th scope="col">DETALLE</th>
                            <th scope="col">UNIDAD MEDIDA</th>
                            <th scope="col">MINIMO</th>
                            <th scope="col">VALOR HORA</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // conectamos con base datos y ejecutamos query
                            include "../conexiones/conexion.php";                        
                            $sql = $conn->query(" SELECT * FROM cotizacion_tonelaje WHERE id_cotizaciones = $idCotizacion");
                            while($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><?= $datos->id_tonelaje ?></td>
                                    <td><?= $datos->detalle ?></td>
                                    <td><?= $datos->unidad ?></td>
                                    <td><?= $datos->minimo ?></td>
                                    <td><?= $datos->valor ?></td>
                                <td>
                                    <a class="btn btn-warning" href="cotizacion_modificar.php?id=<?= $datos->id_cotizacion_tonelaje ?>"><i class="bi bi-folder-fill"></i></a>
                                    <a class="btn btn-danger" href=""><i class="bi bi-file-earmark-minus-fill"></i></a>
                                </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            

    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>