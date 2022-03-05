<?php
define('server', 'localhost');
define('username', 'root');
define('password', '');
define('name', 'funcionalidad');
 

$conexion = mysqli_connect(server, username, password, name);
 
// Check connection
if($conexion === false){
    die("ERROR: No sé pudo hacer la conexión " . mysqli_connect_error());
}
?>