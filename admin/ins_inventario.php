<?php
    include '../extends/header.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $clave = sha1(rand(0000,9999).rand(00,99));
        $producto = htmlentities($_POST['producto']);
        $cantidad = htmlentities($_POST['cantidad']);
        $precio = htmlentities($_POST['precio']);
        $categoria = htmlentities($_POST['categoria']);
        $descripcion = htmlentities($_POST['descripcion']);

        //Imagen
        $ruta = $_FILES['imagen']['tmp_name'];
        $imagen = $_FILES['imagen']['name'];

        if($ruta != ''){
            $ancho = 500;
            $alto = 400;
            $info  = pathinfo($imagen);
            $tamano = getimagesize($ruta);
            $width = $tamano[0];
            $height = $tamano[1];

            if($info['extension'] == 'jpg' || $info['extension'] == 'jpeg' || $info['extension'] == 'JPG' || $info['extension'] == 'JPEG'){
                $imagenvieja = imagecreatefromjpeg($ruta);
                $nueva = imagecreatetruecolor($ancho, $alto);
                imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
                $copia = 'foto_producto/'.$clave.'.jpg';
                imagejpeg($nueva, $copia);                

            }else if($info['extension'] == 'png' || $info['extension'] == 'PNG'){
                $imagenvieja = imagecreatefrompng($ruta);
                $nueva = imagecreatetruecolor($ancho, $alto);
                imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
                $copia = 'foto_producto/'.$clave.'.png';
                imagepng($nueva, $copia);

            }else{
                echo "<script>jQuery(function(){swal('Error!', 'El formato no es compatible', 'error');});</script>";
            }

            $ins = $conn->prepare("INSERT INTO inventario VALUES (DEFAULT, :clave, :producto, :cantidad, :precio, :categoria, :descripcion, :foto)");
            $ins->bindParam(':clave', $clave);
            $ins->bindParam(':producto', $producto);
            $ins->bindParam(':cantidad', $cantidad);
            $ins->bindParam(':precio', $precio);
            $ins->bindParam(':categoria', $categoria);
            $ins->bindParam(':descripcion', $descripcion);
            $ins->bindParam(':foto', $copia);

            if($ins->execute()){
                echo "<script>jQuery(function(){swal('Exito!', 'Datos guardados correctamente', 'success');});</script>";
                $ins = null;
                $conn = null;
                header('Location: admin.php');
            }else{
                echo "<script>jQuery(function(){swal('Error!', 'Lo siento, hubo un error', 'error');});</script>";
                header('Location: admin.php');
            }
        }
    }else{
        echo "<script>jQuery(function(){swal('Error!', 'Lo siento, hubo un error', 'error');});</script>";
        header('Location: admin.php');
    }


    include '../extends/footer.php';
?>
