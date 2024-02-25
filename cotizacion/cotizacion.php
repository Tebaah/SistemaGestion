<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="estilos/style.css" rel="stylesheet">
    <title>Sistema de Gestion</title>
</head>
<body class="bg-dark">
    <head>
        <nav class="navbar bg-dark">
            <form class="container-fluid justify-content-end">
                <a class="btn btn-secondary m-1" href="../index.php" role="button">HOME</a>
                <a class="btn btn-secondary m-1" href="../empresas_contacto/clientes.php" role="button">CLIENTES</a>
            </form>
            </nav>
    </head>
    <main>
        <!-- Contenedor pagina-->
        <div class="d-flex row global justify-content-center align-items-stretch m-5">
            <!-- Contenedor ingreso de cotizaciones -->
            <div class="col-xxl-5 m-1">
                <!-- Formulario de ingreso contizacion -->
                <div class="col m-1 p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                        <!-- Titulo formulario -->
                        <h2 class="text-center">Ingreso de cotizacion</h2>
                        <!-- Formulario -->
                        <form method="POST">
                            <?php
                            include "../conexiones/conexion.php";
                            include "../controlador/registro_cotizacion.php";
                            ?>
                            <!-- Casilla fecha -->
                            <div class="mb-3 col-3">
                                <label for="fechaCotizacion" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="fechaCotizacion" id="rutEmpresa">
                                <div id="rutHelp" class="form-text">Fecha cotizacion.</div>
                            </div>
                            <!-- Casilla id contactos -->
                            <div class="mb-3 col-3">
                                <label for="contactoCotizacion" class="form-label">Contacto Empresa</label>
                                <input type="text" class="form-control" name="contactoCotizacion">
                                <div id="rutHelp" class="form-text">Ingresa id contacto de buscador.</div>
                            </div>
                            <!-- Casilla ejecutivos -->
                            <div class="mb-3 col-3">
                                <label for="ejecutivosCotizacion" class="form-label">Ejecutivos Empresa</label>
                                <input type="text" class="form-control" name="ejecutivosCotizacion">
                                <div id="rutHelp" class="form-text">Maximo 255 caracteres incluidos espacios.</div>
                            </div>
                            <!-- Casilla direccion -->
                            <div class="mb-3 col-3">
                                <label for="direccionCotizacion" class="form-label">Direccion faena</label>
                                <input type="text" class="form-control" name="direccionCotizacion">
                                <div id="rutHelp" class="form-text">Maximo 255 caracteres incluidos espacios.</div>
                            </div>
                            <!-- Casilla detalle -->
                            <div class="mb-3 col-3">
                                <label for="detalleCotizacion" class="form-label">Detalle faena</label>
                                <input type="text" class="form-control" name="detalleCotizacion">
                                <div id="rutHelp" class="form-text">Maximo 255 caracteres incluidos espacios.</div>
                            </div>
                            <!-- Casilla notas -->
                            <div class="mb-3 col-3">
                                <label for="notasCotizacion" class="form-label">Notas faena</label>
                                <input type="text" class="form-control" name="notasCotizacion">
                                <div id="rutHelp" class="form-text">Maximo 255 caracteres incluidos espacios.</div>
                            </div>
                            <!-- Botones registrar empresa -->
                            <button type="submit" class="btn btn-primary mb-3" name="btnRegistrar" value="ok">Ingresar</button>                        
                        </form>
                </div>
            </div>
            <!-- Contenedor buscador de contactos -->
            <div class="col-xxl-5 m-1">
                    <!-- Tabla de resumen de contactos -->
                    <div class="col m-1 p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                            <!-- Titulo tabla -->
                            <h2 class="text-center">Buscador de contactos</h2>
                            <!-- Casilla para buscar -->
                                <form method="GET">
                                    <div class="mb-3 col-4">
                                        <label for="buscarContacto" class="form-label">Buscar contactos</label>
                                        <input type="text" class="form-control" name="buscarContacto">
                                        <div id="rutHelp" class="form-text">Ingresar rut de empresa sin punto y con guion.</div>
                                    </div>
                                    <!-- Boton de busqueda -->
                                    <button type="submit" class="btn btn-primary mb-3" name="btnBuscar" value="Buscar">Buscar</button>
                                </form>
                            <!-- Tabla -->
                            <table class="table p-1">
                                <!-- encabezado de la tabla -->
                                <thead">
                                    <tr>
                                    <th scope="col">RUT</th>
                                    <th scope="col">EMPRESA</th>
                                    <th scope="col">ID CONTACTO</th>
                                    <th scope="col">NOMBRE</th>
                                    </tr>
                                </thead>
                                <!-- cuerpo de la tabla -->
                                <tbody>
                                    <?php                                
                                    // conectamos con base de datos y ejecutamos query para obtner los datos
                                    include "../conexiones/conexion.php"; 
                                                                        
                                    $buscarEmpresa = $_GET['buscarContacto'];                                    

                                    if(isset($_GET['btnBuscar']) and !empty($buscarEmpresa))
                                    {

                                        $sql = $conn->query(" SELECT * FROM empresas e INNER JOIN contactos c WHERE e.rut_empresa LIKE '%$buscarEmpresa%'");


                                        // recorremos los datos para insertarlos en la tabla
                                        while($datos = $sql->fetch_object()) { ?>
                                        <tr>
                                            <td><?= $datos->rut_empresa ?></td>                              
                                            <td><?= $datos->nombre_empresa ?></td>
                                            <td><?= $datos->id_contacto ?></td>
                                            <td><?= $datos->nombre_contacto ?></td>
                                        </tr>
                                    <?php }                                                                            
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="d-flex row global justify-content-center align-items-stretch m-5">                    
            <!-- Contenedor resumen de cotizaciones -->
            <div class="col-xxl-10 m-1">
                <!-- Tabla de resumen de clientes -->
                <div class="col m-1 p-2 bg-dark-subtle border border-5 border-dark-subtle rounded-4">
                        <!-- Titulo tabla -->
                        <h2 class="text-center">Buscador de cotizaciones</h2>
                        <!-- Casilla para buscar -->
                            <form method="GET">
                                <div class="mb-3 col-4">
                                    <label for="buscarEmpresa" class="form-label">Buscar Empresa</label>
                                    <input type="text" class="form-control" name="buscarEmpresa">
                                    <div id="rutHelp" class="form-text">Sin punto y con guion.</div>
                                </div>
                                <!-- Boton de busqueda -->
                                <button type="submit" class="btn btn-primary mb-3" name="btnBuscar" value="Buscar">Buscar</button>
                            </form>
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
                                
                                $buscar = $_GET['buscarEmpresa'];

                                if(isset($_GET['btnBuscar']) and !empty($buscar))
                                {                                                                   
                                    $sql = $conn->query(" SELECT * FROM empresas WHERE rut LIKE '%$buscar%'");

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
                                }
                                ?>
                            </tbody>
                        </table>
                        <div>
                    </div>
                </div>
            </div>          
        </div>
    </main>
      

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>