<?

/**
 * Se conecta a la base de datos, y trae todas las tareas.
 */

function getTasks(){

$db = new PDO('mysql:host=localhost;'
.'dbname=db_tareas;charset=utf8'
, 'root', '');

$sentencia = $db->prepare( "select * from tarea");
$sentencia->execute();
$tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);

return $tareas;
}


?>
