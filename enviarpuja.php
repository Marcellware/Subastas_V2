
<?php
                                           if (isset($_POST['btn_Enviar'])){
                                              $conexion = mysqli_connect('localhost:3308','root','','subastas');
                                              if ($conexion1->connect_error) {
                                                die("conexion fallida: ". $conexion1->connect_error);
                                              }
                                                if(isset($_POST['Pujar'])){
                                                    $p_cantidad=$_POST['Pujar1'];
                                                    $A_Nombre=$_GET['VARIABLE1'];
                                                    $DniArticulo = mysqli_query($conexion, "SELECT DNI_Articulo FROM Articulos WHERE A_Nombre='$A_Nombre';");
                                                    $NombreUsu=$_SESSION['variable1']; 
                                                    $sql3="INSERT INTO Puja (DNI_Articulo, NombreUsuario, Cantidad_Pujar)
                                                      VALUES('$DniArticulo','$NombreUsu','$p_cantidad');";
                                                    $sql4="UPDATE CuentaBancaria set CB_Saldo-$p_cantidad where NombreUsuario='$NombreUsu';";
                                                      mysqli_query($conexion,$sql3);
                                                      mysqli_query($conexion,$sql4);
                                                    echo "Se almaceno el registro correctamente";
    }


    include("registro.php");
    $p_cantidad =" ";
    $A_Nombre1  =" ";
    $DniArticulo  =" ";
    $apellidos   =" ";
    $NombreUsu  =" ";

    if(isset($_POST['Pujar'])){
        $p_cantidad=$_POST['Pujar1'];
        $A_Nombre=$_GET['VARIABLE1'];
        $DniArticulo = mysqli_query($conexion, "SELECT DNI_Articulo FROM Articulos WHERE A_Nombre='$A_Nombre';");
        $NombreUsu=$_SESSION['variable1']; 
        if($p_cantidad==""){echo "Los campos son obligatorios";
        } else {
          //INGRESAR
          $sql3="INSERT INTO Puja (DNI_Articulo, NombreUsuario, Cantidad_Pujar)
                     VALUES('$DniArticulo','$NombreUsu','$p_cantidad');";
          $sql4="UPDATE CuentaBancaria set CB_Saldo-$p_cantidad where NombreUsuario='$NombreUsu';";
          mysqli_query($conexion,$sql3);
          mysqli_query($conexion,$sql4);
          echo "Se almaceno el registro correctamente";
        }
    }


}?>