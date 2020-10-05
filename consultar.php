<?php

    // Parametros a configurar para la conexion de la base de datos 
    $host = "localhost";    // sera el valor de nuestra BD 
    $usuariodb = "root";    // sera el valor de nuestra BD 
    $clavedb = "";    // sera el valor de nuestra BD
    $basededatos ="SUBASTAS"; 

    //Lista de Tablas
    $tabla_db1 = "Usuario_Observador"; 	   // tabla de usuarios
    $tabla_db2 = "Subasta";
    $tabla_db3 = "Usuario_Registrado";
    $tabla_db4 = "CuentaBancaria";
    $tabla_db5 = "Vendedor";
    $tabla_db6 = "Comprador";
    $tabla_db7 = "Articulos";
    $tabla_db8 = "Puja";
    $tabla_db9 = "TieneSubasta";

    //error_reporting(0); //No me muestra errores

    $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);

     
    $cedula=$_POST['cedula'];
    
    $registros = mysqli_query( "SELECT A_Nombre,A_Categoria,A_Precio FROM Articulos WHERE A_Nombre ='$A_Nombre'" );
    while( $registros = mysql_fetch_array( $registros ) ) {
        echo $registros['cedula'];
    }

/*
    require 'conexion.php';
    $consulta= "SELECT nombres from informacionpersonal Where cedula = '$cedula' ";
    $resultado= $mysqli->query($consulta);
    while($resultado=mysql_fetch_array($resultado)){
        $resultado['nombres'];
    }


if ( !$ejecutar ) {
    echo'huvo algun error';
} else {
    echo"Los datos que usted a ingresado se han guardado exitosamente <br><a href='FinalizarCompra.php'>Ver Reporte</a>";

}
    */
?>