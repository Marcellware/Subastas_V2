<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="csslogin/estilos.css">
    <title>LOGIN</title>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4 formulario">
                <form method="post" action="db.php">
                    <div class="form-group text-center pt">
                        <h1 class="text-light">INICIAR SESIÒN</h1>
                    </div>

                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" name="Nombre" class="form-control" placeholder="Ingrese su Usuario">
                    </div>
                    
                    <div class="form-group mx-sm-4 pb-3">
                        <input type="password" name="Contra" class="form-control" placeholder="Ingrese su Contraseña" id="contraseña">
                        <center><img src="img/mostrar1.png" id="boton" width="50" height="50"/></center>
                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        <input type="submit" class="btn btn-block ingresar"  value="INGRESAR " >
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
    /* Para mostrar o no mostrar contraseña */
    var boton = document.getElementById('boton');
    var input = document.getElementById('contraseña');

    boton.addEventListener('click', mostrarContraseña);

    function mostrarContraseña(){
        if (input.type=="password"){
            input.type = "text";
            boton.src = "img/ocultar.png";

            setTimeout("ocultar()", 30000);
        }else {
            input.type = "password";
            boton.src = "img/mostrar1.png";
        }
    }
    function ocultar1(){
        input.type="password";
        boton.src = "img/mostrar1.png";
    }

    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>
</html>