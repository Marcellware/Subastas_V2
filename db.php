<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
            <div class="six columns">
                     <h1>SubastasWEB</h1>
                    </div>
                    <table>
                    <tr>
                        <td><h3><a class="enlace" href="Login.php"style="text-decoration:none">Volver</a><h3></td>
                        <td><h3><a class="enlace" href="Registrar.php" style="text-decoration:none">Registrarse</a><h3></td>
                    </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </header>


<?php

$dbhost = "localhost:3308";
$dbuser ="root";
$dbpass = "";
$dbname = "subastas";

$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);
if(!$conn){
    die("No hay conexion: ".mysqli_connect_error() );
}

$nombre = $_POST["Nombre"];
$pass = $_POST["Contra"];

$query = mysqli_query($conn," Select NombreUsuario,	UR_Contraseña 
from usuario_registrado 
where NombreUsuario ='".$nombre."' and UR_Contraseña = '".$pass."' ");
$nr = mysqli_num_rows($query);

if($nr == 1){
    header("location: index.php");
    echo "Bienvenido:" .$nombre;
    session_start();
    $_SESSION['variable1']=$nombre;
}
elseif ($nr == 0){
    
    echo "<center><h1>Contraseña Invalida.<br></h1></center>";
    echo "<center><h1>No ingreso, el usuario y contraseña no existen.<br><h1></center>";
    echo "<center><h1>Registrese para acceder a SubastasWEB.<br><h1></center>";

    
}


?>


    
    
    
</body>
</html>