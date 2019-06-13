<?php include '../../extends/header_categorias.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">DATOS LIBROS</h4>
                        <p class="card-category"> Libros guardados en la base de datos</p>
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
                                      $sel = $conn->prepare("SELECT * FROM inventario WHERE categoria LIKE 'LIBROS'");
                                      $sel->execute();
                                      foreach ($sel as $key => $value) { ?>
                                    <tr>
                                        <td><img src="../<?php echo $value['foto']; ?>" width="60" height="60"></td>
                                        <td><?php echo $value['producto']; ?></td>
                                        <td><?php echo $value['cantidad']; ?></td>
                                        <td><?php echo $value['precio']; ?></td>
                                        <td><?php echo $value['categoria'] ;?></td>
                                        <td><?php echo substr($value['descripcion'], 0, 100); ?>...</td>
                                        <td><a href="../agregar_imagenes.php?clave=<?php echo $value['clave']; ?>"
                                                class="btn btn-outline-success btn-sm"><span
                                                    class="material-icons">add</span></a></td>
                                        <td><a href="../editar_imagenes.php?clave=<?php echo $value['clave']; ?>"
                                                class="btn btn-outline-primary btn-sm"><span
                                                    class="material-icons">edit</span></a></td>
                                        <td><a href="../eliminar_inventario.php?clave=<?php echo $value['clave']; ?>&foto=<?php echo $value['foto']; ?>"
                                                class="btn btn-outline-danger btn-sm"><span
                                                    class="material-icons">delete</span></a></td>
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

            <?php  include '../../extends/footer_categorias.php';  ?>