<?php
    require_once 'clases/Usuario.php';

    $email = isset($_POST['email']) ? $_POST['email']:NULL;
    $password = isset($_POST['password']) ? $_POST['password']:NULL;
    $usuarios = Usuario::TraerTodosLosUsuarios();
    $jsonObj = array();

    foreach ($usuarios as $value) {
        if (($value->email == $email) && ($value->password == $password)) {
            session_start();
            $_SESSION['id'] = $value->id;
            $_SESSION['nombre'] = $value->nombre;
            $jsonObj['esta'] = TRUE;
            $jsonObj['error'] = "Se encuentra el objeto ";

            break;
        }else {
            $jsonObj['esta'] = FALSE;
            $jsonObj['error'] = "No Coincide email y/o password";

        }
    }

    $retorno = json_encode($jsonObj);

    echo $retorno;


 ?>
