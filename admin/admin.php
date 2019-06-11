<?php include '../extends/header.php' ?>
<div class="row">
    <div class="card col-md-6">
        <div class="card-header">
            <h4 class="card-title">Inventario</h4>
        </div>
        <div class="card-body">
            <form action="ins_inventario.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="producto" id="txtProducto" class="form-control" placeholder="Producto" required>
                </div>
                <div class="form-group">
                    <input type="text" name="cantidad" id="txtCantidad" class="form-control col-sm-2" placeholder="Cantidad" required> 
                </div>
                <div class="form-group">
                    <input type="number" step="0.01" name="precio" class="form-control col-sm-2" placeholder="Precio" required>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen" id="customFileLang" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                    </div>
                </div>
                <div class="form-group">
                    <select id="selectCategoria" name="categoria" class="form-control" required>
                        <option value="" disabled="" selected="">Elige una categoria</option>
                        <option value="MODA">MODA</option>
                        <option value="ELECTRONICA">ELECTRONICA</option>
                        <option value="JOYERIA">JOYERIA</option>
                        <option value="RELOJES">RELOJES</option>
                        <option value="HOGAR">HOGAR</option>
                        <option value="ZAPATOS">ZAPATOS</option>
                    </select>
                </div>                
                <div class="form-group">
                    <textarea id="txtDescripcion" name="descripcion" cols="30" rows="6" class="form-control" required></textarea>
                </div>
                
                <button id="saveProducto" type="submit" class="btn btn-info">Guardar</button>
            </form>
        </div>
    </div>
</div>
<?php include '../extends/footer.php' ?>
