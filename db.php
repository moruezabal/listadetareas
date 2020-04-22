<?


function getTasks(){

$db = new PDO('mysql:host=localhost;'
.'dbname=db_tareas;charset=utf8'
, 'root', '');

$sentencia = $db->prepare( "select * from tarea");
$sentencia->execute();
$tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);

foreach($tareas as $tarea) {
    echo $tarea->nombre;
    }
}


?>
