<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href ="css/estilo.css" rel ="stylesheet" type="text/CSS">
</head>
<body>
    <div id ="navegacion" >
        <div id ="h1">
           <h2>SubastasWeb
             <div id ="h2">
               <a href="index.php" style="text-decoration:none"><font color="#ffffff"><i>Pagina Principal</i></a>&nbsp;
               <a href="Login.php" style="text-decoration:none"><font color="#ffffff">Iniciar Sesion</a></h2>
               <a href="Registrar.php" style="text-decoration:none"><font color="#000000">.</a></h2>
            </div>
        </div>
    </div>
        
    <section>
    <h1> Registrarse
    <center>LLenar Formulario</h1></center>
        <div class= "form">
          <form action="Registrar.php" method="POST">
            <p>NOMBRE DE USUARIO: <input type="text" name="nombre_usuario" placeholder="Nombre de usuario"required></p>
            <p>CONTRASEÑA: <input type="text" name="contraseña" placeholder="Contraseña" required ></p>
            <p>NOMBRES: <input type="text" name="nombre" placeholder="Nombres"required></p>
            <p>APELLIDOS: <input type="text" name="apellidos" placeholder="Apellidos"required></p>
            <p>FECHA DE NACIMIENTO: <input type="date"id="fecha" name="fecha" required ></p>
            <p>SEXO: <select  name="sexo">
                <option>--</option>
                <option>M</option>
                <option>F</option>
                </select></p>
            <p>PAIS: <input type="text" name="pais" placeholder="Pais" required></p>
            <p>E-mail: <input type="email" name="email"placeholder="Correo electronico" required></p>
            <p>TELEFONO: <input type="telefono" maxlength="10" name="telefono"placeholder="Telefono" oninput="maxlengthNumber(this);" required></p>
            <!---- Restringir maximo de caracteres a ingresar OPCION 1: Comando onkeydown
            <p>CUENTA BANCARIA: <input type="cuenta"  name="cuenta"placeholder="Cuenta" onkeydown="if(this.value.length == 10) return false;" required></p>
            ----->
            <!---- Restringir maximo de caracteres a ingresar OPCION 2: funcion script maxlengthNumber Comando oninput----->
            <p>CUENTA BANCARIA: <input type="cuenta" maxlength="10" name="cuenta"placeholder="Cuenta" oninput="maxlengthNumber(this);" required></p>
            <script>
              function maxlengthNumber (obj) {
                console.log(obj.value); //para validad 
                if(obj.value.length > obj.maxLength) {
                  obj.value = obj.value.slice(0, obj.maxLength);
                }
              }
            </script>


            <p>SALDO a REGISTAR: <input type="number" name="saldo" placeholder="0" min=0 required></p>

                    <p><input type="submit" value="REGISTRAR COMO VENDEDOR" name= "btn_registrar"></p>
                    <input type="submit" value="REGISTRAR COMO COMPRADOR" name= "btn_registrar1">
          </form>
          </section>
<?php
    include("registro.php");
    $nombre_usuario =" ";
    $contraseña  =" ";
    $nombre  =" ";
    $apellidos   =" ";
    $fecha_nacimiento  =" ";
    $sexo   =" ";
    $pais   =" ";
    $email   =" ";
    $telefono   =" ";
    $cuenta    =" ";
    $saldo   =" ";

    if(isset($_POST['btn_registrar']))
      {
          $nombre_usuario =$_POST['nombre_usuario'];
          $contraseña  =$_POST['contraseña']; 
          $nombre  =$_POST['nombre'];
          $apellidos   =$_POST['apellidos'];
          $fecha_nacimiento  =$_POST['fecha'];
          $sexo   =$_POST['sexo'];
          $pais   =$_POST['pais'];
          $email   =$_POST['email'];
          $telefono   =$_POST['telefono'];
          $cuenta    =$_POST['cuenta'];
          $saldo   =$_POST['saldo'];
        if($nombre_usuario=="" || $contraseña=="" || $nombre =="" || $apellidos=="" || $fecha_nacimiento =="" || $sexo == "" || $pais == "" || $email== "" || $telefono== "" || $cuenta== "" || $saldo== "")
        {
          echo "Los campos son obligatorios";
        }
      else
        {
          //INGRESAR
          $sql="INSERT Into Usuario_Registrado (NombreUsuario, UR_Contraseña, UR_Nombres, UR_Apellidos, UR_FechaNacimiento, UR_Sexo, UR_Pais, UR_email, UR_Telefono)
          VALUES('$nombre_usuario','$contraseña','$nombre','$apellidos','$fecha_nacimiento','$sexo', '$pais', '$email', '$telefono');";
          $sql1="INSERT Into CuentaBancaria (N_Cuenta, NombreUsuario, CB_Saldo)
           VALUES('$cuenta','$nombre_usuario','$saldo');";
          $sql2="INSERT Into Vendedor (NombreUsuario)
          VALUES('$nombre_usuario');";
          mysqli_query($conexion,$sql);
          mysqli_query($conexion,$sql1);
          mysqli_query($conexion,$sql2);
          echo "Se almaceno el registro correctamente";
          header('Location: Login.php');
          exit();
        }
      }
    if(isset($_POST['btn_registrar1']))
      {
          $nombre_usuario =$_POST['nombre_usuario'];
          $contraseña  =$_POST['contraseña']; 
          $nombre  =$_POST['nombre'];
          $apellidos   =$_POST['apellidos'];
          $fecha_nacimiento  =$_POST['fecha'];
          $sexo   =$_POST['sexo'];
          $pais   =$_POST['pais'];
          $email   =$_POST['email'];
          $telefono   =$_POST['telefono'];
          $cuenta    =$_POST['cuenta'];
          $saldo   =$_POST['saldo'];
        if($nombre_usuario=="" || $contraseña=="" || $nombre =="" || $apellidos=="" || $fecha_nacimiento =="" || $sexo == "" || $pais == "" || $email== "" || $telefono== "" || $cuenta== "" || $saldo== "")
        {
          echo "Los campos son obligatorios";
        }
      else
        {
          //INGRESAR
          $sql3="INSERT Into Usuario_Registrado (NombreUsuario, UR_Contraseña, UR_Nombres, UR_Apellidos,UR_FechaNacimiento, UR_Sexo, UR_Pais, UR_email, UR_Telefono)
          VALUES('$nombre_usuario','$contraseña','$nombre','$apellidos','$fecha_nacimiento','$sexo', '$pais', '$email', '$telefono');";
          $sql4="INSERT Into CuentaBancaria (N_Cuenta, NombreUsuario, CB_Saldo)
           VALUES('$cuenta','$nombre_usuario','$saldo');";
          $sql5="INSERT Into Comprador (NombreUsuario)
          VALUES('$nombre_usuario');";
          mysqli_query($conexion,$sql3);
          mysqli_query($conexion,$sql4);
          mysqli_query($conexion,$sql5);
          echo "Se almaceno el registro correctamente";
          header('Location: Login.php');
          exit();
        }
    }
    include("cerrar_coneccion.php");
  ?> 
</div>     
<div class="clear">
</div>
    <footer class="footer">
        <p>Fundamentos de Sistemas de Información  - Todos los derechos reservados</p>
    </footer>
</body>
</html>







