<?php
require '../config/database.php';

$sqlusuario = "SELECT id, nombre, correo, contrasena, rol, ficha, activo, fecha_ingreso   /* , p.descripcion, g.nombre AS genero  */FROM usuarios WHERE activo=1 " /* AS p INNER JOIN genero AS g ON 
p.id_genero = g.id" */;

$usuario = $conn->query($sqlusuario);

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
        <h2 class="text-center">Usuarios</h2>
        <div class="col-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i
                    class="fa-sharp fa-solid fa-circle-plus"></i>Nuevo Registro</a>
        </div>


        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contrasena</th>
                    <th>Rol</th>
                    <th>Ficha</th>
                    <th>Activo</th>
                    <th>Fecha ingreso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row_usuario = $usuario->fetch_assoc()){?>
                <tr>
                    <td><?= $row_usuario['id']; ?></td>
                    <td><?= $row_usuario['nombre']; ?></td>
                    <td><?= $row_usuario['correo']; ?></td>
                    <td><?= $row_usuario['contrasena']; ?></td>
                    <td><?= $row_usuario['rol']; ?></td>
                    <td><?= $row_usuario['ficha']; ?></td>
                    <td><?= $row_usuario['activo']; ?></td>
                    <td><?= $row_usuario['fecha_ingreso']; ?></td>
                    <td>

                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-id="<?= $row_usuario['id']; ?>" data-bs-target="#editaModal"><i class="fa-regular fa-eye" style="font-size: 20px;"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-id="<?= $row_usuario['id']; ?>" data-bs-target="#eliminaModal"><i class="fa-regular fa-trash"></i>Eliminar</a>

                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>

    <?php 
$sqlUsuario = "SELECT id, nombre, correo, contrasena, rol, ficha, activo, fecha_ingreso FROM usuarios";
$generos=$conn->query($sqlUsuario);
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

        let inputId = editaModal.querySelector('.modal-body #id')
        let inputNombre = editaModal.querySelector('.modal-body #nombre')
        let inputCorreo = editaModal.querySelector('.modal-body #correo')
        let inputContrasena = editaModal.querySelector('.modal-body #contrasena')
        let inputRol = editaModal.querySelector('.modal-body #rol')
        let inputFicha = editaModal.querySelector('.modal-body #ficha')
        let inputActivo = editaModal.querySelector('.modal-body #activo')
        let inputIngreso = editaModal.querySelector('.modal-body #fecha_ingreso')



        let url = "getPelicula.php"
        let formData = new FormData()
        formData.append('id', id)

        fetch(url, {
            method:"POST",
            body: formData
        }).then(response => response.json())
        .then(data => {

            inputId.value = data.id
            inputNombre.value = data.nombre
            inputCorreo.value = data.correo
            inputContrasena.value = data.contrasena
            inputRol.value = data.rol
            inputFicha.value = data.ficha
            inputActivo.value = data.activo
            inputIngreso.value = data.fecha_ingreso


            
        }).catch(err => console.log(err))

    })
    eliminaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        eliminaModal.querySelector('.modal-footer #id').value = id
        
    })
    </script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>