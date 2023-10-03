
<?php
require_once("src/Models/Conexion.php");
require_once "src/Models/Docente.php";
require_once "src/Models/Egresado.php";


$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$urlControl = array(
    $_SERVER['SERVER_NAME'] . "/MEEYER/",
    $_SERVER['SERVER_NAME'] . "/MEEYER/?option=0"
);


$programaId = 15;
$api = 'http://localhost:3010';
$PATH_DOCENTE =  $GLOBALS['api'] . '/imagenes/MEEYER/docentes/';

$conn = new Conexion();
$conn->connect();
$docente = new Docente();
$docente->setConnection($conn->getDB());
$egresado = new Egresado();
$egresado->setConnection($conn->getDB())
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Maestría,Eficiencia,Energética,Y,Energías,Renovables">
    <meta name="author" content="Instituto Tecnologico de Veracruz/Tecnologico Nacional de México">
    <link rel="icon" href="img/itver-logo.PNG" />

    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/estilos.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Maestría en Eficiencia Energética Y Energías Renovables</title>
</head>

<?php 
    include_once "src/Views/header.php";

    
    for ($i = 0; $i < 2; $i++) {
        if ($url == $urlControl[$i]) {
            include_once "src/Views/inicio.php";
        }
    }

    if (isset($_GET['option'])) {
        include_once "src/Controllers/page-controller.php";
    } else {
        include_once "src/Views/inicio.php";
    }
?>

<?php
    include_once "src/Views/footer.php";
?>

</html>