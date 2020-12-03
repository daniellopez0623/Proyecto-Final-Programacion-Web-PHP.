<?php 

include "layout/layout.php";
require_once "database/FileHandler.php";
require_once "database/JsonFileHandler.php";
require_once "database/Context.php";
require_once "database/indexlog.php";
require_once "database/userservice.php";

$result = null;
$message = "";

session_start();

$messageAuth = isset($_SESSION['messageAuth']) ? $_SESSION['messageAuth'] :"";

$_SESSION['messageAuth'] = "";

$service = new userservice("database");

// $service->GetlistaP();


$mysqli = new mysqli("localhost", "root", "Msi1997809", "proyecto_final");

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 1 and c.estado = 1")){

    $row_cnt = $result->num_rows;
    $row_cnt;
    $result->close();

    if($row_cnt >= 2){

        if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 2 and c.estado = 1")){

            $row_cnt = $result->num_rows;
            $row_cnt;
            $result->close();

            if($row_cnt >= 2){

                if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 3 and c.estado = 1")){
                    
                    $row_cnt = $result->num_rows;
                    $row_cnt;
                    $result->close();

                    if($row_cnt >= 2){
                        
                        if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 4 and c.estado = 1")){

                            $row_cnt = $result->num_rows;
                            $row_cnt;
                            $result->close();

                            if($row_cnt >= 2){
                                
                                if(isset($_POST['documento_dentidad'])){
                        
                                    $result = $service->login($_POST['documento_dentidad']);
                                
                                    if($result != null){
                                        
                                        $_SESSION['documento_dentidad'] = json_encode($result);
                                
                                        header("Location: eleccion/votoP.php");
                                        exit();
                                        
                                    }else{
                                
                                        $message = "cedula incorrecta o no esta registrado/as";
                                    }
                                }

                            }else{
                                
                                echo "Debe de haber al menos 2 alcaldes activos para iniciar la votacion.";
                            }


                        }

                    }else{
                                
                        echo "Debe de haber al menos 22222 senadores activos para iniciar la votacion.";
                    }
                }
            }

            else{
                echo "Debe de haber al menos 2 diputados activos para iniciar la votacion.";
            }
        }
        
    }else{
                                
        echo "Debe de haber al menos 2 presidentes activos para iniciar la votacion.";
    }

}
$mysqli->close();
//var_dump($service);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assents\css\style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assents\css\framework\bootstrap.min.css">
    <title>Document</title>
</head>
<body class="text-center">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        
        <div class="inner">
            <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="admin/login.php">Iniciar Como Administrador</a>
        </nav>
        <?php printHeader(); ?>

        <?php if($messageAuth != ""):?>
            <div class="alert alert-warning">
                <?= $messageAuth ?>
            </div>
        <?php endif;?>
        
        <form action="index.php" method="POST" class=" form-signin">

            <?php if($message !=""): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$message;?>
                </div>
            <?php endif;?>

            <div class=" form-group">
                <input type="text" class="form-control" required="" id="documento_dentidad" name="documento_dentidad"
                    placeholder="Coloque su Documento de documento_dentidad">
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>
        </form>
</div>   
        <?php printFooter(); ?>

</body>
</html>


   