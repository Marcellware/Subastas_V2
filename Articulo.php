
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/EstiloBase.css" Type = "text/css">
    <link rel="stylesheet" href="css/Articulo.css" Type = "text/css">
    <title>Formulario de Registro</title>
</head>
<body>
  
    <div id ="General">
      <fieldset  id="Cabecera" style="background:#000000;">
        <div id="SubastasWeb">
          SubastasWeb
        </div>
        <table id="nav3">
          <tr>
            <td><a href="index.php" style="text-decoration:none"><font color="#ffffff">Pagina Principal</a></td>
            <td><a href="Login.php"style="text-decoration:none"><font color="#ffffff">Inicio Sesion</a></td>
            <td><a href="RegistrarArticulo.html"style="text-decoration:none"><font color="#ffffff">Registrar Aticulo</a></td>
          </tr>        
        </table>
      </fieldset>

          <fieldset id = "fondo">
                <fieldset id = "detalles">
                      <fieldset id = "Objeto1" style="border: white 0px">
                      <form action="pujar.php" method="POST" enctype="multipart/form-data"><!---enctype nos permite imagen base de datos--->
                          <div id = "Articulobarra">
                            <fieldset id="Articulotitle" style="border: white 0px">
                              <fieldset id="Cosa1" style="border: white 0px">
                                <table><tr><td style="background:#42b0f0d0;"><?php echo "ARTICULO "; ?></td></tr></table> 
                              </fieldset>
                              <fieldset id="Cosa2" style="border: white 0px">
                                  <?php
                                    session_start();
                                    $var2=null;
                                    $obj=null; 
                                    $subasid1=" ";
                                    $categorit=" ";
                                    $estad=" ";
                                    //Lista de Tablas
                                    $tabla_db7 = "articulos"; 	   // tabla de usuarios
                                    $conexion = mysqli_connect('localhost:3308','root','','subastas');
                                    if ($conexion->connect_error) {
                                      die("conexion fallida: ". $conexion->connect_error);
                                    }
                                    $A_Nombre=$_GET['VARIABLE1']; ?>
                                  <table>
                                        <tr>
                                        <td style="background:#d3ab3d;"><?php echo "SUBASTA: "; ?></td> 
                                          <?php 
                                          $registros01 = mysqli_query($conexion, "SELECT s.S_id FROM subasta s Inner Join tienesubasta ts 
                                              on s.S_id=ts.S_id INNER JOIN articulos a ON a.DNI_Articulo=ts.DNI_Articulo WHERE A_Nombre='$A_Nombre'" );
                                          while($registros0 = mysqli_fetch_array($registros01) ) {
                                            $subasid1=$registros0['S_id'];
                                          ?> 
                                          <td style="background:#d3ab3d;"><?php echo $registros0['S_id'];  ?> </td> <?php }?> 
                                        </tr>
                                    </table>
                              </fieldset>
                              <fieldset id="Cosa3" style="border: white 0px">
                                    <table>
                                      <tr>
                                        <td style="background:#42b0f0d0;"><?php echo "CATEGORIA: "; ?></td> 
                                          <?php 
                                          $registros02 = mysqli_query($conexion, "SELECT A_Categoria FROM articulos WHERE A_Nombre ='$A_Nombre'" );
                                          while($registros03 = mysqli_fetch_array($registros02) ) {
                                          ?> 
                                          <td><?php echo $registros03['A_Categoria'];  ?> </td> <?php }?> 
                                      </tr>
                                    </table>
                                    <?php ?>  
                              </fieldset>
                            </fieldset><!---Final div Articulotitle --->
                          </div> <!---Final div Articulobarra --->
                          
                          
                    <div id = "Objeto1">
                      <fieldset id="Objeto1" style="border: white 0px">
                      <!---<legend style="color:rgb(0, 0, 0);"><b>Objeto1</b></legend><br>--->

                          <div id = "DatosCliente">
                            <fieldset id="ImagenPrecio" style="border: white 0px">
                              <fieldset id="Imagen" style="border: white 0px">
                                  <?php
                                    $conexion = mysqli_connect('localhost:3308','root','','subastas');
                                    if ($conexion->connect_error) {
                                      die("conexion fallida: ". $conexion->connect_error);
                                    }
                                    $A_Nombre=$_GET['VARIABLE1']; ?>
                                  <center><table>
                                        <tr><?php 
                                          $registros06 = mysqli_query($conexion, "SELECT  A_imagenArticulo FROM articulos WHERE A_Nombre='$A_Nombre';");
                                          while($registros07 = mysqli_fetch_array($registros06) ) {
                                          ?> 
                                         
                                          <td><img src="data:image/png;base64,<?php echo base64_encode ($registros07['A_imagenArticulo']);?>" 
                                          srcset="data:image/png;base64,<?php echo base64_encode ($registros07['A_imagenArticulo']);?> 300w,
                                          data:image/png;base64,<?php echo base64_encode ($registros07['A_imagenArticulo']);?> 1300w"  height="400"
                                          /></td> <?php }?> <!---srcset sirve para que la imagen se haga mas grande automaticamente--->
                                        </tr>
                                    </table>  </center>
                              </fieldset>
                              <fieldset id="Precio" style="border: white 0px">
                              <center>
                              <?php 
                                  
                                    //Lista de Tablas
                                    $tabla_db7 = "articulos"; 	   // tabla de usuarios
                                    $conexion = mysqli_connect('localhost:3308','root','','subastas');
                                    if ($conexion->connect_error) {
                                      die("conexion fallida: ". $conexion->connect_error);
                                    }
                                     $A_Nombre=$_GET['VARIABLE1']; ?>
                                      <table>
                                        <tr>
                                        <td style="background:#42b0f0d0;"><?php echo "Precio: "; ?></td> 
                                          <?php 
                                          $registros2 = mysqli_query($conexion, "SELECT A_Precio FROM articulos WHERE A_Nombre ='$A_Nombre'" );
                                          while($registros1 = mysqli_fetch_array($registros2) ) {
                                          ?> 
                                          <td><?php echo $registros1['A_Precio'];  ?> </td>
                                          <td><?php echo " $ dolares ";?></td> <?php }?> 
                                        </tr><br>
                                      </table>
                              </center>
                                     

                            </fieldset>
                          </div><!--Final div ImagenPrecio--->    
                            
                          <div id = "DatosCliente">
                            <fieldset style="border: white 0px">
                              <!--<legend style="color:rgb(0, 0, 0);"><b>Descripcion</b></legend>---> 
                              
                                    <div id = "Letragrande">
                                    <table style="border: white 0px">
                                      <tr style="border: white 0px">
                                          <?php 
                                          $registros04 = mysqli_query($conexion, "SELECT A_Nombre FROM articulos WHERE A_Nombre ='$A_Nombre'" );
                                          while($registros05 = mysqli_fetch_array($registros04) ) {
                                          ?> 
                                          <td style="border: white 0px"><?php echo $registros05['A_Nombre'];  ?> </td> <?php }?> 
                                      </tr>
                                    </table></div><!--Final div Letragrande---> 

                                  <!------------Accion de Pujar----------->
                                          
                                  <table style="background:#000000;">
                                      <tr>
                                        <td style="background:#d3ab3d;"><?php echo "Usuario: "; ?></td> 
                                        <td colspan="2" style="background:#FFFFFF;"><?php echo $_SESSION['variable1'];?> </td>
                                      </tr>
                                      <tr>
                                        <td style="background:#d3ab3d;"><?php echo "CUENTA: "; ?></td>
                                          <?php
                                            $NombreUsu=$_SESSION['variable1']; 
                                            $registros211 = mysqli_query($conexion, "SELECT N_Cuenta FROM CuentaBancaria WHERE NombreUsuario='$NombreUsu'" );
                                            while($registros055 = mysqli_fetch_array($registros211) ) {
                                          ?>
                                        <td colspan="2" style="background:#FFFFFF;"><?php echo $registros055['N_Cuenta']; ?> </td><?php }?> 
                                      </tr>
                                      <tr>
                                        <td style="background:#d3ab3d;"><?php echo "Categoria: "; ?></td>
                                          <?php
                                            $NombreUsu=$_SESSION['variable1']; 
                                            $registros2111 = mysqli_query($conexion, "(SELECT C_Categoria as 'CATEG'  FROM Comprador c 
                                                      WHERE c.NombreUsuario='$NombreUsu') UNION
                                                  (SELECT V_Categoria as 'CATEG' FROM  Vendedor v WHERE v.NombreUsuario='$NombreUsu' )" );
                                            while($registros0555 = mysqli_fetch_array($registros2111) ) {
                                              $categorit=$registros0555['CATEG'];
                                          ?>
                                        <td colspan="2" style="background:#FFFFFF;"><?php echo $registros0555['CATEG']; ?> </td><?php }?> 
                                      </tr>
                                        <?php
                                        $_SESSION['variable3']=$A_Nombre;
                                        $_SESSION['s_id1']=$subasid1;
                                        $_SESSION['pscategoria1']=$categorit;
                                        ?>
                                      
                                      <?php 
                                      $registro77 = mysqli_query($conexion, "SELECT S_Estado FROM subasta s Inner Join tienesubasta ts 
                                      on s.S_id=ts.S_id INNER JOIN articulos a ON a.DNI_Articulo=ts.DNI_Articulo WHERE A_Nombre='$A_Nombre';" );
                                      while($registros67 = mysqli_fetch_array($registro77)) {
                                      $estad=$registros67['S_Estado'];}
                                      if ($categorit=="COMPRADOR"){
                                        if ($estad=="ABIERTO"){$obj=3;}
                                        }else{$obj=0;}?>
                                      <tr>
                                        <td style="background:#42b0f0d0;"><?php echo "Realizar Puja: "; ?></td>
                                        <td style="background:#42b0f0d0;"><input type="number" id="btnPujar1" maxlength="<?php echo $obj; ?>" name="Pujar1"  placeholder="max 999$" 
                                                      min=0 max=999  oninput="maxlengthNumber(this);" > </td>
                                            <?php}?>
                                            <script>
                                              function maxlengthNumber (obj) {
                                                console.log(obj.value); //para validad 
                                                if(obj.value.length > obj.maxLength) {
                                                  obj.value = obj.value.slice(0, obj.maxLength);
                                                }
                                              }
                                            </script>
                                            
                                            <td style="background:#42b0f0d0;"><input type="submit" value="Pujar" name ="" id=""> </td>

                                            <script>
                                            /* Para mostrar o no mostrar contraseña 
                                            boton.addEventListener('click', EDITAR);
                                              var btnPujar = document.getElementById('btnPujar1');
                                              let categ = "COMPRADOR";
                                             
                                              function EDITAR(){
                                                f=document.formulario;
                                                if (categ === "COMPRADOR") {
                                                  btnPujar.readonly = true;
                                                } else {
                                                  btnPujar.readonly = false;
                                                }
                                              }*/

                                              </script>
                                      </tr>
                                      
                                <!------------Accion de Pujar----------->

                              
                                    <div id = "Letramediana">
                                    <table style="width:80%">
                                      <tr>
                                      <td style="background:#42b0f0d0;"><?php echo " Oferta Actual: "; ?></td> 
                                        <?php 
                                        $registro3 = mysqli_query($conexion, "SELECT SUM(Cantidad_Pujar) FROM articulos a Inner Join puja p on a.DNI_Articulo=p.DNI_Articulo  WHERE A_Nombre='$A_Nombre';" );
                                          while($registros2 = mysqli_fetch_array($registro3)) {
                                        ?> 
                                        <td><?php echo $registros2['SUM(Cantidad_Pujar)']; ?> </td>
                                        <td><?php echo " $ "; ?></td> <?php }?> 
                                      </tr><br>
                                      
                                      <table style="width:80%">
                                       
                                      <tr>
                                        <td style="background:#42b0f0d0;"><?php echo " Descripcion: "; ?></td>  
                                        <?php 
                                        $registro4 = mysqli_query($conexion, "SELECT A_Descripcion FROM articulos WHERE A_Nombre='$A_Nombre';" );
                                          while($registros3 = mysqli_fetch_array($registro4)) {
                                        ?> 
                                      </tr>
                                      <tr><td colspan="3"><?php echo $registros3['A_Descripcion']; ?></td></tr>
                                    
                                      <tr>
                                        <td style="background:#42b0f0d0;"><?php echo " Fecha Inicio: "; ?></td>  
                                        <?php 
                                        $registro5 = mysqli_query($conexion, "SELECT S_FechaInicio FROM subasta s Inner Join tienesubasta ts 
                                                on s.S_id=ts.S_id INNER JOIN articulos a ON a.DNI_Articulo=ts.DNI_Articulo WHERE A_Nombre='$A_Nombre';" );
                                          while($registros4 = mysqli_fetch_array($registro5)) {
                                        ?>
                                        <td colspan="2" ><?php echo $registros4['S_FechaInicio']; ?></td> <?php }?> 
                                      </tr>
                                      <tr>
                                        <td style="background:#42b0f0d0;"><?php echo " Fecha Finalizacion: "; ?></td>  
                                        <?php 
                                        $registro6 = mysqli_query($conexion, "SELECT S_FechaFinalizacion FROM subasta s Inner Join tienesubasta ts 
                                                on s.S_id=ts.S_id INNER JOIN articulos a ON a.DNI_Articulo=ts.DNI_Articulo WHERE A_Nombre='$A_Nombre';" );
                                          while($registros5 = mysqli_fetch_array($registro6)) {
                                        ?>
                                        <td colspan="2"><?php echo $registros5['S_FechaFinalizacion']; ?></td> <?php }?> 
                                      </tr>
                                      <tr>
                                        <td style="background:#bcbec0d0;"><?php echo " Estado Subasta: "; ?></td>  
                                        <?php 
                                        $registro7 = mysqli_query($conexion, "SELECT S_Estado FROM subasta s Inner Join tienesubasta ts 
                                                on s.S_id=ts.S_id INNER JOIN articulos a ON a.DNI_Articulo=ts.DNI_Articulo WHERE A_Nombre='$A_Nombre';" );
                                          while($registros6 = mysqli_fetch_array($registro7)) {
                                            $registros6['S_Estado'];
                                        ?>
                                        <?php if ($registros6['S_Estado']=="ABIERTO") { ?>
                                          <td colspan="2" style="background:#4ccc67d0;"><?php echo $registros6['S_Estado']; ?></td> 
                                          <?php }  else { ?>
                                          <td colspan="2" style="background:#db3226d0;"><?php echo $registros6['S_Estado']; ?></td>
                                          <?php }} ?>
                                      </tr>    
                                  </table>
                                </div><!--Final div Letramediana---> 
                                <?php if (isset($_POST['btn_concul'])){}}?>
                            </fieldset>
                          </div><!--Final div Descripcion---> 
                    </div><!--Final div Objeto1---> 
                </fieldset>
                <fieldset style="background:#318fe7;">
                  <div id="Footer">
                      Fundamentos de Sistemas de Informacion -- Todos los derechos Reservados
                  </div>   
          </fieldset>
    </div>
</body>
</html>