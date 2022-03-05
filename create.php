<?php
ini_set('display_errors', '1');

require_once "./config/config.php";

$nombre = $publicacion = $precio = "";
$nombre_err = $publicacion_err = $precio_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_nombre = trim($_POST["name"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor ingrese un nombre";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_err = "Ingrese un nombre valido";
    } else{
        $nombre = $input_nombre;
    }
    
    
    $input_publicacion = trim($_POST["address"]);
    if(empty($input_publicacion)){
        $publicacion_err = "Digite una publicación valida";     
    } else{
        $publicacion = $input_publicacion;
    }

    $input_precio = trim($_POST["precio"]);
    if(empty($input_precio)){
        $precio_err = "Digite una publicación valida";     
    } else{
        $precio = $input_precio;
    }
        
    
    if(empty($nombre_err) && empty($publicacion_err) && empty($precio_err)){
        
        $sql = "INSERT INTO publicaciones (nombre, publicacion, precio) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conexion, $sql)){
            
            mysqli_stmt_bind_param($stmt, "sss", $param_nombre, $param_publicacion, $param_precio);
            
            
            $param_nombre = $nombre;
            $param_publicacion = $publicacion;
            $param_precio = $precio;
            
            if(mysqli_stmt_execute($stmt)){
                
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Algo está mal";
            }
        }
         
        
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($conexion);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear usuario</title>
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
                    <h2 class="mt-5">Crear usuario</h2>
                    <p>Rellena los campos para almacenarlos en la base de datos</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <input type="number" name="precio" class="form-control <?php echo (!empty($precio_err)) ? 'is-invalid' : ''; ?>"><?php echo $precio; ?></input>
                            <span class="invalid-feedback"><?php echo $publicacion_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>