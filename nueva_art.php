<?php
    //concetar con el servidor
    $conectar=@mysqli_connect('localhost:3308','root','');
 //   verificamos la conexion
    if(!$conectar){
        echo"No Se Pudo Conectar Con El Servidor";
    }else{

        $base=mysqli_select_db($conectar,'subastas');
        if(!$base){
           echo"No Se Encontro La Base De Datos";
       }
   }
//recuperar las variables
    session_start();
    $nombre_su1=$_POST['nombre_su'];
    $date_i1=$_POST['correoinicio'];
    $date_f1=$_POST['correofin'];
    $estado1=$_POST['estado'];
    $NombreUsu=$_SESSION['variable1'];
    $nombre_ar=$_POST['nombre_ar'];
    $categoria=$_POST['categoria'];
    $precio=$_POST['precio'];
    $textarea1=$_POST['textarea'];
    $imgFile = $_FILES['imagen']['name'];
    $imagensize = $_FILES['imagen']['size'];
    $imagen =$conectar->real_escape_string(file_get_contents($_FILES["imagen"]["tmp_name"]));
    $upload_dir = " ";
    $binariosImagen= " ";
    $binariosImagen = mysqli_escape_string($conectar,$binariosImagen);
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    $getDNIArti2= " ";
    $getS_id2= " ";
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
    
    if(in_array($imgExt, $valid_extensions)){   
        // Check file size '5MB'
        if($imagensize < 5000000)    {
         move_uploaded_file($imagen,$upload_dir.$userpic);
        }
        else{
         $errMSG = "Sorry, your file is too large.";
        }
       }
       else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
       }

//hacemos la setencia de sql
    $sql="INSERT INTO Articulos (A_Nombre, A_Categoria, A_Precio, A_Descripcion, A_imagenArticulo)
     VALUES('$nombre_ar','$categoria','$precio','$textarea1','$imagen');";
        $ejecutar=mysqli_query($conectar,$sql);
    $sql2="INSERT INTO Subasta (S_Nombre, S_FechaInicio, S_FechaFinalizacion, S_Estado)
     VALUES('$nombre_su1','$date_i1','$date_f1','$estado1');";
        $ejecutar=mysqli_query($conectar,$sql2);
                                 
    $getDNIArti = mysqli_query($conectar, "SELECT  DNI_Articulo FROM articulos WHERE A_Nombre='$nombre_ar';");
    while($getDNIArti1 = mysqli_fetch_array($getDNIArti) ) {
        $getDNIArti2=$getDNIArti1['DNI_Articulo']; 
    }

    $getS_id = mysqli_query($conectar, "SELECT  S_id FROM Subasta WHERE S_Nombre='$nombre_su1';");
    while($getS_id1 = mysqli_fetch_array($getS_id) ) {
        $getS_id2=$getS_id1['S_id']; 
    }

    $sql3="INSERT INTO TieneSubasta (S_id, DNI_Articulo) Values ('$getS_id2','$getDNIArti2');";
    $ejecutar=mysqli_query($conectar,$sql3);

    // Para el historial de registros de Articulos
    $sql4="INSERT INTO RegistraArticulo (DNI_Articulo, NombreUsuario, FechaRegistro) Values ('$getDNIArti2','$NombreUsu', current_date());";
    $ejecutar=mysqli_query($conectar,$sql4);

    //Ejecutamos setencia //Verificar
    if(!$ejecutar){
        echo"Hubo Un Error";
    }else{
        header('Location: index.php');
    }
?>