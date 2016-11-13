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
        }
    }

 ?>
