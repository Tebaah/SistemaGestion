<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="estilos/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!-- Contenedor resumen de clientes -->
    <div class="col-10 m-1">
                <!-- Tabla de resumen de clientes -->
                <div class="col p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                        <!-- Titulo tabla -->
                        <h2 class="text-center">Resumen de clientes</h2>
                        <!-- Tabla -->
                        <table class="table p-1">
                            <!-- encabezado de la tabla -->
                            <thead">
                                <tr>
                                <th scope="col">RUT</th>
                                <th scope="col">EMPRESA</th>
                                <th scope="col">CONTACTO</th>
                                </tr>
                            </thead>
                            <!-- cuerpo de la tabla -->
                            <tbody>
                                <?php
                                // conectamos con base de datos y ejecutamos query para obtner los datos
                                include "../conexiones/conexion.php";                        
                                $sql = $conn->query(" SELECT * FROM empresas");
                                
                                // recorremos los datos para insertarlos en la tabla
                                while($datos = $sql->fetch_object()) { ?>
                                    <tr>                                
                                        <td><?= $datos->rut ?></td>
                                        <td><?= $datos->nombre ?></td>
                                    <td>
                                        <a class="btn btn-success" href="contactos.php?id=<?= $datos->id_empresa ?>"><i class="bi bi-person-plus-fill"></i></a>
                                    </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <div>
                    </div>
                </div>  


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>