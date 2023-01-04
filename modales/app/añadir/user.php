<div class="container-fluid">
  <br>
  <br>
  <h1>Lista Materiales</h1>
  <br>
  <br>
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 
           


			</form>
      <div class="container-fluid">
  <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar material">
      <hr>
      </form>
  </div>

  <br>

 
      <table class="table table-striped table-dark table_id ">

                   
                         <thead>    
                         <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Acciones</th>
         
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","","sios");               
$SQL="SELECT id_material, nombre, fk_presentacion, cantidad, observaciones, precio FROM material";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['id_material']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['fk_presentacion']; ?></td>
<td><?php echo $fila['cantidad']; ?></td>
<td><?php echo $fila['observaciones']; ?></td>
<td><?php echo $fila['precio']; ?></td>




<td>


<div action="validacionmat.php" method="POST"class="mb-3">

                                    <input  type="submit" value="Añadir"class="btn btn-success" 
                                    name="Añadir">
                                   
                                    
                                 </div>

</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existe ese material</td>
    </tr>

    
    <?php
    
}

?>


	</body>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!-- <script src="../js/user.js"></script> -->
<!-- <script src="../js/acciones.js"></script> -->
<script src="buscador.js"></script>




		
</html>
    