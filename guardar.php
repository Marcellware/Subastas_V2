<?php
    //concetar con el servidor
    $conectar=mysqli_connect('localhost:3308','root','','subastas');
 //   verificamos la conexion
    if(!$conectar){
        echo"No Se Pudo Conectar Con El Servidor";
    }else{

        $base=mysqli_select_db($conectar,'formulario');
        if(!$base){
           echo"No Se Encontro La Base De Datos";
       }
   }
//recuperar las variables
    $nombre_su=$_POST['nombre_su'];
    $date_i=$_POST['correoinicio'];
    $date_f=$_POST['correofin'];
    $estado=$_POST['estado']:

    $residencia=$_POST['residencia'];
    $telefono=$_POST['telefono'];
    $sexo=$_POST['sexo'];
    $civil=$_POST['civil'];
//hacemos la setencia de sql
    $sql="INSERT INTO datos(cedula,nombre,correo,residencia,telefono,sexo,civil)
     VALUES('$cedula','$nombre','$correo','$residencia','$telefono','$sexo','$civil');";

//Ejecutamos setencia
    $ejecutar=mysqli_query($conectar,$sql);
    //Verificar
    if(!$ejecutar){
        echo"Hubo Un Error";
    }else{
        echo"Datos Guardados Correctamente<br><a href='index.html'>Volver</a>";
    }
?>