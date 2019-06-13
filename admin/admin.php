<?php include '../extends/header.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">INVENTARIO</h4>
                        <p class="card-category">Complete los campos</p>
                    </div>
                    <div class="card-body">
                        <form action="ins_inventario.php" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Producto</label>
                                        <input type="text" name="producto" id="txtProducto" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Cantidad</label>
                                        <input type="text" name="cantidad" id="txtCantidad" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Precio</label>
                                        <input type="number" step="0.01" name="precio" class="form-control" required>
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
                                            <option value="" disabled="" selected="">Elige una categoria</option>
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
                                            class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>                            
                            <button id="saveProducto" type="submit" class="btn btn-info">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">DATOS INVENTARIO</h4>
                        <p class="card-category"> Ultimo registro guardado en la base de datos</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Foto
                                    </th>
                                    <th>
                                        Producto
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>
                                    <th>
                                        Precio
                                    </th>
                                    <th>
                                        Categoria
                                    </th>
                                    <th>
                                        Descripción
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php 
                                      $sel = $conn->prepare("SELECT * FROM inventario ORDER BY id DESC LIMIT 1");
                                      $sel->execute();
                                      foreach ($sel as $key => $value) { ?>
                                    <tr>
                                        <td><img src="<?php echo $value['foto']; ?>" width="60" height="60"></td>
                                        <td><?php echo $value['producto']; ?></td>
                                        <td><?php echo $value['cantidad']; ?></td>
                                        <td><?php echo $value['precio']; ?></td>
                                        <td><?php echo $value['categoria'] ;?></td>
                                        <td><?php echo substr($value['descripcion'], 0, 100); ?>...</td>
                                        <td><a href="agregar_imagenes.php?clave=<?php echo $value['clave']; ?>"
                                                class="btn btn-outline-success btn-sm"><span
                                                    class="material-icons">add</span></a></td>
                                        <td><a href="editar_imagenes.php?clave=<?php echo $value['clave']; ?>" class="btn btn-outline-primary btn-sm"><span class="material-icons">edit</span></a></td>
                                        <td><a href="eliminar_inventario.php?clave=<?php echo $value['clave']; ?>&foto=<?php echo $value['foto']; ?>" class="btn btn-outline-danger btn-sm"><span class="material-icons">delete</span></a></td>
                                    </tr>
                                    <?php } 
                                      $sel = null;
                                      $conn = null;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include '../extends/footer.php' ?>