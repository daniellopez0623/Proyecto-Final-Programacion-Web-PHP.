<link rel="stylesheet" href="../assents/css/stlye.css">
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

$service = new candidatoservice("../database");
$servicio=new Servicio();

$listarcandidato = $service->GetlistaP();
$islogged = false;

if(isset($_SESSION['documento_dentidad']) && $_SESSION['documento_dentidad']!=null){
 
    $documento_dentidad = json_decode($_SESSION['documento_dentidad']);
    $islogged = true;
}

if(isset($_GET['id']  )){

  $candidatoid = $_GET['id'];
  $elemento = $service->GetByid($candidatoid);

}

$VPresidente = 0;
if(isset($_GET['id'])){
    
    $VPresidente = $_GET['id'];
}

$service = new candidatoservice("../database");



$mysqli = new mysqli("localhost", "root", "", "proyecto_final");

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 2 and c.estado = 1")){
    
    $row_cnt = $result->num_rows;
    $row_cnt;
    $result->close();
    
    $cantDiputado = false;
    if($row_cnt >= 2){

        $cantDiputado = true;
    }
}
if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 3 and c.estado = 1")){
    
    $row_cnt = $result->num_rows;
    $row_cnt;
    $result->close();

    $cantSenador = false;
    if($row_cnt >= 2){

        $cantSenador = true;
    }
}
if($result = $mysqli->query("SELECT * FROM candidatos c WHERE C.puesto_aspira = 4 and c.estado = 1")){
    
    $row_cnt = $result->num_rows;
    $row_cnt;
    $result->close();

    $cantAlcalde = false;
    if($row_cnt >= 2){

        $cantAlcalde = true;
    }
}
?>

<?php printHeader(true); ?>

<h3 class="font-weight-bold">Presidentes</h3>

<br>
<div class="row">

    <?php foreach ($listarcandidato as $candidato) : ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;

    <div class="card text-white bg-dark cover-container" style=" width: 14rem" ;>
        <img class="bd-placeholder-img card-img-top"
            src="<?php echo "../candidatos/imagenes/candidato/" .  $candidato->foto_perfil ?>" width="100%" height="150"
            role="img" aria-label="Placeholder: Thumbnail">

        <div class="card-body">

            <h5 class="card-title"> <?php echo $candidato->nombre?></h5>
            <h5 class="card-subtitle mb-2"><?php echo $candidato->apellido?></h5>
            <h6 class="card-text">Partido: <?php if($candidato->partido_pertenece == 1): ?>
                <td>PLD</td>
                <?php else: ?>
                <td>PRD</td>
                <?php endif; ?></h6>
            <h6 class="card-text">Puesto: <?php if($candidato->puesto_aspira == 1): ?>
                <td>Presidente</td>

                <?php endif; ?></h6>
            <h6 class="card-text">estado: <?php if($candidato->estado == 1): ?>

                <td>Activo</td>
                <?php else: ?>
                <td>Inactivo</td>
                <?php endif; ?></h6>
            
                <?php if($cantDiputado):?>
                    <td><a href="votoD.php?VPresidente=<?php echo $candidato->id; ?>" class="btn btn-danger btnEliEdit">VOTAR</a></td>
                <?php elseif($cantSenador):?>
                    <td><a href="VotoS.php?VPresidente=<?php echo $candidato->id; ?>" class="btn btn-danger btnEliEdit">VOTAR</a></td>
                <?php elseif($cantAlcalde):?>
                    <td><a href="VotoA.php?VPresidente=<?php echo $candidato->id; ?>" class="btn btn-danger btnEliEdit">VOTAR</a></td>
                <?php else:?>
                    <td><a href="añadirVotos.php?VPresidente=<?php echo $candidato->id; ?>" class="btn btn-danger btnEliEdit">VOTAR</a></td>
                <?php endif; ?></h6> 
            
        </div>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <?php endforeach; ?>

</div>
<br>
<?php printFooter(true); ?>
