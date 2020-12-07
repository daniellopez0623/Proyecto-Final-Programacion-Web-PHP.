<?php


require_once '../database/servicio.php';
require_once "../database/Iserviciobase.php";
require_once "loginService.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "usuario.php";

$service = new loginService("database");


if(isset($_POST['usuario']) && isset($_POST['contrasena'])){

	$result = $service->login($_POST['usuario'],$_POST['contrasena']);
	
	if($result != null){
		
		$_SESSION['usuario'] = json_encode($result);
		
		header("Location: admin.php");
		exit();

	}else{
		
		$message = "Usuario o contraseña incorrecta.";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<main role="main">
<div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-light">Login Administrador</div>
                <div class="card-body">
                    <Form action = "login.php" method = "post">   
                        
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" tabindex="1">
                        </div>

                        <div class="form-group">
                            <label for="contrasena">Contrasena</label>
                            <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="Contrasena" tabindex="2">
                        </div>

                        </div>

                        <button type="submit " class="btn btn-primary bb float-right" tabindex="5">Enviar</button>  

                    </form>
                </div>
            </div>
        </div>
    <div class="col-md-3"></div>
</div>
</main>
</body>
</html>

<script>
//     function Validar(){
        
//         var inputadmin = document.getElementById('adminUser');
//         var inputpass = document.getElementById('adminPass');

//         if(inputadmin.value === "admin" && inputpass.value === "user"){

//             alert('Bienvenido');
//             location.href = "admin.php";

//         }else{
            
//             alert('Usuario y/o contraseña incorrectos, intente nuevamente.');
//             location.reload();
//         }
//     }
// </script>