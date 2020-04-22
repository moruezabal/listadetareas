
<?php

require_once "tareas.php";

// Definimos la URL por defecto
define('BASE URL', '//'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

// Acción por defecto
if(empty($_GET['action'])){
    $_GET['action'] = 'listar';
}

else {
    $partesURL = explode('/', $_GET['action']);
    switch ($partesURL[0]){
        case 'listar' :
            showTasks();
        break; 

        case 'nueva' :
            addTask();
        break;

        default:
            echo("404 Page not found");
        break;
    }

}




?>

