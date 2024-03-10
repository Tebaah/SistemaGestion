<?php
include "../conexiones/conexion.php";
$idCotizacion = $_GET["id"];

// $codigoTonelaje = $conn->query(" SELECT * FROM valor_tonelaje ");

if(isset($_POST['btnBuscar']) and isset($_POST['buscadorCodigo']))
{
   $codigoInsertar = $_POST['buscadorCodigo'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="../style.css"> -->
    <title>Sistema de Gestion</title>
</head>
<body class="bg-dark">
    <head>
        <nav class="navbar bg-dark">
            <form class="container-fluid justify-content-end">
                <a class="btn btn-secondary m-1" href="../index.php" role="button">HOME</a>
                <a class="btn btn-secondary m-1" href="../cotizacion/cotizacion.php" role="button">COTIZACIONES</a>
                <a class="btn btn-secondary m-1" href="../empresas_contacto/clientes.php" role="button">CLIENTES</a>
            </form>
            </nav>
    </head>
    <main>
        <!-- Contenedor pagina -->
        <section class=" row justify-content-center align-items-start m-2">
            <!-- Contenedor formulario ingreso de servicios -->
            <section class="col-xxl-5 m-1 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                <!-- Titulo del formulario -->
                <h2 class="text-center">Ingreso de servicios</h2>
                <!-- Formulario -->
                <form class= "row" method="POST">
                        <?php
                        include "../conexiones/conexion.php";
                        include "../controlador/registro_tonelajes.php";
                        ?>
                        <!-- Casilla id cotizacion -->
                        <div class="mb-3 col-2">
                            <label for="idCotizacion" class="form-label">Numero Cot.</label>
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
                        <button type="submit" class="btn btn-primary" name="btnBuscar" value="ok">Agregar</button>
                        </div>                        
                        <?php
                        // Buscamos los datos y los ingresamos en las casillas correspondientes 
                        if(isset($_POST['btnBuscar']))
                        {                            
                            $valorBuscado = $conn->query("SELECT * FROM valor_tonelaje WHERE id_tonelaje LIKE '%$codigoInsertar%'");
                            $insertarDatos = $valorBuscado->fetch_object();
                        }
                        ?>

                        <!-- Casilla detalle tonelaje -->
                        <div class="mb-3 col-8">
                            <label for="detalleTonelaje" class="form-label">Detalle del tonelaje</label>
                            <input type="text" class="form-control" name="detalleTonelaje" value="<?= $insertarDatos->detalle?>" disable readonly>
                        </div>
                        <!-- Casilla unidad de medida -->
                        <div class="mb-3 col-4">
                            <label for="unidadMedida" class="form-label">Unidad de medida</label>
                            <input type="text" class="form-control" name="unidadMedida" value="<?= $insertarDatos->unidad?>" disable readonly>
                            <div id="rutHelp" class="form-text">Horas o unidades.</div>
                        </div>
                        <!-- Casilla minimo de servicio -->
                        <div class="mb-3 col-4">
                            <label for="minimoServicio" class="form-label">Minimo de horas</label>
                            <input type="text" class="form-control" name="minimoServicio" value="<?= $insertarDatos->minimo?>">
                            <div id="rutHelp" class="form-text">Minimo de horas o unidad del servicio.</div>
                        </div>
                            <!-- Casilla valor del servicio -->
                        <div class="mb-3 col-4">
                            <label for="valorServicio" class="form-label">Valor del servicio</label>
                            <input type="text" class="form-control" name="valorServicio" value="<?= $insertarDatos->valor?>">
                            <div id="rutHelp" class="form-text">Valor hora o unidad del servicio.</div>
                        </div>
                        <div>    
                        <!-- Casilla codigo tonelaje -->
                        <div>
                            <input type="hidden" class="form-control" name="codigoTonelaje" value="<?= $insertarDatos->id_tonelaje?>">
                        </div>                
                        <!-- Boton registrar contacto -->
                        <button type="submit" class="btn btn-primary mb-3" name="btnIngresarTonelaje" value="ok">Ingresar</button>
                        <button type="submit" class="btn btn-primary mb-3" name="" value="ok">Actualizar</button>
                        <a class="btn btn-primary mb-3" href="impresion_cotizacion.php?id=<?= $idCotizacion ?>">Inprimir</i></a>
                    </form>                
            </section>
            <section class="col-xxl-5 m-1 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                        <!-- Titulo tabla -->
                    <h2 class="text-center">Servicios ingresados</h2>
                    <!-- Tabla de informacion -->
                    <div>
                        <!-- Tabla -->
                    <table class="table cuerpito">
                        <thead">
                            <tr>
                            <th scope="col">COD. TONELAJE</th>
                            <th scope="col">DETALLE</th>
                            <th scope="col">UNIDAD MEDIDA</th>
                            <th scope="col">MINIMO</th>
                            <th scope="col">VALOR HORA</th>
                            <th scope="col">MOD</th>
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
                                    <a class="btn btn-warning" href="cotizacion_modificar.php?id=<?= $datos->id_cotizacion_tonelaje ?>" target="_blank"><i class="bi bi-folder-fill"></i></a>
                                </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    </div>
            </section>
        </section>      
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>