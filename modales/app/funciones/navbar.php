<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css" type="text/css">
</head>

<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="../img/logo_sios.png" alt="" width="120" height="50">
                </a>

                <a class="navbar-brand" href="#">MENU</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown col-md-5">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    INVENTARIO
                                </a>

                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../categoria/categoria_index.php">Categoria</a></li>
                                    <li><a class="dropdown-item" href="../herramienta/herramienta_index.php">Herramientas</a></li>
                                    <li><a class="dropdown-item" href="../herramienta/herramienta_index.php">Herramientas</a></li>
                                    <li><a class="dropdown-item" href="../material/material_index.php">Materiales</a></li>
                                    <li><a class="dropdown-item" href="../prestamo/prestamo_index.php">Prestamos</a></li>
                                    <li><a class="dropdown-item" href="#">Historial</a></li>
                                    <li><a class="dropdown-item" href="../estadisticas/estadisticas_index.php"">Estadisticas</a></li>

                                </ul>

                            </li>

                            <li class="nav-item dropdown col-md-6">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ORDENES DE SERVICIO
                                </a>
                                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../ordenes/ordenes_index.php">Historial de Ordenes</a></li>
                                    <li><a class="dropdown-item" href="../pedidos_orden/pedido_orden_index.php">Historial de Pedidos</a></li>
                                    <li><a class="dropdown-item" href="#">Crear Pedidos</a></li>
                                    <li><a class="dropdown-item" href="#">Crear Orden</a></li>
                                    <li><a class="dropdown-item" href="../usuarios/usuarios_index.php">Admin. Usuarios</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end bg-dark" aria-labelledby="dropdownMenuButton1" style="margin-top: -10px;">
                        <li><a class="dropdown-item" href="#">Cuenta</a></li>
                        <li><a class="dropdown-item" href="#">Admin. de Usuarios</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Cerrar Sesion</a></li>

                    </ul>
                </div>


            </div>

        </nav>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>