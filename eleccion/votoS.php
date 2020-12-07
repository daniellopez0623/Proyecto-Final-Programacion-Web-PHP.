<header>
    </div>
    </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="../database/logaut.php" class="navbar-brand d-flex align-items-center">

                <strong>Cerrar Session</strong>


            </a>
        </div>
    </div>
</header>
<?php 

include "../layout/layout.php";
require_once "../auth.php";
require_once "../database/Servicio.php";
require_once "../database/Iserviciobase.php";
require_once "../candidatos/candidatoservice.php";
require_once "../database/Context.php";
require_once "../database/FileHandler.php";
require_once "../database/JsonFileHandler.php";
require_once "../candidatos/candidato.php";

$islogged = false;

if(isset($_SESSION['documento_dentidad']) && $_SESSION['documento_dentidad']!=null){

    $documento_dentidad = json_decode($_SESSION['documento_dentidad']);
    $islogged = true;

}

$VPresidente = 0;
if(isset($_GET['VPresidente'])){

    $VPresidente = $_GET['VPresidente'];
}
$VDiputado = 0;
if(isset($_GET['VDiputado'])){

    $VDiputado = $_GET['VDiputado'] . "Diputado";
}

$service = new candidatoservice("../database");

$listarcandidato = $service->GetlistaS();

$mysqli = new mysqli("localhost", "root", "", "proyecto_final");

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 4 and c.estado = 1")){
    
    $row_cnt = $result->num_rows;
    $row_cnt;
    $result->close();

    $cantAcalde = false;
    if($row_cnt >= 2){

        $cantAcalde = true;
    }
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-10%">
            <div class="inner">

            </div>
            <?php printHeader(true); ?>
            <h3 class="font-weight-bold">Senadores</h3>

            <br>


            <div class="row">

                <?php foreach ($listarcandidato as $candidato) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                
                <div class="car-md-4" style=" width: 14rem" ;>
                    <img class="bd-placeholder-img card-img-top"
                        src="<?php echo "../candidatos/imagenes/candidato/" .  $candidato->foto_perfil ?>" width="100%"
                        height="150" role="img" aria-label="Placeholder: Thumbnail">

                    <div class="card-body">

                        <h5 class="card-title"> <?php echo $candidato->nombre?></h5>
                        <h5 class="card-subtitle mb-2"><?php echo $candidato->apellido?></h5>
                        <h6 class="card-text">Partido: <?php if ($candidato->partido_pertenece == 1): ?>
                            <td>PRM</td>
                            <?php else: ?>
                            <td>PLD</td>
                            <?php endif; ?></h6>
                        <h6 class="card-text">Puesto: <?php if ($candidato->puesto_aspira == 3): ?>
                            <td>Senador</td>

                            <?php endif; ?></h6>
                        <h6 class="card-text">estado: <?php if ($candidato->estado == 1): ?>

                            <td>Activo</td>
                            <?php else: ?>
                            <td>Inactivo</td>
                            <?php endif; ?></h6>
                        
                        <?php if($cantAcalde):?>                            
                            <td><a href="votoA.php?Senador=<?php echo $candidato->id; ?>&VPresidente=<?php echo $VPresidente ?>&VDiputado=<?php echo $VDiputado ?>" class="btn btn-danger btnEliEdit">VOTAR</a></td>
                        <?php else: ?>
                            <td><a href="añadirVotos.php?Senador=<?php echo $candidato->id; ?>&VPresidente=<?php echo $VPresidente ?>&VDiputado=<?php echo $VDiputado ?>" class="btn btn-danger btnEliEdit">VOTAR</a></td>
                        <?php endif; ?></h6>                                
                        
                    </div>

                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                <?php endforeach; ?>
            </div>
            <br>
            <?php printFooter(true); ?>
            
            <script type="text/javascript">
            function confirmar() {

                var respuesta = confirm("Esta seguro de votar por este candidato?");
                if (respuesta == true) {
                    return true;
                } else {
                    return false;
                }
            }
            </script>