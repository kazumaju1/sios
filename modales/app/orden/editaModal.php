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
                    <input type="hidden" name="id_orden" id="id_orden">
                    <div class="mb-3">
                        <label for="fk_pedido" class="form-label">Pedido</label>
                        <input type="text" name="fk_pedido" id="fk_pedido" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <input type="text" name="observaciones" id="observaciones" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_entrega" class="form-label">Fecha entrega</label>
                        <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" name="estado" id="estado" class="form-control" rows="3" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_expedicion" class="form-label">Fecha expedicion</label>
                        <input type="date" name="fecha_expedicion" id="fecha_expedicion" class="form-control" rows="3" required>
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