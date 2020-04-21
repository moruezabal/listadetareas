
<?php

require_once "tabla.php";
require_once "multiplicar.php";

if($_GET['action'] == ''){
    mostrarIndex();
}

else {
    $partesURL = explode('/', $_GET['action']);
    if(isset($partesURL[1])){
        multiplicar($partesURL[0],$partesURL[1]);
    }
    else{
        multiplicarSimple($partesURL[0]);
    }
}




?>

