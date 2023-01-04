<?php
require '../config/database.php';

$sqlcategoria = "SELECT id_categoria, nombre/* , p.descripcion, g.nombre AS genero  */FROM categoria" /* AS p INNER JOIN genero AS g ON 
p.id_genero = g.id" */;

$categoria = $conn->query($sqlcategoria);

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
        <h2 class="text-center">Peliculas</h2>
        <div class="col-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i
                    class="fa-sharp fa-solid fa-circle-plus"></i>Nuevo Registro</a>
        </div>


        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <!-- <th>Descripcion</th>
                    <th>Genero</th>
                    <th>Poster</th>
                    <th>Accion</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row_categoria = $categoria->fetch_assoc()){?>
                <tr>
                    <td><?= $row_categoria['id_categoria']; ?></td>
                    <td><?= $row_categoria['nombre']; ?></td>
                    <!-- <td><?= $row_categoria['descripcion']; ?></td>
                    <td><?= $row_categoria['genero']; ?></td> -->
                    <td></td>
                    <td>

                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-id="<?= $row_categoria['id_categoria']; ?>" data-bs-target="#editaModal"><i class="fa-regular fa-eye" style="font-size: 20px;"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-id="<?= $row_categoria['id_categoria']; ?>" data-bs-target="#eliminaModal"><i class="fa-regular fa-trash"></i>Eliminar</a>

                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>

    <?php 
$sqlCategoria = "SELECT id_categoria, nombre FROM categoria";
$generos=$conn->query($sqlCategoria);
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

        let inputId = editaModal.querySelector('.modal-body #id_categoria')
        let inputNombre = editaModal.querySelector('.modal-body #nombre')
        /* let inputDescripcion = editaModal.querySelector('.modal-body #descripcion')
        let inputGenero = editaModal.querySelector('.modal-body #genero') */

        let url = "getPelicula.php"
        let formData = new FormData()
        formData.append('id_categoria', id)

        fetch(url, {
            method:"POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.id_categoria
            inputNombre.value = data.nombre
            /* inputDescripcion.value = data.descripcion
            inputGenero.value = data.id_genero */

        }).catch(err => console.log(err))

    })
    eliminaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        eliminaModal.querySelector('.modal-footer #id_categoria').value = id
        
    })
    </script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>