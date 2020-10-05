<?php
    session_start();
    include("registro.php");
    $NombreUsu=$_SESSION['variable1']; 
    $precio2=$_POST['Pujar1']; 
    $A_Nombre2=$_SESSION['variable3'];

    $S_id1=$_SESSION['s_id1'];
    $pscategoria=$_SESSION['pscategoria1'];
    
    $DniArticulo3  =" ";
                                     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php

            $NombreUsu1=$NombreUsu;
            $precio3=$precio2; 
            $A_Nombre3=$A_Nombre2;
            $S_id2=$S_id1;
            $pscategoria1=$pscategoria;

            echo  "$precio2";          
            echo  "$NombreUsu";
            echo  "$A_Nombre2";
            
            
            $DniArticulo = mysqli_query($conexion, "SELECT DNI_Articulo FROM Articulos WHERE A_Nombre='$A_Nombre3';");
            while($DniArticulo2 = mysqli_fetch_array($DniArticulo) ) {
                $DniArticulo3=$DniArticulo2['DNI_Articulo'];
            } 
            echo "$DniArticulo3";  

             
            //INGRESAR
            
            $sqll2="INSERT INTO Puja (DNI_Articulo, NombreUsuario, Cantidad_Pujar)
                        VALUES('$DniArticulo3','$NombreUsu1','$precio3');";
            $sqll3="INSERT INTO ParticipaSubasta (S_id, NombreUsuario, Ps_FechaParticipacion, Ps_Categoria)
                        VALUES('$S_id2','$NombreUsu1', current_date(),'$pscategoria1');";
            $sqll4="UPDATE CuentaBancaria set CB_Saldo=CB_Saldo-'$precio3' where NombreUsuario='$NombreUsu1';";
            mysqli_query($conexion,$sqll3);
            mysqli_query($conexion,$sqll2);
            mysqli_query($conexion,$sqll4);
            echo "Se almaceno el registro correctamente";
            header('Location: index.php');
            
        ?>


</body>
</html>