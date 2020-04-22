<?

/**
 * Se conecta a la base de datos, y trae todas las tareas.
 */

function getTasks() {

    // 1. abro la conexión con MySQL 
    $db = new PDO('mysql:host=localhost;'.'dbname=listadetareas;charset=utf8', 'root', '');

    // 2. enviamos la consulta (3 pasos)
    $sentencia = $db->prepare("SELECT * FROM tarea"); // prepara la consulta
    $sentencia->execute(); // ejecuta
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

    return $tareas;
}


?>
