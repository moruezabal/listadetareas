<?php
    require_once 'lib/tasks.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'listar';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    //var_dump($parametros); die; // like console.log();

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'listar': // /listar   ->   showTasks()
            showTasks();
        break;

        case "nueva": // /nueva    ->    addTask()
            addTask();
        break;

        case "eliminar": // /nueva    ->    addTask()
            eraseTask($parametros[1]);
        break;
    
        default: 
            echo "404 not found";
        break;
    }


?>

