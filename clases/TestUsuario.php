<?php
    require_once 'Usuario.php';

    echo "TraerTodosLosPerfiles"."<br>";
    $perfiles = Usuario::TraerTodosLosPerfiles();
    var_dump($perfiles);
    echo "<br><br>";

    echo "TraerTodosLosUsuarios"."<br>";
    $usuarios = Usuario::TraerTodosLosUsuarios();
    var_dump($usuarios);
    echo "<br><br>";

    echo "TraerUnUsuarioPorId"."<br>";
    $usuario = Usuario::TraerUnUsuarioPorId(1);
    var_dump($usuario);
    echo "<br><br>";
 ?>
