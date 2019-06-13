<?php
    include '../extends/header.php';

    $clave = htmlentities($_GET['clave']);
    $sel = $conn->prepare('SELECT * FROM inventario WHERE clave = ?');
    $sel->execute(array($clave));
    foreach ($sel as $key => $value) {
    
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">EDITAR INVENTARIO</h4>
                        <p class="card-category">Complete los campos</p>
                    </div>
                    <div class="card-body">
                        <form action="update_imagenes.php" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Producto</label>
                                        <input type="hidden" name="clave" value="<?php echo $clave; ?>">
                                        <input type="text" name="producto" id="txtProducto" class="form-control"
                                            required value="<?php echo $value['producto'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Cantidad</label>
                                        <input type="text" name="cantidad" id="txtCantidad" class="form-control"
                                            required value="<?php echo $value['cantidad']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Precio</label>
                                        <input type="number" step="0.01" name="precio" class="form-control" required value="<?php echo $value['precio']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="img-fluid">
                                            <img src="<?php echo $value['foto']; ?>" width="70" height="70">
                                            <input type="hidden" name="anterior" value="<?php echo $value['foto']; ?>"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="file-upload">
                                            <div class="file-select">
                                                <div class="file-select-button" id="fileName">Seleccionar</div>
                                                <div class="file-select-name" id="noFile">No hay archivos</div>
                                                <input type="file" name="imagen" id="imagen">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select id="selectCategoria" name="categoria" class="form-control" required>
                                            <option value="<?php echo $value['categoria']; ?>"><?php echo $value['categoria']; ?></option>
                                            <option value="MODA">MODA</option>
                                            <option value="ELECTRONICA">ELECTRONICA</option>
                                            <option value="JOYERIA">JOYERIA</option>
                                            <option value="RELOJES">RELOJES</option>
                                            <option value="HOGAR">HOGAR</option>
                                            <option value="ZAPATOS">ZAPATOS</option>
                                            <option value="VIDEO JUEGOS">VIDEO JUEGOS</option>
                                            <option value="LIBROS">LIBROS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Descripción</label>
                                        <textarea id="txtDescripcion" name="descripcion" cols="30" rows="6"
                                            class="form-control" required><?php echo $value['descripcion']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button id="saveProducto" type="submit" class="btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php    
    }
    include '../extends/footer.php';
    ?>