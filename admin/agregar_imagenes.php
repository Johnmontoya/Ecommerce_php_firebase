<?php
    include '../extends/header.php';

    $clave = htmlentities($_GET['clave']);
    $sel = $conn->prepare("SELECT producto, foto FROM inventario WHERE clave = ?");
    $sel->execute(array($clave));
    if ($f = $sel->fetch()) { 
    }            
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">AGREGAR IMAGENES</h4>
                        <p class="card-category">agregue las imagenes que desea mostrar</p>
                    </div>
                    <div class="card-body">
                        <form action="ins_imagenes.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="clave" value="<?php echo $clave ?>">
                                        <img src="<?php echo $f['foto']; ?>" width="60" hegith="60">
                                        <div><?php echo $f['producto']; ?></div>
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
                                                <input type="file" name="imagen[]" id="imagen" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
            <!--MOSTRAR PRODUCTOS-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">
                            <?php echo $f['producto']; 
                                        $sel = null; ?>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-shopping">
                                <thead>
                                    <tr>
                                        <th>Imagenes</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sell_img = $conn->prepare("SELECT ruta, clave FROM imagenes WHERE clave_producto = ? ");
                                        $sell_img->execute(array($clave));
                                        foreach ($sell_img as $key => $value) {                              
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="img-container">
                                                <img src="<?php echo $value['ruta']; ?>">
                                            </div>
                                        </td>
                                        <td class="td-actions">
                                            <a href="eliminar_imagenes.php?clave=<?php echo $clave; ?>&clave_img=<?php echo $value ['clave']; ?>&ruta=<?php echo $value['ruta']; ?>" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php    
    include '../extends/footer.php';
?>