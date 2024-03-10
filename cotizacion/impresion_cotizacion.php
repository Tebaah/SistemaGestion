<?php

include "../conexiones/conexion.php";
$idCotizacion = $_GET["id"];

$buscarCotizacion = $conn->query("SELECT * FROM cotizacion c INNER JOIN contactos co ON c.id_contactos = co.id_contacto INNER JOIN empresas e ON co.id_empresas = e.id_empresa INNER JOIN ejecutivo_comercial ej ON c.id_ejecutivos = ej.id_ejecutivo WHERE id_cotizacion =  $idCotizacion");
$datosCotizacion = $buscarCotizacion->fetch_object();

// $buscarServicios = $conn->query("SELECT * FROM cotizacion_tonelaje WHERE id_cotizaciones = $idCotizacion");
// $datosServicios = $buscarServicios->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <style>
        table {
            font-size: 13px;
        }
        .tam {
            font-size: 13px; /* Ajusta este valor a tus necesidades */
        }
    </style>
    <title>Impresion</title>

</head>
<body id="element">
<header>
    <section>
        <h1 class="display-1">Datos de la empresa</h1>
    </section>
</header>
<main class="flex bg-body-secondary text-black">
    
    <!-- Datos cotizacion -->
    <section class="row m-1 direccion">
        <!-- Titulo datosServicios -->
        <h2>Datos cotizacion</h2>
        <!-- Fecha de cotizacion -->
        <div class="col-3">
            <label for="fechaCotizacion" class="form-label">Fecha</label>
            <input type="text" class="form-control tam" name="fechaCotizacion" value="<?= $datosCotizacion->fecha?>">
        </div>
        <!-- Numero de cotizacion -->
        <div class="col-3">
            <label for="numeroCotizacion" class="form-label">Número Cotización</label>
            <input type="text" class="form-control" name="numeroCotizacion" value="<?= $datosCotizacion->id_cotizacion?>">
        </div>
        </section>

    <!-- Datos del cliente -->
    <section class="row m-1">
        <!-- Titulo datosServicios -->
        <h2>Datos cliente</h2>
        <!-- Nombre empresa -->
        <div class="col-8">
            <label for="empresaCotizacion" class="form-label">Razón Social</label>
            <input type="text" class="form-control" name="empresaCotizacion" value="<?= $datosCotizacion->nombre_empresa?>">
        </div>
        <!-- Rut empresa -->
        <div class="col-4">
            <label for="rutCotizacion" class="form-label">Rut</label>
            <input type="text" class="form-control" name="rutCotizacion" value="<?= $datosCotizacion->rut_empresa?>">
        </div>
        <!-- Nombre contacto cotizacion -->
        <div class="col-8">
            <label for="nombreContacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" name="nombreContacto" value="<?= $datosCotizacion->nombre_contacto?>">
        </div>        
        <!-- Correo contacto cotizacion -->
        <div class="col-4">
            <label for="correoContacto" class="form-label">Correo</label>
            <input type="text" class="form-control" name="correoContacto" value="<?= $datosCotizacion->email_contacto?>">
        </div>
        <!-- Telefono contacto cotizacion -->
        <div class="col-4">
            <label for="telefonoContacto" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefonoContacto" value=<?= $datosCotizacion->telefono_contacto?>>
        </div>
    </section>

    <!-- Datos del ejecutivo -->
    <section class="row m-1">
        <!-- Titulo datosServicios -->
        <h2>Datos ejecutivo comercial</h2>
        <!-- Nombre ejecutivo -->
        <div class="col">
            <label for="nombreEjecutivo" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombreEjecutivo" value="<?= $datosCotizacion->nombre?>">
        </div>
        <!-- Telefono ejecutivo -->
        <div class="col">
            <label for="telefonoEjecutivo" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefonoEjecutivo" value=<?= $datosCotizacion->telefono?>>
        </div>
        <!-- Correo ejecutivo -->
        <div class="col">
            <label for="mailEjecutivo" class="form-label">Mail</label>
            <input type="text" class="form-control" name="mailEjecutivo" value=<?= $datosCotizacion->correo?>>
        </div>
    </section>

    <!-- Datos de la faena -->
    <section class="row m-1">
        <!-- Titulo de datosServicios -->
        <h2>Datos Faena</h2>
        <!-- Direccion de faena -->
        <div class="col-12">
            <label for="direccionFaena" class="form-label">Direccion Faena</label>
            <input type="text" class="form-control" name="direccionFaena" value=<?= $datosCotizacion->direccion?>>
        </div>
        <!-- Detalle de la faena -->
        <div class="col-12">
            <label for="detalleFaena" class="form-label">Detalle Faena</label>
            <input type="text" class="form-control" name="detalleFaena" value="<?= $datosCotizacion->detalle?>">
        </div>
        <!-- Notas de la faena -->
        <div class="col-12">
            <label for="notasFaena" class="form-label">Notas Faena</label>
            <input type="text" class="form-control" name="notasFaena" value="<?= $datosCotizacion->notas?>">
        </div>
    </section>

    <!-- Datos de servicios -->
    <section class="row m-1">
        <h2>Servicios cotizados</h2>
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">COD.</th>
                    <th scope="col">DETALLE</th>
                    <th scope="col">UNIDAD MEDIDA</th>
                    <th scope="col">MINIMO UNIDADES</th>
                    <th scope="col">VALOR UNIDAD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    include "../conexiones/conexion.php";
                    $buscarServicios = $conn->query("SELECT * FROM cotizacion_tonelaje WHERE id_cotizaciones = $idCotizacion");
                    while($datosServicios = $buscarServicios->fetch_object()) { ?>
                        <tr>                                
                            <td><?= $datosServicios->id_tonelaje ?></td>
                            <td><?= $datosServicios->detalle ?></td>
                            <td><?= $datosServicios->unidad ?></td>
                            <td><?= $datosServicios->minimo ?> diarias </td>
                            <td><?= $datosServicios->valor ?> +IVA.-</td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Observaciones de la faena -->
    <section>
        <h2>Observaciones</h2>
        <div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ut quod sapiente voluptate? Facilis assumenda quam culpa iste quae accusamus excepturi esse libero sed, omnis unde pariatur voluptatem repellendus quis.
            </p>
        </div>
    </section>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var element = document.getElementById('element');

    html2pdf(element, {
        margin: 10,
        filename: 'cotizacion.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'letter', orientation: 'portrait' }
    });
</script>

</body>
</html>
