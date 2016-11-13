<?php
    require_once 'Usuario.php';

    $email = isset($_POST['email']) ? $_POST['email']:NULL;
    $password = isset($_POST['password']) ? $_POST['password']:NULL;
    $usuarios = Usuario::TraerTodosLosUsuarios();
    $jsonObj = array();

    foreach ($variable as $value) {
        if (($value->email == $email) && ($value->password == $password)) {
            session_start();
            $_SESSION['id'] = $value->id;
            $_SESSION['nombre'] = $value->nombre;
            $_SESSION['email'] = $value->email;
            $_SESSION['perfil'] = $value->perfil;
            $_SESSION['foto'] = $value->foto;
            $jsonObj['esta'] = TRUE;
            $_GET['uss'] = FALSE;
            break;
        }else {
            $jsonObj['esta'] = FALSE;
            $jsonObj['ERROR'] = "No Coincide email y/o password";
            $_GET['uss'] = TRUE;
        }
    }

    $jsonObj = json_encode($jsonObj);

    return json_decode($jsonObj);

 ?>
