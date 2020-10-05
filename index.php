<?php
$conexion=mysqli_connect('localhost:3308','root','','subastas');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubastasWEB</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
     session_start();
     $A_Nombre4=$_SESSION['variable1'];
?>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="six columns">
                     <h1>SubastasWEB</h1>
                    </div>
                    <table>
                    <tr>
                        <td><h3><a class="enlace" href="Login.php"style="text-decoration:none">Iniciar Sesion</a><h3></td>
                        <td><h3><a class="enlace" href="Registrar.php"style="text-decoration:none">Registrarse</a><h3></td>
                        <td><h3><a class="enlace" href="RegistrarArticulo.html" style="text-decoration:none"><?php echo $A_Nombre4; ?></a><h3></td>
                    </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
    <h1 class="encabezado">Subastas en Linea</h1>
    
    
    <?php
    $sql="SELECT * from articulos";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
    ?>

                    <form action="index.php" method="POST" enctype="multipart/form-data"><!---enctype nos permite imagen base de datos---> 
                            
                    </form>
       
                    
                            
                    


                <div class="lista-platillos" class="container">
                    <div class="four columns">
                        <div class="columna">
                            <div class="offset-by-two columns">
                                <div class="card">
                                    <img src="data:image/png;base64,<?php echo base64_encode ($mostrar['A_imagenArticulo']);?>" 
                                          srcset="data:image/png;base64,<?php echo base64_encode ($mostrar['A_imagenArticulo']);?> 300w,
                                          data:image/png;base64,<?php echo base64_encode ($mostrar['A_imagenArticulo']);?> 1300w" height="400" class="imagen-platillo u-full-width" >
                                    <div class="info-card">
                                    <form action="Articulo.php" method="POST" enctype="multipart/form-data"><!---enctype nos permite imagen base de datos---> 
                                        <h4><?php 
                                            echo $mostrar['A_Nombre']
                                        ?><span  class="u-pull-right">Subasta No. 
                                        <?php echo $mostrar['DNI_Articulo']?></span>
                                        </h4>
                                        <p class="precio">$<?php echo $mostrar['A_Precio']?><span class="u-pull-right"><?php echo $mostrar['A_Categoria']?></span></p>
                                        <?php
                                        $var=$mostrar['A_Nombre'];
                                        ?>
                                        <a href="Articulo.php?VARIABLE1=<?php echo $var;?>" class="u-full-width button-primary button input agregar-carrito"  name="cedula" 
                                        data-id="1" >Entrar</a>
                                    </form>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
/
                
        <?php
        }
        #header('Location: Login.php.php' set $var1='');
        ?>

    <footer class="footer">
        <p>Fundamentos de Sistemas de Información  - Todos los derechos reservados</p>
    </footer>

    

    
</body>
</html>