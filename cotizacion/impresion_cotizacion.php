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
        .textSizeDatos{
            font-size: 13px;
        }
        .textSize {
            font-size: 10px; /* Ajusta este valor a tus necesidades */
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
            <input type="text" class="form-control textSizeDatos" name="fechaCotizacion" value="<?= $datosCotizacion->fecha?>">
        </div>
        <!-- Numero de cotizacion -->
        <div class="col-3">
            <label for="numeroCotizacion" class="form-label">Número Cotización</label>
            <input type="text" class="form-control textSizeDatos" name="numeroCotizacion" value="<?= $datosCotizacion->id_cotizacion?>">
        </div>
        </section>

    <!-- Datos del cliente -->
    <section class="row m-1">
        <!-- Titulo datosServicios -->
        <h2>Datos cliente</h2>
        <!-- Nombre empresa -->
        <div class="col-9">
            <label for="empresaCotizacion" class="form-label">Razón Social</label>
            <input type="text" class="form-control textSizeDatos" name="empresaCotizacion" value="<?= $datosCotizacion->nombre_empresa?>">
        </div>
        <!-- Rut empresa -->
        <div class="col-3">
            <label for="rutCotizacion" class="form-label">Rut</label>
            <input type="text" class="form-control textSizeDatos" name="rutCotizacion" value="<?= $datosCotizacion->rut_empresa?>">
        </div>
        <!-- Nombre contacto cotizacion -->
        <div class="col-9">
            <label for="nombreContacto" class="form-label">Contacto</label>
            <input type="text" class="form-control textSizeDatos" name="nombreContacto" value="<?= $datosCotizacion->nombre_contacto?>">
        </div>        
        <!-- Correo contacto cotizacion -->
        <div class="col-6">
            <label for="correoContacto" class="form-label">Correo</label>
            <input type="text" class="form-control textSizeDatos" name="correoContacto" value="<?= $datosCotizacion->email_contacto?>">
        </div>
        <!-- Telefono contacto cotizacion -->
        <div class="col-4">
            <label for="telefonoContacto" class="form-label">Telefono</label>
            <input type="text" class="form-control textSizeDatos" name="telefonoContacto" value=<?= $datosCotizacion->telefono_contacto?>>
        </div>
    </section>

    <!-- Datos del ejecutivo -->
    <section class="row m-1">
        <!-- Titulo datosServicios -->
        <h2>Datos ejecutivo comercial</h2>
        <!-- Nombre ejecutivo -->
        <div class="col">
            <label for="nombreEjecutivo" class="form-label">Nombre</label>
            <input type="text" class="form-control textSizeDatos" name="nombreEjecutivo" value="<?= $datosCotizacion->nombre?>">
        </div>
        <!-- Telefono ejecutivo -->
        <div class="col">
            <label for="telefonoEjecutivo" class="form-label">Telefono</label>
            <input type="text" class="form-control textSizeDatos" name="telefonoEjecutivo" value=<?= $datosCotizacion->telefono?>>
        </div>
        <!-- Correo ejecutivo -->
        <div class="col">
            <label for="mailEjecutivo" class="form-label">Mail</label>
            <input type="text" class="form-control textSizeDatos" name="mailEjecutivo" value=<?= $datosCotizacion->correo?>>
        </div>
    </section>

    <!-- Datos de la faena -->
    <section class="row m-1">
        <!-- Titulo de datosServicios -->
        <h2>Datos Faena</h2>
        <!-- Direccion de faena -->
        <div class="col-12">
            <label for="direccionFaena" class="form-label">Direccion Faena</label>
            <input type="text" class="form-control textSizeDatos" name="direccionFaena" value=<?= $datosCotizacion->direccion?>>
        </div>
        <!-- Detalle de la faena -->
        <div class="col-12">
            <label for="detalleFaena" class="form-label">Detalle Faena</label>
            <input type="text" class="form-control textSizeDatos" name="detalleFaena" value="<?= $datosCotizacion->detalle?>">
        </div>
        <!-- Notas de la faena -->
        <div class="col-12">
            <label for="notasFaena" class="form-label">Notas Faena</label>
            <input type="text" class="form-control textSizeDatos" name="notasFaena" value="<?= $datosCotizacion->notas?>">
        </div>
    </section>

    <!-- Salto de pagina -->
    <div class="html2pdf__page-break"></div>

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
                    <th scope="col">MINIMO DIARIO</th>
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
                            <td><?= $datosServicios->minimo ?></td>
                            <td><?= $datosServicios->valor ?> +IVA.-</td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Observaciones de la faena -->
    <section class="m-1">
        <h2>Observaciones</h2>
        <!-- Lista de observaciones -->
        <div class="m-2">
            <ul class="list-group fs-6">
                <li class="list-group-item textSize">La hora de la grúa comenzará a regir desde que la máquina sale de nuestras bodegas, hasta el regreso a las mismas.</li>
                <li class="list-group-item textSize">La Orden de Trabajo y/o Report Diario o Semanal, será proporcionado por Multiservice Grúas y es responsabilidad del cliente el control de la misma, debiendo firmar el Cliente al término de la faena.</li>
                <li class="list-group-item textSize">Se entenderá por hora Grúa, el tiempo reloj durante el cual estén disponibles para el cliente tanto la Grúa como el Operador.</li>
                <li class="list-group-item textSize">Cotización considera documentación básica de personal (Contrato, Certificación, Exámenes ocupacionales, EPP, Reglamento Interno, ODI). Documentación adicional debe solicitarse con 24 horas de anticipación. Cualquier omisión en solicitudes de documentación que provoque retrasos en faena serán de cargo de Cliente. Documentación extra puede generar cobros adicionales.</li>
                <li class="list-group-item textSize">Está estrictamente prohibido realizar maniobras en Tándem con grúas externas a Multiservice Grúas.</li>
                <li class="list-group-item textSize">Será por cuenta del cliente el traslado de contrapesos durante y dentro del recinto de faena.</li>
                <li class="list-group-item textSize">Cualquier daño o pérdida que pueda presentarse durante la faena a la grúa, será traspasada a Cliente.</li>
                <li class="list-group-item textSize">Será responsabilidad del cliente informar sobre la resistencia y condiciones del terreno y/o área de trabajo, en caso contrario, Multiservice Grúas se desliga de cualquier responsabilidad por daños que la Grúa pueda ocasionar.</li>
                <li class="list-group-item textSize">La tarifa tendrá un recargo de un 30% de Lunes a Viernes a partir de las 18.00 hrs. y los Sábados a partir de las 13.00 hrs. Domingo y Festivos durante todo el día.</li>
                <li class="list-group-item textSize">La planificación, control y manejo total de la prevención de riesgos será responsabilidad del cliente. Multiservice Grúas acatará en forma integral las políticas preventivas y disposiciones informadas formalmente por parte del cliente.</li>
                <li class="list-group-item textSize">En caso de que el tonelaje no sea el indicado para hacer el trabajo, el cliente debe cancelar el mínimo de horas y traslados involucrados.</li>
                <li class="list-group-item textSize">Si por fuerza mayor, ante algún evento inesperado (Grúa encerrada en faena, pannes, congestión del tránsito, etc.), la grúa se ve impedida de llegar en día y hora programada, no corresponderá ningún tipo de descuento ni cobro a Multiservice Grúas. Tampoco corresponderá el endoso de multas o infracciones de cualquier tipo.</li>
                <li class="list-group-item textSize">La orden de compra debe hacer referencia al número de cotización.</li>
                <li class="list-group-item textSize">Todos los seguros por riesgos involucrados en faena, son por cuenta del Cliente.</li>
                <li class="list-group-item textSize">La factura deberá cancelarse a los 30 días de su fecha de emisión como plazo máximo.</li>
                <li class="list-group-item textSize">La presente Cotización tiene validez de 5 días.</li>
                <li class="list-group-item textSize">Grúa sujeta a disponibilidad.</li>
            </ul>
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
