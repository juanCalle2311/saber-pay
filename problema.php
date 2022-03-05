<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Civica pay</title>
    <link rel="shorcut icon" href="imagenes/logo.png">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="contenedor">
    <nav class="navbar navbar-light  fixed-top">
  <div class="container-fluid">
    <div class="image">
      <a href="&"><img src="imagenes/logo.png" style="width : 40px; height : 40px;"/></a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-size:30px;">Civica pay</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="./problema.php" style="font-size: 25px">Publicar ayuda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./donar.php" style="font-size: 25px">Donar</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav><br><br><br>
  <h1 class="titulo"><strong>Publicar problema</strong></h1><br>
    <div class="container"> 
    <form method="POST"><br>
    <div style="text-align: center;"><img src="imagenes/pensar.png" style="width: 150px; height: 150px;"></div><br>
    <label style="font-size: 15px"><strong>Usuario</strong></label>
    <input class="form-control" type="text" name="usuario" id="usuario"><br>
    <label style="font-size: 15px"><strong>Tema</strong></label>
    <input class="form-control" type="text" name="tema" id="tema"><br>
    <label style="font-size: 15px"><strong>Problema </strong></label>
    <textarea class="form-control" type="text" name="problema" id="problema"></textarea><br>
    <label style="font-size: 15px"><strong>Ayuda </strong></label>
    <input class="form-control" type="number" name="ayuda" id="ayuda" placeholder="$"><br>
    <div style="justify-content: center; text-align: center;"><input class="btn btn-dark"  type="submit" name="accion" value="Agregar">
    <a style="padding-left:15px; color: black;" href="Controlador?accion=listar">Regresar</a><br>
    </div></form><br>
    </div>
    </div><br>
  </body>
</html>