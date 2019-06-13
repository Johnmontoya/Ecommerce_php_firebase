<?php
    include '../extends/header.php';    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $clave = htmlentities($_POST['clave']);
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
            
        }else{
            $copia = htmlentities($_POST['anterior']);
        }

        $update = $conn->prepare("UPDATE inventario SET producto = :producto, cantidad = :cantidad, precio = :precio, categoria = :categoria, descripcion = :descripcion, foto = :foto WHERE clave = :clave");
            $update->bindParam(':clave', $clave);
            $update->bindParam(':producto', $producto);
            $update->bindParam(':cantidad', $cantidad);
            $update->bindParam(':precio', $precio);
            $update->bindParam(':categoria', $categoria);
            $update->bindParam(':descripcion', $descripcion);
            $update->bindParam(':foto', $copia);

            if($update->execute()){                
                $update = null;
                $conn = null;
                echo "<script>jQuery(function(){swal('Exito!', 'Los datos se actualizaron correctamente!', 'success');});</script>";
                header('Location: admin.php');
            }else{
                echo "<script>jQuery(function(){swal('Error!', 'Lo siento, hubo un error', 'error');});</script>";
                header('Location: admin.php');
            }

    }else{
        echo "<script>jQuery(function(){swal('Error!', 'Lo siento, hubo un error', 'error');});</script>";
        header('Location: admin.php');
    }
    
    include '../extends/footer.php';
?>