<?php
require '../config/database.php';

$sqlmaterial = "SELECT id_material, nombre, fk_presentacion , cantidad, observaciones, precio /* , p.descripcion, g.nombre AS genero  */FROM material" /* AS p INNER JOIN genero AS g ON 
   p.id_genero = g.id" */;

$material = $conn->query($sqlmaterial);

$sqlherramienta = "SELECT id_herramienta, nombre, estado, fk_categoria, observaciones, consumo_hora, activo/* , p.descripcion, g.nombre AS genero  */FROM herramienta" /* AS p INNER JOIN genero AS g ON 
   p.id_genero = g.id" */;

$herramienta = $conn->query($sqlherramienta);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD MODAL</title>

    <link type="" href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link type="" href="../../assets/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h2 class="text-center">Añadir</h2>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Herramienta</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Material</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <h2 class="text-center">Herramientas</h2>
                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2 light-table-filter" data-table="table_id" type="text"
                            placeholder="Buscar herramienta">
                        <hr>
                    </form>
                </div>

                <br>


                <table class="table table-sm table-striped table-hover mt-4 table_id ">


                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Categoria</th>
                            <th>Observaciones</th>
                            <th>Consumo hora</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $conexion = mysqli_connect("localhost", "root", "", "sios");
                        $SQL = "SELECT h.id_herramienta, h.nombre, h.estado, c.nombre AS nombre_categoria, h.observaciones, h.consumo_hora FROM herramienta AS h INNER JOIN categoria AS c ON h.fk_categoria = c.id_categoria";
                        $dato = mysqli_query($conexion, $SQL);
                        if ($dato->num_rows > 0) {
                            while ($fila = mysqli_fetch_array($dato)) {

                                ?>
                                <tr>
                                    <td><?php echo $fila['id_herramienta']; ?></td>
                                    <td>
                                        <?php echo $fila['nombre']; ?>
                                    </td>
                                    <td><?php if ($fila['estado'] == 1) {
                                    echo "Disponible";} else {
                                    echo "Prestado";
                                    }; ?></td>
                                    <td>
                                        <?php echo $fila['nombre_categoria']; ?>
                                    </td>
                                    <td><?php echo $fila['observaciones']; ?></td>
                                    <td>
                                        <?php echo $fila['consumo_hora']; ?>
                                    </td>




                                    <td>


                                        <!--                                         <div action="validacionmat.php" method="POST" class="mb-3">
         --> <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-id="<?= $row_herramienta['id_herramienta']; ?>"
                                            data-bs-target="#editaModal"><!-- <i class="fa-regular fa-eye"
                                                        style="font-size: 20px;"></i> -->Añadir</a>
                                        <!--                                             <input type="submit" value="Añadir" class="btn btn-success" name="Añadir">
         -->

                    </div>

                    </td>
                    </tr>


                    <?php
                            }
                        } else {

                            ?>
                <tr class="text-center">
                    <td colspan="16">No existe ese material</td>
                </tr>


                <?php

                        }

                        ?>


</body>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!-- <script src="../js/user.js"></script> -->
<!-- <script src="../js/acciones.js"></script> -->
<script src="buscador.js"></script>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <h2 class="text-center">Materiales</h2>
    <div class="container-fluid">
        <form class="d-flex">
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text"
                placeholder="Buscar material">
            <hr>
        </form>
    </div>

    <br>


    <table class="table table-sm table-striped table-hover mt-4 table_id ">


        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Presentacion</th>
                <th>Cantidad</th>
                <th>Obaservaciones</th>
                <th>Precio</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>

            <?php

            $conexion = mysqli_connect("localhost", "root", "", "sios");
            $SQL = "SELECT m.id_material, m.nombre, p.nombre AS nombre_presentacion, m.cantidad, m.observaciones, m.precio FROM material AS m INNER JOIN  presentacion AS p ON m.fk_presentacion = p.id_presentacion";
            $dato = mysqli_query($conexion, $SQL);

            if ($dato->num_rows > 0) {
                while ($fila = mysqli_fetch_array($dato)) {

                    ?>
                    <tr>
                        <td><?php echo $fila['id_material']; ?></td>
                        <td>
                            <?php echo $fila['nombre']; ?>
                        </td>
                        <td><?php echo $fila['nombre_presentacion']; ?></td>
                        <td>
                            <?php echo $fila['cantidad']; ?>
                        </td>
                        <td><?php echo $fila['observaciones']; ?></td>
                        <td>
                            <?php echo $fila['precio']; ?>
                        </td>




                        <td>


                            <!--                                         <div action="validacionmat.php" method="POST" class="mb-3">
         --> <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-id="<?= $row_herramienta['id_herramienta']; ?>" data-bs-target="#editaModal"><!-- <i class="fa-regular fa-eye"
                                                        style="font-size: 20px;"></i> -->Añadir</a>
                            <!--                                             <input type="submit" value="Añadir" class="btn btn-success" name="Añadir">
         -->

        </div>

        </td>
        </tr>


    <?php
    }
            } else {

                ?>
    <tr class="text-center">
        <td colspan="16">No existe ese material</td>
    </tr>


<?php

            }

            ?>


</body>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!-- <script src="../js/user.js"></script> -->
<!-- <script src="../js/acciones.js"></script> -->
<script src="buscador.js"></script>
</div>

<?php
$sqlMaterial = "SELECT id_material, nombre, fk_presentacion, cantidad, observaciones, precio FROM material";
$generosMaterial = $conn->query($sqlMaterial);
?>
<!-- <?php include 'nuevoModal.php'; ?> -->

<?php
$generosMaterial->data_seek(0);
?>
</div>



</div>


</script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>