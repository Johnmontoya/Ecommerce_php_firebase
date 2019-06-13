<?php 
    include '../extends/header.php';
    
    $clave = htmlentities($_GET['clave']);
    $foto = htmlentities($_GET['foto']);
    $del = $conn->prepare('DELETE FROM inventario WHERE clave = ?');
    $del->execute(array($clave));

    if($del){
        unlink($foto);
        $sel_img = $conn->prepare("SELECT ruta FROM imagenes WHERE clave_producto = :clave");
        $sel_img->bindParam(':clave', $clave);
        $sel_img->execute();
        foreach ($sel_img as $key => $value) {
           unlink($value['ruta']);
        }
        $img_del = $conn->prepare('DELETE FROM imagenes WHERE clave_producto = ?');
        $img_del->execute(array($clave));
        header('Location: admin.php');
    }else{
        echo "<script>jQuery(function(){swal('Error!', 'Lo siento, hubo un error', 'error');});</script>";
    }

    $del = null;
    $conn = null;
?>