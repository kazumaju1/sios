<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Agregar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="guarda.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" name="estado" id="estado" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="fk_categoria" class="form-label">Categoria</label>
                        <input type="text" name="fk_categoria" id="fk_categoria" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <input type="text" name="observaciones" id="observaciones" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="consumo_hora" class="form-label">Consumo hora</label>
                        <input type="text" name="consumo_hora" id="consumo_hora" class="form-control" rows="3" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="30" class="form-control"></textarea>
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