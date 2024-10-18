<!-- Modal -->
<div class="modal fade" id="modalformRol" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formRol" name="formRol">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del rol" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del rol" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="exampleSelect1">Estado</label>
                                <select class="form-control" id="listStatus" name="listStatus" required>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Guardar</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>