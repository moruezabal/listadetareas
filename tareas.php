<?
require_once "db.php";

$sentencia = $db->prepare( "select * from tarea");
$sentencia->execute();
$tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);

foreach($tareas as $tarea) {
    echo $tarea->nombre;
    }
?>