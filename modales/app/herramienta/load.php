<?php



require '../config/database.php';

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_herramienta, nombre, estado, fk_categoria, observaciones, consumo_hora, activo'];

/* Nombre de la tabla */
$table = "herramienta";


$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;



/* Filtrado */
$where = '';


if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}
;

/* Limit */
/* $limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";
 */

/* Consulta */
$sql = "SELECT " . implode(", ", $columns) . " 
FROM $table
$where ";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

$html = '';

/* /* Consulta para total de registro filtrados 
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

/* Consulta para total de registro filtrados 
$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0]; */

/* Mostrado resultados 
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';*/
/* echo ($num_rows. "siuuuuuu");
echo ($campo); */
if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row['id_herramienta'] . '</td>';
        $html .= '<td>' . $row['nombre'] . '</td>';
        $html .= '<td>' . $row['estado'] . '</td>';
        $html .= '<td>' . $row['fk_categoria'] . '</td>';
        $html .= '<td>' . $row['observaciones'] . '</td>';
        $html .= '<td>' . $row['consumo_hora'] . '</td>';
        $html .= '<td>' . $row['activo'] . '</td>';
        /* $html .= '<td><a href="">Editar</a></td>';
        $html .= '<td><a href="">Eliminar</a></td>'; */
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}



echo json_encode($html, JSON_UNESCAPED_UNICODE);