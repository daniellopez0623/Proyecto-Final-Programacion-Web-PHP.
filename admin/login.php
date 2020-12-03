<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="script.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assents\css\login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assents\css\framework\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <title>Inicio de sesion</title>
</head>
<body>
<?php 

include "../layout/layout.php";

?>
    <?php printHeader(true); ?>

    <h4>Iniciar sesion como Administrador</h4><br>
    
    <div class="form-group">
    <div style="margin-top: 15%;" class="login">   
            <input type="text" placeholder="Usuario" id="adminUser" name="adminUser" tabindex="1">
            <input type="password" placeholder="Contraseña" id="adminPass" name="adminPass" tabindex="2">
            <a href="#" class="forgot">¿Se te olvidó tu contraseña?</a>
            <br>
            <a class="btn btn-primary my-2" onclick="Validar()" tabindex="3">Entrar</a>
            <a href="../index.php" class="btn btn-dark my-2" onclick="" tabindex="4">Atras</a>
    </div>
    <div class="shadow"></div>
    </div>

    <?php printFooter(true); ?>
    
</body>
</html>

<script>
    function Validar(){
        
        var inputadmin = document.getElementById('adminUser');
        var inputpass = document.getElementById('adminPass');

        if(inputadmin.value === "admin" && inputpass.value === "user"){

            alert('Bienvenido');
            location.href = "admin.php";

        }else{
            
            alert('Usuario y/o contraseña incorrectos, intente nuevamente.');
            location.reload();
        }
    }
</script>