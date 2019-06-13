<?php
    include '../extends/header.php';

    $clave_producto = htmlentities($_GET['clave']);
    $clave_img = htmlentities($_GET['clave_img']);
    $ruta = htmlentities($_GET['ruta']);

    $del = $conn->prepare("DELETE FROM imagenes WHERE clave = :clave");
    $del->bindParam(':clave', $clave_img);
    if($del->execute()){
        unlink($ruta);
        header('Location: agregar_imagenes.php?clave='.$clave_producto);
    }
    $del = null;
    $conn = null;

    include '../extends/footer.php';
?>