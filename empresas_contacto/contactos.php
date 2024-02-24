<?php
$idEmpresa = $_GET["id"];

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
                <a class="btn btn-secondary m-1" href="#" role="button">COTIZACIONES</a>
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
                    <h2 class="text-center">Ingreso de contactos</h2>
                    <!-- Formulario -->
                    <form method="POST">
                        <?php
                        include "../conexiones/conexion.php";
                        include "../controlador/registro_contactos.php";
                        ?>
                        <!-- Casilla para obtener id empresa y referenciar -->
                        <div class="mb-3 col">
                            <input type="hidden" name="idEmpresa" value="<?= $_GET["id"] ?>">
                            <!-- <div id="rutHelp" class="form-text">Sin punto y con guion.</div> -->
                        </div>
                        <!-- Casilla nombre -->
                        <div class="mb-3 col-6">
                            <label for="rutEmpresa" class="form-label">Nombre contacto</label>
                            <input type="text" class="form-control" name="nombreContacto">
                            <div id="rutHelp" class="form-text">Ejemplo: Carlos Contreras.</div>
                        </div>
                        <!-- Casilla telefono -->
                        <div class="mb-3 col-6">
                            <label for="nombreEmpresa" class="form-label">Telefono contacto</label>
                            <input type="text" class="form-control" name="telefonoContacto">
                            <div id="rutHelp" class="form-text">Maximimo 9 caracteres ejemplo: 912345678.</div>
                        </div>
                        <!-- Casilla email -->
                        <div class="mb-3 col-6">
                            <label for="nombreEmpresa" class="form-label">Email contacto</label>
                            <input type="email" class="form-control" name="emailContacto">
                            <div id="rutHelp" class="form-text">Recuerde caracter fundamental "@".</div>
                        </div>

                        <!-- Boton registrar contacto -->
                        <button type="submit" class="btn btn-primary mb-3" name="btnRegistrar" value="ok">Ingresar</button>
                    </form>
                </div>            
            </div>
            <!--Contendor resumen contactos  -->
            <div class="col-xxl-5 m-1">
                <!-- Tabla de resumen de contactos -->
                <div class="col m-1 p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                    <!-- Titulo tabla -->
                    <h2 class="text-center">Resumen de contactos</h2>
                    <!-- Tabla -->
                    <table class="table">
                        <thead">
                            <tr>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // conectamos con base datos y ejecutamos query
                            include "../conexiones/conexion.php";                        
                            $sql = $conn->query(" SELECT * FROM contactos WHERE id_empresas = $idEmpresa");
                            while($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><?= $datos->nombre ?></td>
                                    <td><?= $datos->telefono ?></td>
                                    <td><?= $datos->email ?></td>
                                <td>
                                    <a class="btn btn-warning" href="contactos_modificar.php?id=<?= $datos->id_contacto ?>"><i class="bi bi-person-fill-gear"></i></a>
                                    <a class="btn btn-danger" href=""><i class="bi bi-person-dash-fill"></i></a>
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