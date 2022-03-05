<?php

ini_set('display_errors', '1');

require_once "./config/config.php";
 
$nombre = $publicacion = $precio = "";
$nombre_err = $publicacion_err = $precio_err = "";
 

if(isset($_POST["id"]) && !empty($_POST["id"])){

    $id = $_POST["id"];
    

    $input_nombre = trim($_POST["name"]);
    if(empty($input_nombre)){
        $nombre_err = "Ingrese un nombre";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_err = "Ingrese un nombre valido";
    } else{
        $nombre = $input_nombre;
    }
    

    $input_publicacion = trim($_POST["address"]);
    if(empty($input_publicacion)){
        $publicacion_err = "Ingrese la descripcion de la publicación";     
    } else{
        $publicacion = $input_publicacion;
    }
    

    $input_precio = trim($_POST["precio"]);
    if(empty($input_precio)){
        $salary_err = "Ingrese un precio valido";     
    } elseif(!ctype_digit($input_precio)){
        $precio_err = "Please enter a positive integer value.";
    } else{
        $precio = $input_precio;
    }
    

    if(empty($nombre_err) && empty($publicacion_err) && empty($precio_err)){

        $sql = "UPDATE publicaciones SET nombre=?, publicacion=?, precio=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conexion, $sql)){

            mysqli_stmt_bind_param($stmt, "sssi", $param_nombre, $param_publicacion, $param_precio, $param_id);
            

            $param_nombre = $nombre;
            $param_publicacion = $publicacion;
            $param_precio = $precio;
            $param_id = $id;
            

            if(mysqli_stmt_execute($stmt)){

                header("location: index.php");
                exit();
            } else{
                echo "Oops! Algo anda mal, intenta nuevamente";
            }
        }
         

        mysqli_stmt_close($stmt);
    }
    

    mysqli_close($conexion);
} else{

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

        $id =  trim($_GET["id"]);
        

        $sql = "SELECT * FROM publicaciones WHERE id = ?";
        if($stmt = mysqli_prepare($conexion, $sql)){

            mysqli_stmt_bind_param($stmt, "i", $param_id);
            

            $param_id = $id;
            

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){


                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    

                    $nombre = $row["nombre"];
                    $publicacion = $row["publicacion"];
                    $precio = $row["precio"];
                } else{

                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Algo anda mal intenta nuevamente";
            }
        }
        

        mysqli_stmt_close($stmt);
        

        mysqli_close($conexion);
    }  else{

        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Actualizar datos</h2>
                    <p>Escribe encima de los datos vistos en la pantalla para guardar los cambios</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($nombre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nombre; ?>">
                            <span class="invalid-feedback"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Publicación</label>
                            <textarea name="address" class="form-control <?php echo (!empty($publicacion_err)) ? 'is-invalid' : ''; ?>"><?php echo $publicacion; ?></textarea>
                            <span class="invalid-feedback"><?php echo $publicacion_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" name="precio" class="form-control <?php echo (!empty($precio_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $precio; ?>">
                            <span class="invalid-feedback"><?php echo $precio_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Modificar">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>