<!-- Modal -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">editar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actualiza.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" name="correo" id="correo" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <input type="text" name="rol" id="rol" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="ficha" class="form-label">Ficha</label>
                        <input type="text" name="ficha" id="ficha" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="activo" class="form-label">Activo</label>
                        <input type="text" name="activo" id="activo" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_ingreso" class="form-label">Fecha ingreso</label>
                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" rows="3"
                            required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="30" class="form-control" ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Genero</label>
                        <select name="genero" id="genero" class="form-select" required>
                            <option value="">
                                Seleccionar
                            </option>
                            <?php while($row_genero = $generos->fetch_assoc()){?>
                                <option value="<?php echo $row_genero["id"]; ?>"><?= $row_genero ["nombre"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster</label>
                        <input type="file" name="poster" id="poster" class="form-control" rows="3" accept="image/jpeg">
                    </div> -->
                    <div class="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>