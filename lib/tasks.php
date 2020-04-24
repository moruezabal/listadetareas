<?php
require_once 'lib/db.php';

function showTasks() {
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Lista de tareas</title>
        </head>
        <body>

        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">TODOList</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="listar">Home <span class="sr-only">(current)</span></a>
                </li>
                </ul>
            </div>
            </nav>

            <div class="container">

                <h1>Lista de Tareas</h1>

                <form action="nueva" method="post" class="my-4">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label>Título</label>
                                <input name="titulo" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>Prioridad</label>
                                <select name="prioridad" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea name="descripcion" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
    ';

    // obtiene las tareas (arreglo)
    $tareas = getTasks();

    // arma la lista de tareas
    echo "<ul class='list-group'>";
    foreach ($tareas as $tarea) {

        $idTarea = $tarea->id_tarea;

        echo "<li class='list-group-item'>";

        echo '<a class= "btn btn-danger" href="eliminar/' . $idTarea . '">Eliminar</a>';
        
        echo "<b>" . $tarea->titulo . "</b> - " . $tarea->descripcion ."</li>";
    }
    echo "</ul>";


    echo '  
            </div>          
        </body>
    </html>
    ';
}


function addTask() {

    // toma los valores enviados por el usuario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $prioridad = $_POST['prioridad'];

    // verifica los datos obligatorios
    if (!empty($titulo) && !empty($prioridad)) {

        // inserta en la DB y redirige
        insertTask($titulo, $descripcion, $prioridad);
        header('Location: ' . BASE_URL . "listar");
    } else {
        echo "<h2>ERROR! Faltan datos obligatorios</h2>";
    }


}

//Borra la tarea según su ID llamando a la función en la base de datos
function eraseTask($idTask){
    
    deleteTask($idTask);
    header('Location: ' . BASE_URL . "listar");

}