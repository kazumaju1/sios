<?php
require '../config/database.php';

$sqlinventario = "SELECT i.id_inventario, i.fk_usuario, i.observaciones, i.fecha_in, i.fecha_fin, 
CONCAT(GROUP_CONCAT(DISTINCT lh.cantidad,'-', h.nombre SEPARATOR ',⠀')) AS herramienta, 
CONCAT(GROUP_CONCAT(DISTINCT lm.cantidad, '-', m.nombre SEPARATOR ', ')) AS material   
FROM inventario AS i INNER JOIN lista_herramienta AS lh ON lh.fk_inventario = i.id_inventario 
INNER JOIN lista_material AS lm ON lm.fk_inventario = i.id_inventario 
INNER JOIN herramienta AS h ON h.id_herramienta = lh.fk_herramienta 
INNER JOIN material AS m ON m.id_material = lm.fk_material GROUP BY i.id_inventario";
/* "SELECT i.id_inventario, i.fk_usuario, i.observaciones, i.fecha_in, i.fecha_fin, CONCAT(GROUP_CONCAT(DISTINCT lh.cantidad,'-', h.nombre SEPARATOR ',⠀')) AS herramienta, CONCAT(GROUP_CONCAT(DISTINCT lm.cantidad, '-', m.nombre SEPARATOR ', ')) AS material   FROM inventario AS i INNER JOIN lista_herramienta AS lh ON lh.fk_inventario = i.id_inventario INNER JOIN lista_material AS lm ON lm.fk_inventario = i.id_inventario INNER JOIN herramienta AS h ON h.id_herramienta = lh.fk_herramienta INNER JOIN material AS m ON m.id_material = lm.fk_material GROUP BY i.id_inventario";  */

$inventario = $conn->query($sqlinventario);

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
        <h2 class="text-center">Prestamos</h2>
        <div class="col-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i
                    class="fa-sharp fa-solid fa-circle-plus"></i>Nuevo Registro</a>
        </div>


        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Observaciones</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Herramientas</th>
                    <th>Material</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row_inventario = $inventario->fetch_assoc()){?>
                <tr>
                    <td><?= $row_inventario['id_inventario']; ?></td>
                    <td><?= $row_inventario['fk_usuario']; ?></td>
                    <td><?= $row_inventario['observaciones']; ?></td>
                    <td><?= $row_inventario['fecha_in']; ?></td>
                    <td><?= $row_inventario['fecha_fin']; ?></td>
                    <td><?= $row_inventario['herramienta']; ?></td>
                    <td><?= $row_inventario['material']; ?></td>
                    <td></td>
                    <td>

                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-id="<?= $row_inventario['id_inventario']; ?>" data-bs-target="#editaModal"><i class="fa-regular fa-eye" style="font-size: 20px;"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-id="<?= $row_inventario['id_inventario']; ?>" data-bs-target="#eliminaModal"><i class="fa-regular fa-trash"></i>Eliminar</a>

                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>

    <?php 
$sqlInventario = "SELECT i.id_inventario, i.fk_usuario, i.observaciones, i.fecha_in, i.fecha_fin, 
CONCAT(GROUP_CONCAT(DISTINCT lh.cantidad,'-', h.nombre SEPARATOR ',⠀')) AS herramienta, 
CONCAT(GROUP_CONCAT(DISTINCT lm.cantidad, '-', m.nombre SEPARATOR ', ')) AS material   
FROM inventario AS i INNER JOIN lista_herramienta AS lh ON lh.fk_inventario = i.id_inventario 
INNER JOIN lista_material AS lm ON lm.fk_inventario = i.id_inventario 
INNER JOIN herramienta AS h ON h.id_herramienta = lh.fk_herramienta 
INNER JOIN material AS m ON m.id_material = lm.fk_material  GROUP BY i.id_inventario ";
/* "SELECT i.id_inventario, i.fk_usuario, i.observaciones, i.fecha_in, i.fecha_fin, CONCAT(GROUP_CONCAT(DISTINCT lh.cantidad,'-', h.nombre SEPARATOR ',⠀')) AS herramienta, CONCAT(GROUP_CONCAT(DISTINCT lm.cantidad, '-', m.nombre SEPARATOR ', ')) AS material   FROM inventario AS i INNER JOIN lista_herramienta AS lh ON lh.fk_inventario = i.id_inventario INNER JOIN lista_material AS lm ON lm.fk_inventario = i.id_inventario INNER JOIN herramienta AS h ON h.id_herramienta = lh.fk_herramienta INNER JOIN material AS m ON m.id_material = lm.fk_material GROUP BY i.id_inventario"; */

$generos=$conn->query($sqlInventario);
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

        let inputId = editaModal.querySelector('.modal-body #id_inventario')
        let inputUsuario = editaModal.querySelector('.modal-body #fk_usuario')
        let inputObservaciones = editaModal.querySelector('.modal-body #observaciones')
        let inputFecha_in = editaModal.querySelector('.modal-body #fecha_in')
        let inputFecha_fin = editaModal.querySelector('.modal-body #fecha_fin')
        let inputHerramienta = editaModal.querySelector('.modal-body #herramienta')
        let inputMaterial = editaModal.querySelector('.modal-body #material')



        let url = "getPelicula.php"
        let formData = new FormData()
        formData.append('id_inventario', id)

        fetch(url, {
            method:"POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.id_inventario
            inputUsuario.value = data.fk_usuario
            inputObservaciones.value = data.observaciones
            inputFecha_in.value = data.fecha_in
            inputFecha_fin.value = data.fecha_fin
            inputHerramienta.value = data.herramienta
            inputMaterial.value = data.material

        }).catch(err => console.log(err))

    })
    eliminaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        eliminaModal.querySelector('.modal-footer #id_inventario').value = id
        
    })
    </script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>