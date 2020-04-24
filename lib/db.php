<?php

/**
 * Se conecta a la base de datos, y trae todas las tareas.
 */
function getTasks() {

    // 1. abro la conexiÃ³n con MySQL 
    $db = new PDO('mysql:host=localhost;'.'dbname=listadetareas;charset=utf8', 'root', '');

    // 2. enviamos la consulta (3 pasos)
    $sentencia = $db->prepare("SELECT * FROM tarea"); // prepara la consulta
    $sentencia->execute(); // ejecuta
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

    return $tareas;
}

/**
 * Inserta una tarea en la base da datos
 */
function insertTask($titulo, $descripcion, $prioridad) {
     // 1. abro la conexiÃ³n con MySQL 
     $db = new PDO('mysql:host=localhost;'.'dbname=listadetareas;charset=utf8', 'root', '');

     // 2. enviamos la consulta
    $sentencia = $db->prepare("INSERT INTO tarea(titulo, descripcion, prioridad) VALUES(?, ?, ?)"); // prepara la consulta
    $sentencia->execute([$titulo, $descripcion, $prioridad]); // ejecuta

}

/**
 * Borra una tarea
 */
function deleteTask($idTarea) {
    // 1. abro la conexión con MySQL 
    $db = new PDO('mysql:host=localhost;'.'dbname=listadetareas;charset=utf8', 'root', '');

    // 2. enviamos la consulta
   $sentencia = $db->prepare("DELETE FROM tarea WHERE id_tarea = ?"); // prepara la consulta
   $sentencia->execute([$idTarea]); // ejecuta    
}
