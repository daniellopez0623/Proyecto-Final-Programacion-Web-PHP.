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

$listarcandidato = $service->GetlistaD();

$islogged = false;

$VPresidente = $_GET["id"];

var_dump($VPresidente);



if(isset($_SESSION['documento_dentidad']) && $_SESSION['documento_dentidad'] != null){

    $documento_dentidad = json_decode($_SESSION['documento_dentidad']);
    $islogged = true;
}

?>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-10%">
            <div class="inner">

            </div>

            <?php printHeader(true); ?>

            <h3 class="font-weight-bold">Diputados</h3>
            <br>

            <div class="row">

                <?php foreach ($listarcandidato as $candidato) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                <div class="card text-white bg-dark cover-container" style=" width: 14rem" ;>
                    <img class="bd-placeholder-img card-img-top"
                        src="<?php echo "../candidatos/imagenes/candidato/" .  $candidato->foto ?>" width="100%"
                        height="150" role="img" aria-label="Placeholder: Thumbnail">

                    <div class="card-body">

                        <h5 class="card-title"> <?php echo $candidato->nombre?></h5>
                        <h5 class="card-subtitle mb-2"><?php echo $candidato->apellido?></h5>
                        <h6 class="card-text">Partido: <?php if ($candidato->partido_pertenece == 1): ?>
                            <td>PLD</td>
                            <?php else: ?>
                            <td>PRD</td>
                            <?php endif; ?></h6>
                        <h6 class="card-text">Puesto: <?php if ($candidato->puesto_aspira == 2): ?>
                            <td>Diputado</td>

                            <?php endif; ?></h6>
                        <h6 class="card-text">estado: <?php if ($candidato->estado == 1): ?>

                            <td>Activo</td>
                            <?php else: ?>
                            <td>Inactivo</td>
                            <?php endif; ?></h6>
                        <a href="voto.php" class="btn btn-warning" onclick="return confirmar()">Votar</a>
                        <td><a href="votoS.php?id=<?php echo $candidato->id; ?>&VPresidente=<?php echo $VPresidente ?>" class="btn btn-danger btnEliEdit">este</a></td>
                        
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