<?php
require '../config/database.php';

$sqlorden = "SELECT id_orden, fk_pedido, observaciones, fecha_entrega, estado, fecha_expedicion/* , p.descripcion, g.nombre AS genero  */FROM ordenes" /* AS p INNER JOIN genero AS g ON 
p.id_genero = g.id" */;

$orden = $conn->query($sqlorden);

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
        <h2 class="text-center">Ordenes</h2>
        <div class="col-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i
                    class="fa-sharp fa-solid fa-circle-plus"></i>Nuevo Registro</a>
        </div>


        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Pedido</th>
                    <th>Observaciones</th>
                    <th>Fecha entrega</th>
                    <th>Estado</th>
                    <th>Fecha expedicion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row_orden = $orden->fetch_assoc()){?>
                <tr>
                    <td><?= $row_orden['id_orden']; ?></td>
                    <td><?= $row_orden['fk_pedido']; ?></td>
                    <td><?= $row_orden['observaciones']; ?></td>
                    <td><?= $row_orden['fecha_entrega']; ?></td>
                    <td><?= $row_orden['estado']; ?></td>
                    <td><?= $row_orden['fecha_expedicion']; ?></td>
                    <td></td>
                    <td>

                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-id="<?= $row_orden['id_orden']; ?>" data-bs-target="#editaModal"><i class="fa-regular fa-eye" style="font-size: 20px;"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-id="<?= $row_orden['id_orden']; ?>" data-bs-target="#eliminaModal"><i class="fa-regular fa-trash"></i>Eliminar</a>

                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>

    <?php 
$sqlOrden = "SELECT id_orden, fk_pedido, observaciones, fecha_entrega, estado, fecha_expedicion FROM ordenes";
$generos=$conn->query($sqlOrden);
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

        let inputId = editaModal.querySelector('.modal-body #id_orden')
        let inputPedido = editaModal.querySelector('.modal-body #fk_pedido')
        let inputObservaciones = editaModal.querySelector('.modal-body #observaciones')
        let inputFecha_entrega = editaModal.querySelector('.modal-body #fecha_entrega')
        let inputEstado = editaModal.querySelector('.modal-body #estado')
        let inputFecha_expedicion = editaModal.querySelector('.modal-body #fecha_expedicion')



        let url = "getPelicula.php"
        let formData = new FormData()
        formData.append('id_orden', id)

        fetch(url, {
            method:"POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.id_orden
            inputPedido.value = data.fk_pedido
            inputObservaciones.value = data.observaciones
            inputFecha_entrega.value = data.fecha_entrega
            inputEstado.value = data.estado
            inputFecha_expedicion.value = data.fecha_expedicion

        }).catch(err => console.log(err))

    })
    eliminaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        eliminaModal.querySelector('.modal-footer #id_orden').value = id
        
    })
    </script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>