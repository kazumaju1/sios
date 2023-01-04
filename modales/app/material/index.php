<?php
require '../config/database.php';

$sqlmaterial = "SELECT id_material, nombre, fk_presentacion , cantidad, observaciones, precio /* , p.descripcion, g.nombre AS genero  */FROM material" /* AS p INNER JOIN genero AS g ON 
p.id_genero = g.id" */;

$material = $conn->query($sqlmaterial);

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
        <h2 class="text-center">Materiales</h2>
        <div class="col-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-sharp fa-solid fa-circle-plus"></i>Nuevo Registro</a>
        </div>


        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar material">
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


                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-id="<?= $fila['id_material']; ?>" data-bs-target="#editaModal"><i class="fa-regular fa-eye" style="font-size: 20px;"></i></a>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-id="<?= $fila['id_material']; ?>" data-bs-target="#eliminaModal"><i class="fa-regular fa-trash"></i>Eliminar</a>



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


</tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!-- <script src="../js/user.js"></script> -->
<!-- <script src="../js/acciones.js"></script> -->
<script src="../buscador/buscador.js"></script>


</div>

<?php
$sqlMaterial = "SELECT id_material, nombre, fk_presentacion, cantidad, observaciones, precio FROM material";
$generos = $conn->query($sqlMaterial);
?>
<?php include 'nuevoModal.php'; ?>

<?php
$generos->data_seek(0);
?>

<?php include 'editaModal.php'; ?>
<?php include 'eliminaModal.php'; ?>

<script>
    let editaModal = document.getElementById('editaModal')
    let eliminaModal = document.getElementById('eliminaModal')

    editaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let inputId = editaModal.querySelector('.modal-body #id_material')
        let inputNombre = editaModal.querySelector('.modal-body #nombre')
        let inputPresentacion = editaModal.querySelector('.modal-body #fk_presentacion')
        let inputCantidad = editaModal.querySelector('.modal-body #cantidad')
        let inputObservaciones = editaModal.querySelector('.modal-body #observaciones')
        let inputPrecio = editaModal.querySelector('.modal-body #precio')



        let url = "getPelicula.php"
        let formData = new FormData()
        formData.append('id_material', id)

        fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {

                inputId.value = data.id_material
                inputNombre.value = data.nombre
                inputPresentacion.value = data.fk_presentacion
                inputCantidad.value = data.fk_cantidad
                inputObservaciones.value = data.observaciones
                inputPrecio.value = data.precio

            }).catch(err => console.log(err))

    })
    eliminaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        eliminaModal.querySelector('.modal-footer #id_material').value = id

    })
</script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>