<?php
    require_once 'Usuario.php';

    echo "TraerTodosLosPerfiles"."<br>";
    $perfiles = Usuario::TraerTodosLosPerfiles();
    var_dump($perfiles);
    echo "<br>";

    echo "TraerTodosLosUsuarios"."<br>";
    $usuarios = Usuario::TraerTodosLosUsuarios();
    var_dump($usuarios);
    echo "<br>";
 ?>
