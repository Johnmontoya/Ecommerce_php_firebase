<?php
    include '../extends/header.php';    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $clave_producto = htmlentities($_POST['clave']);
        $cont = 0;

        foreach ($_FILES['imagen']['tmp_name'] as $key => $value) {
            $ruta = $_FILES['imagen']['tmp_name'][$key];
            $imagen = $_FILES['imagen']['name'][$key];
    
            $ancho = 500;
            $alto = 400;
            $info = pathinfo($imagen);
            $tamano = getimagesize($ruta);
            $width = $tamano[0];
            $height = $tamano[1];
            $clave = sha1(rand(0000,9999).rand(00,99));
    
    
            if ($info['extension'] == 'jpg' || $info['extension'] == 'JPG' || $info['extension'] == 'jpeg' || $info['extension'] == 'JPEG') {
                $imagenvieja = imagecreatefromjpeg($ruta);
                $nueva = imagecreatetruecolor($ancho, $alto);
                imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
                $cont++;
                $rand = rand(000,999);
                $renombrar = $clave.$rand.$cont;
                $copia = "fotos/".$renombrar.".jpg";
                imagejpeg($nueva,$copia);
            }elseif ($info['extension'] == 'png' || $info['extension'] == 'PNG') {
                $imagenvieja = imagecreatefrompng($ruta);
                $nueva = imagecreatetruecolor($ancho, $alto);
                imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
                $cont++;
                $rand = rand(000,999);
                $renombrar = $clave.$rand.$cont;
                $copia = "fotos/".$renombrar.".png";
                imagepng($nueva,$copia);
            }else{
                
                exit;
            }
    
            $ins = $conn->prepare("INSERT INTO imagenes VALUES (DEFAULT, :clave, :clave_producto, :ruta)");
            
                $ins->bindparam(':clave', $clave);
                $ins->bindparam(':clave_producto', $clave_producto);
                $ins->bindparam(':ruta', $copia);                

                if ($ins->execute()) {
                    echo "<script>jQuery(function(){swal('Exito!', 'Los datos se guardaron correctamente!', 'success');});</script>";
                    $ins = null;
                    $con = null;
                    header('Location: agregar_imagenes.php?clave='.$clave_producto);
                }else{
                    echo "<script>jQuery(function(){swal('Error!', 'Lo siento, hubo un error', 'error');});</script>";
                    header('Location: agregar_imagenes.php?clave='.$clave_producto);
                }
                
    
        }        

    }else {

}
    
?>