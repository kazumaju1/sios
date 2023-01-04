<?php
require '../config/database.php';

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
    <?php include('../funciones/navbar.php'); ?>
    <div class="container py-3">
        <h2 class="text-center">Herramientas</h2>
        <div class="col-auto">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-sharp fa-solid fa-circle-plus"></i>Nuevo Registro</a>
        </div>
        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar herramienta">
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
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php if ($fila['estado'] == 1) {
                                    echo "Disponible";
                                } else {
                                    echo "Prestado";
                                }; ?></td>
                            <td><?php echo $fila['nombre_categoria']; ?></td>
                            <td><?php echo $fila['observaciones']; ?></td>
                            <td><?php echo $fila['consumo_hora']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-id="<?= $fila['id_herramienta']; ?>" data-bs-target="#editaModal"><i class="fa-regular fa-eye" style="font-size: 20px;"></i></a>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-id="<?= $fila['id_herramienta']; ?>" data-bs-target="#eliminaModal"><i class="fa-regular fa-trash"></i>Eliminar</a>
                            </td>
                        </tr>
    </div>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!-- <script src="../js/user.js"></script> -->
<!-- <script src="../js/acciones.js"></script> -->
<script src="buscador.js"></script>

</div>

<?php
$sqlHerramienta = "SELECT id_herramienta, nombre, estado, fk_categoria, observaciones, consumo_hora FROM herramienta";
$generos = $conn->query($sqlHerramienta);
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

        let inputId = editaModal.querySelector('.modal-body #id_herramienta')
        let inputNombre = editaModal.querySelector('.modal-body #nombre')
        let inputEstado = editaModal.querySelector('.modal-body #estado')
        let inputCategoria = editaModal.querySelector('.modal-body #fk_categoria')
        let inputObservaciones = editaModal.querySelector('.modal-body #observaciones')
        let inputConsumo_hora = editaModal.querySelector('.modal-body #consumo_hora')



        let url = "getPelicula.php"
        let formData = new FormData()
        formData.append('id_herramienta', id)

        fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {

                inputId.value = data.id_herramienta
                inputNombre.value = data.nombre
                inputEstado.value = data.estado
                inputCategoria.value = data.fk_categoria
                inputObservaciones.value = data.observaciones
                inputConsumo_hora.value = data.consumo_hora

            }).catch(err => console.log(err))

    })
    eliminaModal.addEventListener('show.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        eliminaModal.querySelector('.modal-footer #id_herramienta').value = id

    })
</script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>