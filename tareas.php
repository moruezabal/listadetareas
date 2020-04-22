<?php

require_once 'db.php';

function showTasks(){

    echo("<h1>Lista de Tareas</h1>");

    // obtiene las tareas (arreglo)
    $tareas = getTasks();

    // arma la lista de tareas
    echo "<ul>";
    foreach ($tareas as $tarea) {
        echo "<li><b>" . $tarea->titulo . "</b> - " . $tarea->descripcion ."</li>";
    }
    echo "</ul>";
}

function addTask(){

    echo("Se agregó una nueva tarea");
}
?>